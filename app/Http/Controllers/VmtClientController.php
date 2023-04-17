<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtClientMaster;
use App\Mail\WelcomeClientMail;
use App\Models\VmtGeneralInfo;

class VmtClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $VmtGeneralInfo = VmtGeneralInfo::where('id','1')->orderBy('created_at', 'DESC')->first();
       try
       {
            $vmtClient  =  new VmtClientMaster;
            $vmtClient->client_code  = $request->client_code;
            $vmtClient->client_name  = $request->client_name;
            $vmtClient->contract_start_date  = $request->contract_start_date;
            $vmtClient->contract_end_date  = $request->contract_end_date;
            $vmtClient->cin_number  = $request->cin_number;
            $vmtClient->company_tan  = $request->company_tan;
            $vmtClient->company_pan  = $request->company_pan;
            $vmtClient->gst_no  = $request->gst_no;
            $vmtClient->epf_reg_number  = $request->epf_reg_number;
            $vmtClient->esic_reg_number  = $request->esic_reg_number.
            $vmtClient->prof_tax_reg_number  = $request->prof_tax_reg_number;
            $vmtClient->lwf_reg_number  = $request->lwf_reg_number;
            $vmtClient->authorised_person_name  = $request->authorised_person_name;
            $vmtClient->authorised_person_designation  = $request->authorised_person_designation;
            $vmtClient->authorised_person_contact_number  = $request->authorised_person_contact_number;
            $vmtClient->authorised_person_contact_email  = $request->authorised_person_contact_email;
            $vmtClient->billing_address  = $request->billing_address;
            $vmtClient->shipping_address  = $request->shipping_address;
            if (request()->has('doc_uploads')) {
                $docUploads = request()->file('doc_uploads');
                $docUploadsName = 'doc_'.time() . '.' . $docUploads->getClientOriginalExtension();
                $docUploadsPath = public_path('/images/');
                $docUploads->move($docUploadsPath, $docUploadsName);
            }
            $vmtClient->doc_uploads  = $request->docUploadsName;
            $vmtClient->product  = $request->product;
            $vmtClient->subscription_type   = $request->subscription_type;
            $vmtClient->save();

            $image_view = url('/').$VmtGeneralInfo->logo_img;
            if (\Mail::to($request->auth_person_email)->send(new WelcomeClientMail(
                                                            $request->client_name ,
                                                            $request->auth_person_email,
                                                            'Abs@123123',
                                                             request()->getSchemeAndHttpHost() ,
                                                             "",
                                                             $image_view)
                                                        )
                ) {
                return "Saved";
            } else {
                return "Error";
            }
        }
        catch (\Throwable $e) {
            return "Error".$e;
        }
    }

    public function showAllClients()
    {
        return view('vmt_client');
    }

    public function fetchAllClients(Request $request)
    {
        return json_encode( VmtClientMaster::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
