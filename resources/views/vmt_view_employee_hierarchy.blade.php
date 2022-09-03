@extends('layouts.master')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.1.1/css/jquery.orgchart.min.css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/employee_hirarchy.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/app.min.css') }}" rel="stylesheet">

@endsection
@section('content')
@component('components.organization_breadcrumb')
@slot('li_1')  @endslot
@endcomponent
<div id="chart-container" class="mt-8" style="overflow: hidden;">
</div>



@endsection
@section('script')
<script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script type="module" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js">
    import html2canvas from 'html2canvas';
</script>


<script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.1.1/js/jquery.orgchart.min.js" ></script>

<script type="text/javascript">

$(document).ready(function() {

    var mydata ={
        "name": "Lao Lao",
        "title": "general manager",
        "children": [
            {
            "name": "Bo Miao",
            "title": "department manager"
            },
            {
            "name": "Su Miao",
            "title": "department manager",
            "children": [
                {
                "name": "Tie Hua",
                "title": "senior engineer"
                },
                {
                "name": "Hei Hei",
                "title": "senior engineer",
                "children": [
                    {
                    "name": "Pang Pang",
                    "title": "engineer"
                    },
                    {
                    "name": "Xiang Xiang",
                    "title": "UE engineer"
                    }
                ]
                }
            ]
            },
            {
            "name": "Yu Jie",
            "title": "department manager"
            },
            {
            "name": "Yu Li",
            "title": "department manager"
            },
            {
            "name": "Hong Miao",
            "title": "department manager"
            },
            {
            "name": "Yu Wei",
            "title": "department manager"
            },
            {
            "name": "Chun Miao",
            "title": "department manager"
            },
            {
            "name": "Yu Tie",
            "title": "department manager"
            }
        ]

    };




    var ajaxURLs = {
            'children': function(nodeData) {
                //console.log(nodeData.user_code);
                var url = "{{ route('getChildrenForUser','') }}"+"/"+nodeData.user_code;

                return url;
            },
            'parent': '/orgchart/parent/',
            'siblings': function(nodeData) {
                return '/orgchart/siblings/' + nodeData.id;
            },
            'families': function(nodeData) {
                return '/orgchart/families/' + nodeData.id;
            }
    };

    @if(Auth::user()->is_admin == 0)
        $('#chart-container').orgchart({
            'data' : '{{ route('getTwoLevelOrgTree',['user_code' => Auth::user()->user_code ]) }}',
            'ajaxURL' : ajaxURLs,
            'pan' : true,
            'zoom' : true,
            'zoominLimit' : 2,
            'zoomoutLimit' : 0.7,
            'nodeContent': 'designation',
            'exportButton': true,
            'exportFilename': 'OrgChartImage',
            'exportFileextension':'png',
            'createNode' : function($node,data)
            {
                return $node;
            }
        });
    @else
        $('#chart-container').html('<h4> Not available for Super Admin</h4>');
    @endif
});
</script>

@endsection
