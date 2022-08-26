<?php
use App\Models\VmtMasterConfig;

function required()
{
  $required = "<span class='text-danger required_star'>*</span>";
  return $required;
}

function fetchMasterConfigValue($config_name)
{
    return VmtMasterConfig::where('config_name','=',$config_name)->first()->value('config_value');

}
