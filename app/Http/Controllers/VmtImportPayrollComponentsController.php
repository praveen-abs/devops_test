<?php

namespace App\Http\Controllers;
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
                 'component_name'=>'required',
                 'componant_type'=>'required',
                 'component_nature'=>'required',
                 'category'=>'required',
                 'calculation_method'=>'required',
                 'taxability'=>'required',
                 'epf'=>'required',
                 'esi'=>'required',
                 'pt'=>'required',
                 'lwf'=>'nullable',


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

            $responseJSON['status'] = 'success';
            $responseJSON['message'] = "Excelsheet data import success";
            $responseJSON['data'] = $data_array;
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
                $fin_components = new VmtPayrollComponents;
                $fin_components->comp_name =$row["component_name"];
                $fin_components->comp_type =$row["componant_type"];
                $fin_components->comp_nature =$row["component_nature"];
                $fin_components->category =$row["category"];
                $fin_components->calculation_method =$row["calculation_method"];
                $fin_components->taxability =$row["taxability"];
                $fin_components->epf =$row["epf"];
                $fin_components->esi =$row["esi"];
                $fin_components->pt =$row["pt"];
                $fin_components->lwf =$row["lwf"];
                $fin_components->save();

            return $rowdata_response = [
                'row_number' => '',
                'status' => 'success',
                'error_fields' => [],
            ];
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
