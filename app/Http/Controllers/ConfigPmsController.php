<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigPms;
use App\Models\User;

use Session as Ses;

class ConfigPmsController extends Controller
{
    public function index(Request $request) {

        $this->checkConfigPms();

        $data = ConfigPms::first();

        if ($data) {
            $data->header = json_decode($data->column_header, true);
        }
        return view('vmt_config_pms', compact('data'));
    }

    public function store(Request $request) {
        $json = json_encode([
            'dimension' => $request->input('dimension'),
            'kpi' => $request->input('kpi'),
            'operational' => $request->input('operational'),
            'measure' => $request->input('measure'),
            'frequency' => $request->input('frequency'),
            'target' => $request->input('target'),
            'stretchTarget' => $request->input('stretchTarget'),
            'source' => $request->input('source'),
            'kpiWeightage' => $request->input('kpiWeightage')
        ]);
        $selectedColumn = [];
        if ($request->input('dimension_check')) {
            array_push($selectedColumn, 'dimension');
        }
        if ($request->input('kpi_check')) {
            array_push($selectedColumn, 'kpi');
        }
        if ($request->input('operational_check')) {
            array_push($selectedColumn, 'operational');
        }
        if ($request->input('measure_check')) {
            array_push($selectedColumn, 'measure');
        }
        if ($request->input('frequency_check')) {
            array_push($selectedColumn, 'frequency');
        }
        if ($request->input('target_check')) {
            array_push($selectedColumn, 'target');
        }
        if ($request->input('stretchTarget_check')) {
            array_push($selectedColumn, 'stretchTarget');
        }
        if ($request->input('source_check')) {
            array_push($selectedColumn, 'source');
        }
        if ($request->input('kpiWeightage_check')) {
            array_push($selectedColumn, 'kpiWeightage');
        }

        $config = ConfigPms::first();

        $config->selected_columns = implode(',',$selectedColumn);
        $config->selected_head = $request->input('selected_head');
        $config->column_header = $json;
        $config->user_id = auth()->user()->id;
        $config->save();
        Ses::flash('message', 'PMS Config Updated successfully!');
        Ses::flash('alert-class', 'alert-success');
        return redirect()->back();
    }


    /*
        Called In PMS Dashboard
    */
    public static function checkConfigPms(){

        $config = ConfigPms::first();

        if (!$config)
        {
            $createConfig = new ConfigPms;
            $createConfig->selected_columns = "dimension,kpi,operational,measure,frequency,target,stretchTarget,source,kpiWeightage";
            $createConfig->selected_head = "hr";
            $createConfig->column_header = '{"dimension":null,"kpi":null,"operational":null,"measure":null,"frequency":null,"target":null,"stretchTarget":null,"source":null,"kpiWeightage":null}';
            $createConfig->user_id = auth()->user()->id;
            $createConfig->save();
        }

    }
}
