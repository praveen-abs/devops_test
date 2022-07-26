<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigPms;
use Session as Ses;

class ConfigPmsController extends Controller
{
    public function index(Request $request) {
        $data = ConfigPms::where('user_id', auth()->user()->id)->first();
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
        if ($request->id) {
            $config = ConfigPms::find($request->id);
        } else {
            $config = new ConfigPms;
        }
        $config->selected_columns = implode(',', $request->input('selected_columns'));
        $config->selected_head = $request->input('selected_head');
        $config->column_header = $json;
        $config->user_id = auth()->user()->id;
        $config->save();
        Ses::flash('message', 'PMS Config Updated successfully!');
        Ses::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
}
