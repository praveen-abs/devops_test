@extends('layouts.master')

@section('title')
@lang('translation.dashboards')
@endsection



@section('content')
@component('components.attendance_breadcrumb')
@slot('li_1')@endslot
@endcomponent

<div class="card flex-fill project-wrapper">
	<!-- <div class="card-header">
		<h5><span class="text-muted">Attendance &gt;</span> <span class="text-danger"> Dashboard </span></h5>
	</div> -->
	<div class="row">
		<div class="col-8">
			<ul class="nav nav-pills nav-tabs-dashed">
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
		<div class="col-md-2 pt-2 text-md-end text-center">
			<button type="button" class="btn btn-custom-primary">
				Employee count
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
				</svg>
			</button>
		</div>
		<div class="col-md-2 pt-2 text-md-start text-center">
			<button type="button" class="btn btn-custom-primary">
				Employee Percentage
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
				</svg>
			</button>
		</div>
	</div>
	<div class="card-body">
		<div class="tab-content">
			<div id="tab1" class="tab-pane fade show active ">
				<div class="card profile-box flex-fill card-top-border w-100">
					<div class="card-body">
						<div class="row p-2">
							<div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
								<h6 class="text-left fw-bold">Today's Attendance Status</h6>
							</div>
						</div>
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
											<button type="button" class="btn btn-custome-warning">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
													<path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"></path>
													<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"></path>
												</svg>
											</button>
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
											<button type="button" class="btn btn-custome-warning">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
													<path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"></path>
													<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"></path>
												</svg>
											</button>
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
											<button type="button" class="btn btn-custome-warning">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
													<path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"></path>
													<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"></path>
												</svg>
											</button>
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
									</div>
								</div>
							</div>
							<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
								<div class="card small-card left-line">
									<div class="card-body text-center">
										<p class="text-muted f-15">Remote Clock-In</p>
										<h6 class="fw-bold text-primary">0</h6>
										<div class="text-right">
											<button type="button" class="btn btn-custome-warning">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
													<path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"></path>
													<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"></path>
												</svg>
											</button>
										</div>
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
				<div class="card profile-box flex-fill card-top-border w-100">
					<div class="card-body">
						<div class="row p-2">
							<div class="col-sm-10 col-xl-10 col-md-10 col-lg-10">
								<h6 class="text-left fw-bold">Attendance for Past Dates</h6>
							</div>
							<div class="col-sm-2 col-xl-2 col-md-2 col-lg-2">
								<button type="button" class="btn btn-custome-warning">
									Aug 20 - Aug 26 
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="margin-left:10px;" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
										<path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"></path>
										<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
									</svg>
								</button>
							</div>
						</div>
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
						<div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
							<h6 class="text-left fw-bold">Employees Arrival Status </h6>
						</div>
						<div class="row">
							<div class="col-6 d-flex">
								<button class="btn btn-custom-primary">Employee Count</button>
								<button class="btn btn-custom-secondary">Employee Percentage</button>
							</div>
							<div class="col-6 text-end">
								<button class="btn btn-custome-warning ">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="svg-custom-icontwo bi bi-file-earmark" viewBox="0 0 16 16">
										<path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"></path>
									</svg>
									<span style="vertical-align: text-top;">Export</span>
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="svg-custom-iconone bi bi-chevron-down" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
									</svg>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="tab2" class="tab-pane fade">
				<div class="card profile-box flex-fill card-top-border w-100">
					<div class="card-body">
						<div class="col-12 mb-3">
							<ul class="nav nav-pills nav-tabs-dashed card-header-tabs">
								<li class="nav-item text-muted">
									<a class="nav-link attendances-analyist-tab active" data-bs-toggle="tab" href="#tab1">&nbsp;Most hour worked&nbsp;&nbsp;</a>
								</li>
								<li class="nav-item text-muted">
									<a class="nav-link attendances-analyist-tab margin-left-mainases" data-bs-toggle="tab" href="#tab2">&nbsp;Overtime Hours&nbsp;&nbsp;</a>
								</li>
								<li class="nav-item text-muted">
									<a class="nav-link attendances-analyist-tab margin-left-mainases " data-bs-toggle="tab" href="#tab3">&nbsp;Least Hours Worked &nbsp;&nbsp;</a>
								</li>
								<li class="nav-item text-muted">
									<a class="nav-link attendances-analyist-tab margin-left-mainases " data-bs-toggle="tab" href="#tab4">&nbsp;Most Breaks Taken&nbsp;&nbsp;</a>
								</li>
							</ul>
						</div>
						<div class="col-12">
							<h6 class="text-left fw-bold">Most Hours Worked by Department</h6>
						</div>
						<div class="row">
							<div class="col-6 d-flex">
								<button class="btn btn-custom-primary">Employee Count</button>
								<button class="btn btn-custom-secondary">Employee Percentage</button>
							</div>
							<div class="col-6 d-flex justify-content-end">
								<button type="button" class="btn btn-custome-warning">
									Aug 20 - Aug 26 
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="margin-left:10px;" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
										<path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"></path>
										<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
									</svg>
								</button>
								<button class="btn btn-custome-warning ms-3">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="svg-custom-icontwo bi bi-file-earmark" viewBox="0 0 16 16">
										<path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"></path>
									</svg>
									<span style="vertical-align: text-top;">Export</span>
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="svg-custom-iconone bi bi-chevron-down" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
									</svg>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="tab3" class="tab-pane fade">
				<br>
				<p>No Data Found..</p>
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')
<script>
</script>
@endsection