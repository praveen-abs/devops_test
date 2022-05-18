<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VmtReviewQuestion;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class Review360ModuleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return $roles;
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showQuestionsPage()
    {
        $questionList  = VmtReviewQuestion::all();
        return view('vmt_360review_questions', compact('questionList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showFormsPage()
    {
        return view('vmt_360review_forms');
    }

    // show edit question form
    public function showFormsEdit($id){
        $question = VmtReviewQuestion::find($id);
        return view('vmt_360review_forms', compact('question'));
    }

    // Store Review Questions in DB
    public function saveReviewQuestios(Request $request){

        // if id ? update : create
        if($request->has('id')){
            $newQuestion  =  VmtReviewQuestion::find($request->id); 
            $msg = "Question Updated";
        }else{
            $newQuestion  =  new VmtReviewQuestion; 
            $msg = "Question Saved";
        }
        $newQuestion->question  =  $request->question; 
        $newQuestion->option_1  =  $request->option_1; // => "Always"
        $newQuestion->option_2  =  $request->option_2; // => "Once in a While"
        $newQuestion->option_3  =  $request->option_3; // => "About half the time"
        $newQuestion->option_4  =  $request->option_4; // => "Most of the time"
        $newQuestion->option_5  =  $request->option_5; // => "Never"
        $newQuestion->answer    =  $request->answer; // => "Never"
        $newQuestion->author_id  =  auth::user()->id;
        $newQuestion->author_name  =  auth::user()->name;
        $newQuestion->save();

        return $msg; //"Question Saved";
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
    public function destroy($id = null, Request $request)
    {
    }

}
