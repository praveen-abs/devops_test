@extends('layouts.master')

@section('title')
    @lang('translation.dashboards')
@endsection

@section('css')
<link href="{{URL::asset('assets/css/shared.css')}}" rel="stylesheet">

<style>
 .project-wrapper{
		position: relative;
		top:-20px;
    }
</style>
@endsection

@section('content')
 @component('components.attendance_breadcrumb')
   @slot('li_1')@endslot
 @endcomponent

<div class="card flex-fill project-wrapper">
	<div class="card-header">
	   <h5><span class="text-muted">Attendance &gt;</span> <span class="text-danger"> Shift/WeeklyOff/Holidays </span></h5>
	</div>
        <div class="card-body p-2">

	</div>
</div>
@endsection

@section('script')
<script>
</script>
@endsection