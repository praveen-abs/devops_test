<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VmtClientMaster;

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
        //
       
        $vmtClient  =  new VmtClientMaster; 
        $vmtClient->client_code  = $request->client_code;
        $vmtClient->client_name  = $request->client_name;
        $vmtClient->contract_start_date  = $request->csd;
        $vmtClient->contract_end_date  = $request->ced;
        $vmtClient->cin_number  = $request->cin_no;
        $vmtClient->company_tan  = $request->com_tan;
        $vmtClient->company_pan  = $request->com_pan;
        $vmtClient->gst_no  = $request->gst_no;
        $vmtClient->epf_reg_number  = $request->epf;
        $vmtClient->esic_reg_number  = $request->esic.
        $vmtClient->prof_tax_reg_number  = $request->professional_tax;
        $vmtClient->lwf_reg_number  = $request->lwf;
        $vmtClient->authorised_person_name  = $request->auth_person_name;
        $vmtClient->authorised_person_designation  = $request->auth_person_desig;
        $vmtClient->authorised_person_contact_number  = $request->auth_person_contact;
        $vmtClient->authorised_person_contact_email  = $request->auth_person_email;
        $vmtClient->billing_address  = $request->billing_add;
        $vmtClient->shipping_address  = $request->shipping_add;
        if (request()->has('doc_uploads')) {
            $docUploads = request()->file('doc_uploads');
            $docUploadsName = 'doc_'.time() . '.' . $docUploads->getClientOriginalExtension();
            $docUploadsPath = public_path('/images/');
            $docUploads->move($docUploadsPath, $docUploadsName);
        }
        $vmtClient->doc_uploads  = $docUploadsName;
        $vmtClient->product  = $request->product;
        $vmtClient->subscription_type   = $request->subscription_type;
        $vmtClient->save();
        return "Saved";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
