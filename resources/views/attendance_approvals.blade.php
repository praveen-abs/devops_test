@extends('layouts.master')

@section('title')
@lang('translation.dashboards')
@endsection
@section('content')
@component('components.attendance_breadcrumb')
@slot('li_1')@endslot
@endcomponent

<div class="card ">
	<div class="card-body ">
		<div class="filter-content">
			<div class="row">
				<div class="col-sm-12 col-xxl-6 col-md-6 col-xl-6 col-lg-6">
				</div>
				<div class="col-sm-12 col-xxl-6 col-md-6 col-xl-6 col-lg-6">
					<div class="row">
						<div class="col-sm-12 col-xxl-3 col-md-6 col-xl-3 col-lg-3">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
									Department
								</a>

								<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<li class="dropdown-item"></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-12 col-xxl-3 col-md-6 col-xl-3 col-lg-3">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
									Location
								</a>

								<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<li class="dropdown-item"></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-12 col-xxl-3 col-md-6 col-xl-3 col-lg-3">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
									Leave Type
								</a>

								<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<li class="dropdown-item"></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-12 col-xxl-3 col-md-6 col-xl-3 col-lg-3">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
									Leave Status
								</a>

								<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<li class="dropdown-item"></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<div class="" id="attendance_approvals-table"></div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script>
	$(document).ready(function() {

		if (document.getElementById("attendance_approvals-table")) {
			const grid = new gridjs.Grid({
				columns: [{
						id: 'number',
						name: 'Employee',

					},
					{
						id: 'name ',
						name: ' Department',

					},
					{
						id: 'job_title',
						name: 'Location',
					},
					{
						id: 'reporting_to',
						name: 'Leave Dates',
					},
					{
						id: 'reporting_to',
						name: ' Leave Type',
					},
					{
						id: 'reporting_to',
						name: 'Status',
					},
					{
						id: 'reporting_to',
						name: 'Last Action By',
					},
					{
						id: 'reporting_to',
						name: 'Next Approvers',
					},
					{
						id: 'reporting_to',
						name: 'Leave Note',
					},
					{
						id: '',
						name: 'Actions',
					},


				],
				data: [
					// {
					//     name: 'John',
					//     email: 'john@example.com',
					//     phoneNumber: '(353) 01 222 3333'
					// },
					// {
					//     name: 'Mark',
					//     email: 'mark@gmail.com',
					//     phoneNumber: '(01) 22 888 4444'
					// },
				],

				pagination: {
					limit: 10
				},
				sort: true,
				search: true,






			}).render(document.getElementById("attendance_approvals-table")); // card Table
		}
	});
</script>
@endsection