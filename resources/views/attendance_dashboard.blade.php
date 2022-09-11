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
	.nav-tab a:hover
	{
		background-color:orange;
		}
</style>
@endsection

@section('content')
 @component('components.attendance_breadcrumb')
   @slot('li_1')@endslot
 @endcomponent

<div class="card flex-fill project-wrapper">
	<div class="card-header">
	   <h5><span class="text-muted">Attendance &gt;</span> <span class="text-danger"> Dashboard </span></h5>
	</div>
    <div class="card-body p-2">
	  <div class="row">
       <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12">
			<div class="card profile-box flex-fill card-top-border w-100">
			 <div class="card-header">
    		   <ul class="nav nav-pills nav-tabs-dashed card-header-tabs">
    		   <!-- <ul class="nav sub-topnav"> -->
      		        <li class="nav-item text-muted">
        		    <a class="nav-link active" data-bs-toggle="tab" href="#tab1">&nbsp;Attendance Summary&nbsp;&nbsp;</a>
      		        </li>
      			<li class="nav-item text-muted">
        		    <a class="nav-link" data-bs-toggle="tab" href="#tab2">&nbsp;Attendance Analytics&nbsp;&nbsp;</a>
      			</li>
      			<li class="nav-item text-muted">
        		    <a class="nav-link " data-bs-toggle="tab" href="#tab3">&nbsp;Leave Summary&nbsp;&nbsp;</a>
      			</li>
				<li class="nav-item text-muted">
        		    <a class="nav-link " data-bs-toggle="tab" href="#tab4">&nbsp;Leave Analytics&nbsp;&nbsp;</a>
      			</li>
    		    </ul>
		 	 </div>
			<div class="card-body">
			  <div class="tab-content">
				<div id="tab1" class="tab-pane fade show active ">
					<div class="row p-2">
					   <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
							<h6 class="text-left fw-bold">Today's Attendance Status</h6>
					   </div>
					</div>
				   <div class="card profile-box flex-fill card-top-border w-100">
				   <div class="card-body">
					<div class="row">
					   <div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
                        <div class="card shadow small-card left-line">
							<div class="card-body">
                                <div class="text-center">
                                    <p class="text-muted f-15">Total Active Employees</p>
                                    <h6 class="fw-bold">10</h6>
                                </div>
                            </div>
                        </div>
                       </div>
					   <div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
                        <div class="card shadow small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Early/On Time Arrivals</p>
                                <h6 class="fw-bold text-primary">0</h6>
								<div class="text-right">
									<a href="#" class="text-right f-15 text-danger fw-bold">&nbsp;&lt;&lt;&nbsp;&gt;&gt;&nbsp;</a>
								</div>
                            </div>
                        </div>
                       </div>
					   <div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
                        <div class="card shadow small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Late Arrivals</p>
                                <h6 class="fw-bold text-primary">0</h6>
								<div class="text-right">
									<a href="#" class="text-right f-15 text-danger fw-bold">&nbsp;&lt;&lt;&nbsp;&gt;&gt;&nbsp;</a>
								</div>
                            </div>
                        </div>
                       </div>
					   <div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
                        <div class="card shadow small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Not In Yet</p>
                                <h6 class="fw-bold text-primary">4</h6>
								<div class="text-right">
									<a href="#" class="text-right f-15 text-danger fw-bold">&nbsp;&lt;&lt;&nbsp;&gt;&gt;&nbsp;</a>
								</div>
                            </div>
                        </div>
                       </div>
				   </div>
					<div class="row">
					   <div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
                        <div class="card shadow small-card left-line">
							<div class="card-body">
                                <div class="text-center">
                                    <p class="text-muted f-15">Work From Home</p>
                                    <h6 class="fw-bold">0</h6>
                                </div>
                            </div>
                        </div>
                       </div>
					   <div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
                        <div class="card small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">On Duty</p>
                                <h6 class="fw-bold text-primary">0</h6>
								<div class="text-right">
									<a href="#" class="text-right f-15 text-danger fw-bold">&nbsp;&lt;&lt;&nbsp;&gt;&gt;&nbsp;</a>
								</div>
                            </div>
                        </div>
                       </div>
					   <div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
                        <div class="card small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Remote Clock-In</p>
                                <h6 class="fw-bold text-primary">0</h6>
                            </div>
                        </div>
                       </div>
					   <div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
                        <div class="card small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Holiday / Weekly Off</p>
                                <h6 class="fw-bold text-primary">4</h6>
                            </div>
                        </div>
                       </div>
				   </div>
				  </div>
				 </div>
				 	<div class="row p-2">
					   <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
							<h6 class="text-left fw-bold">Attendance for Past Dates</h6>
					   </div>
					</div> 
				   <div class="card profile-box flex-fill card-top-border w-100">
				   <div class="card-body">
					<div class="row">
					   <div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
                        <div class="card shadow profile-box card-top-border">
							<div class="card-body">
                                <div class="text-center">
                                    <h7 class="fw-bold">85%</h7>
                                    <p class="text-muted f-12 fw-bold">Employees Present</p>
                                    <p class="text-muted f-12">%age of employees that were present during the selected duration</p>
                                </div>
                            </div>
                        </div>
                       </div>
					   <div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
                        <div class="card shadow left-line">
							<div class="card-body text-center">
                                <h6 class="fw-bold">6h 50m/day</h6>
                                <p class="text-muted f-12 fw-bold">Avg. Work Hours Spent</p>
                                <p class="text-muted f-12">Avg. effective hours spent by employees during the selected duration</p>
                            </div>
                        </div>
                       </div>
					   <div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
                        <div class="card shadow left-line">
							<div class="card-body text-center">
                                <h6 class="fw-bold">0h 40m/day</h6>
                                <p class="text-muted f-12 fw-bold">Avg. Overtime Hours</p>
                                <p class="text-muted f-12">Avg. OT hours worked by employees during the selected duration</p>
                            </div>
                        </div>
                       </div>
					   <div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
                        <div class="card shadow left-line">
							<div class="card-body text-center">
                                <h6 class="fw-bold">0</h6>
                                <p class="text-muted f-12 fw-bold">Total Attendance Discrepancies
                                <p class="text-muted f-12">Total penalizations due to attendance discrepancies during selected period</p>
                            </div>
                        </div>
                       </div>
				   </div>	
				   	<div class="row p-2">
					   <div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
							<h6 class="text-left fw-bold">Employees Arrival Status </h6>
					   </div>
					</div> 
				  </div>
				 </div>				   
				</div>
				<div id="tab2" class="tab-pane fade">
					<br><p>No Data Found..</p>
				</div>
				<div id="tab3" class="tab-pane fade">
					<br><p>No Data Found..</p>
				</div>
			  </div>
			</div>
	       </div>
        </div>
	   </div>
    </div>
</div>

@endsection

@section('script')
<script>
</script>
@endsection