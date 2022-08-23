<?php

use App\Models\User;

function required()
{
  $required = "<span class='text-danger required_star'>*</span>";
  return $required;
}

function getUserDetailsById($userId){
  $userDetails = User::findorfail($userId);
  if(!empty($userDetails)){
    return $userDetails->name;
  }
  return '';
}