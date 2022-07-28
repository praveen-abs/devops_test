@extends('layouts.master')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.1.1/css/jquery.orgchart.min.css" rel="stylesheet">
    <style>
    #chart-container {
        font-family: Arial;
        height: 500px;
        border: 1px solid #aaa;
        overflow: auto;
        text-align: center;

      }
      
      .orgchart { background: rgba(255, 255, 255, 0); }
    </style>
@endsection
@section('content')
@component('components.organization_breadcrumb')
@slot('li_1')  @endslot
@endcomponent
<div id="chart-container"></div>

    



@endsection
@section('script')


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

    $('#chart-container').orgchart({
    'data' : '{{ route('vmt-emphierarchy-getChildForUser',['id' => Auth::user()->id ]) }}',
    'pan' : true,
    'zoom' : true,
    'nodeContent': 'designation'
    });

});
</script>
  
@endsection
