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
use App\Models\VmtDocuments;
use App\Notifications\ViewNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class VmtRolesPermissionsService {


    public function getAllRoles(){

    }

    /*
        Get all permissions for the given role

    */
    public function getAllPermissions(){

    }



    public function getAssignedUsers_ForGivenRole(){

    }

    public function createRole(){

    }


    /*
        Get the Role details such as description, title, permissions
    */
    public function getRoleDetails(){

    }

    /*
        Updates the Role details such as description, title
    */
    public function updateRoleDetails(){

    }

    /*
        Updates the permissions for the given Role

    */
    public function updatePermissions_ForGivenRole(){

    }

    public function deleteRole(){

    }

    public function createPermission(){

    }

    /*
        Get Permission details such as description, title
    */
    public function getPermissionDetails(){

    }

    /*
        Updates the Permission details such as description, title
    */
    public function updatePermissionDetails(){

    }

    public function deletePermission(){

    }

    /*
        Assign roles for the given array of users.
        This also handles updates
    */
    public function assignRoleToUsers(){

    }



}
