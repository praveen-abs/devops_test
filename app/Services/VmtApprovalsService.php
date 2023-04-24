<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\VmtGeneralInfo;
use Dompdf\Dompdf;
use Dompdf\Options;
use \stdClass;
use App\Models\User;
use App\Models\VmtEmployeeDocuments;
use App\Notifications\ViewNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Database\Eloquent\Builder;

class VmtApprovalsService {

    public function processSingleDocumentApproval($record_id, $status){
        try
        {
            $query = VmtEmployeeDocuments::find($record_id);
            $query->status = $status;
            $query->save();

            return "success";
        }
        catch(\Exception $e){
            return "failure";
        }
    }

    /*
        Updates multiple docs with the given status

    */
    public function processBulkDocumentApprovals($record_ids, $status){
        try
        {
            $query_docs = VmtEmployeeDocuments::whereIn('id',$record_ids)->get();

            foreach($query_docs as $singleDoc)
            {
                $singleDoc->status = $status;
                $singleDoc->save();
            }


            return "success";
        }
        catch(\Exception $e){
            return "failure";
        }

    }

}
