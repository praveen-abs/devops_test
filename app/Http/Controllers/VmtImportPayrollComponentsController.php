<?php

namespace App\Http\Controllers;
use App\Models\VmtPayrollCompTypes;
use App\Models\VmtPayrollCompCategory;
use App\Models\VmtPayrollCompNature;
use App\Models\VmtPayrollCalculatiomMethod;
use App\Models\VmtPayrollComponents;
use App\Imports\VmtFinancialComponents;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class VmtImportPayrollComponentsController extends Controller
{
    //
    public function saveComponentsUploadPage(){

        return view('vmt__PayrollComponents_Upload');

    }

    public function importFinancialComponentsExcelData(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        $importDataArry = \Excel::toArray(new VmtFinancialComponents, request()->file('file'));

        return $this->storeBulkFinComponentsPayslips($importDataArry);

    }
    public function storeBulkFinComponentsPayslips($data)
    {

       $data = array_filter($data);

        ini_set('max_execution_time', 300);
        //For output jsonresponse
        $data_array = [];
        //For validation
        $isAllRecordsValid = true;

        $rules = [];
        $responseJSON = [
            'status' => 'none',
            'message' => 'none',
            'data' => [],
        ];

        // $excelRowdata = $data[0][0];
        $excelRowdata_row = $data;

        $currentRowInExcel = 0;
$i=array_keys($excelRowdata_row);

      foreach ($excelRowdata_row[$i[0]] as $key => $excelRowdata) {

            $currentRowInExcel++;

            $rules = [
                 'component_name'=>'nullable',
                 'componant_type'=>'nullable',
                 'component_nature'=>'nullable',
                 'category'=>'nullable',
                 'calculation_method'=>'nullable',
                 'flat amount'=>'nullable',
                 'percentage'=>'nullable',
                 'taxability'=>'nullable',
                 'epf'=>'nullable',
                 'esi'=>'nullable',
                 'pt'=>'nullable',
                 'lwf'=>'nullable',
                 'status'=>'nullable',
                 'is_part_of_empsal_structure'=>'nullable',
                 'is_taxable'=>'nullable',
                 'calculate_on_prorate_basis'=>'nullable',
                 'can_show_inpayslip'=>'nullable',
                 'is_default'=>'nullable',



            ];

            $messages = [
                            'required' => 'Field <b>:attribute</b> is required',
                            'exists' => 'Column <b>:attribute</b> with value <b>:input</b> doesnt not exist',
            ];

            $validator = Validator::make($excelRowdata, $rules, $messages);

            if (!$validator->passes()) {

                $rowDataValidationResult = [
                    'row_number' => $currentRowInExcel,
                    'status' => 'failure',
                    'error_fields' => json_encode($validator->errors()),
                ];

                array_push($data_array, $rowDataValidationResult);

                $isAllRecordsValid = false;
            }


        } //for loop

        //Runs only if all excel records are valid
        if ($isAllRecordsValid) {
            foreach ($excelRowdata_row[$i[0]]  as $key => $excelRowdata) {
                $rowdata_response = $this->storeSingle_Components($excelRowdata);

                array_push($data_array, $rowdata_response);
            }
         if($rowdata_response['status']=='success'){

                $responseJSON['status'] = 'success';
                $responseJSON['message'] = "Excelsheet data import success";
                $responseJSON['data'] = $data_array;


         }else if($rowdata_response['status']=='SUCCESS'){
            $responseJSON['status'] = 'success';
            $responseJSON['message'] = "Given data is already added";
            $responseJSON['data'] = $data_array;
         }
         else{
            $responseJSON['status'] = 'failure';
            $responseJSON['message'] = 'error while uploading excel sheet';
            $responseJSON['data'] = $data_array;
         }
        } else {
            $responseJSON['status'] = 'failure';
            $responseJSON['message'] = "Please fix the below excelsheet data";
            $responseJSON['data'] = $data_array;
        }

        //dd($responseJSON);

        //$data = ['success'=> $returnsuccessMsg, 'failed'=> $returnfailedMsg, 'failure_json' => $failureJSON, 'success_count'=> $addedCount, 'failed_count'=> $failedCount];
        return response()->json($responseJSON);
    }


    private function storeSingle_Components($row)
    {


        try{
            
            $component_type =VmtPayrollCompTypes::where('name',strtolower($row["componant_type"]))->first();
            $paygroup_components =VmtPayrollComponents::where('comp_name',$row["component_name"])->where('comp_type_id',$component_type->id)->first();
            $comp_identifier = strtolower(str_replace(" ","_", $row["component_name"]));
            if(empty($paygroup_components)){
                $fin_components = new VmtPayrollComponents;
                $fin_components->comp_name =$row["component_name"];
                $fin_components->comp_type_id =  $component_type->id;
                $component_nature =VmtPayrollCompNature::where('name',strtolower($row["component_nature"]))->first();
                $fin_components->comp_nature_id =$component_nature->id;
                $component_category =VmtPayrollCompCategory::where('name',strtolower($row["category"]))->first();
                $fin_components->category_id =$component_category->id;
                $calculation_method_id =VmtPayrollCalculatiomMethod::where('name',strtolower($row["calculation_method"]))->first();
                $fin_components->calculation_method_id =$calculation_method_id->id;

                $array_data = array();

                    if(strpos($row["flat_amount"], '%') !== false){
                        preg_match_all('/(\d+%)(?:\s*(?:from\s*)?)(CTC|Gross|Basic|Max)/i',$row["flat_amount"], $calci_data, PREG_SET_ORDER);
                        foreach ($calci_data as $key => $single_calci_data) {
                            $numericValue = rtrim($single_calci_data[1], '%');
                            $array_data['value'] = (float)($numericValue) / 100;;
                            $array_data['action'] = $single_calci_data[2];
                            $array_data['comp_name'] =$comp_identifier ;

                        }
                     }
                     else{

                        preg_match_all('/(\d+ Max)/', $row["flat_amount"], $calci_data, PREG_SET_ORDER);
                         foreach ($calci_data as $key => $single_calci_data) {

                            $array_data['value'] = $single_calci_data[1];
                            $array_data['action'] = "";
                            $array_data['comp_name'] =$comp_identifier ;

                        }
                     }
                 $calculation_amount = json_encode( $array_data,true);

                $fin_components->calculation_desc = $row["flat_amount"];
                $fin_components->calculation_amount =$calculation_amount ;
                $fin_components->comp_identifier =$comp_identifier;
                $fin_components->is_part_of_epf =$row["epf"];
                $fin_components->is_part_of_esi =$row["esi"];
                $fin_components->pt =$row["pt"];
                $fin_components->lwf =$row["lwf"];
                $fin_components->impact_on_gross =$row["impact_on_gross"];
                $fin_components->is_part_of_empsal_structure =$row["is_part_of_empsal_structure"];
                $fin_components->is_taxable =$row["is_taxable"];
                $fin_components->calculate_on_prorate_basis =$row["calculate_on_prorate_basis"];
                $fin_components->can_show_inpayslip =$row["can_show_inpayslip"];
                $fin_components->status =$row["status"];
                $fin_components->is_default =$row["is_default"];
                $fin_components->save();

            return $rowdata_response = [

                'status' => 'success',
                'error_fields' => [],
            ];
        }else{
            return $rowdata_response = [

                'status' => 'SUCCESS',
                'message'=>'given data is already added',
                'error_fields' => [],
            ];
        }
        } catch (\Exception $e) {
            //$this->deleteUser($user->id);

            //dd("For Usercode : ".$row['emp_no']."  -----  ".$e);
            return $rowdata_response = [
                'row_number' => '',
                'status' => 'failure',
                'error_fields' => json_encode(['error' =>$e->getMessage()]),
                'stack_trace' => $e->getTraceAsString()
            ];
        }
    }
}
