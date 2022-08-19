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

    @if(Auth::user()->is_admin != 1)
        $('#chart-container').orgchart({
        'data' : '{{ route('vmt-emphierarchy-getChildForUser',['id' => Auth::user()->id ]) }}',
        'pan' : true,
        'zoom' : true,
        'nodeContent': 'designation'
        });
    @else
        $('#chart-container').html('<h4> Not available for Super Admin</h4>');
    @endif
});
</script>

@endsection
