@extends('layouts.master')
@section('title')
@lang('translation.dashboards')
@endsection
@section('content')
@component('components.attendance_breadcrumb')
@slot('li_1')@endslot
@endcomponent

<div class="card flex-fill project-wrapper">
	<div class="d-flex px-3 justify-content-end">
		<div class="pt-2 text-md-end text-center me-3">
			<a  class="btn btn-custom-outline-secondary position-relative " href="#">
				Leave Requests
				<div class="position_absolute-count">
					<span>2</span>
				</div>
			</a>
		</div>
		<div class="pt-2 text-md-start text-center me-3">
			<a  class="btn btn-custom-outline-secondary" href="{{route('attendance-leavepolicy')}}">
				Leave Policy
			</a>
		</div>
		<div class="pt-2 text-md-start text-center">
			<button type="button" class="btn btn-custom-primary">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date me-1" viewBox="0 0 16 16">
					<path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
					<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
				</svg>
				FY 2022 - 23
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-chevron-down ms-2" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
				</svg>
			</button>
		</div>
	</div>
	<div class="card-body">
		<div class="card profile-box flex-fill card-top-border w-100">
			<div class="card-body">
				<div class="row p-2">
					<div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
						<h6 class="text-left fw-bold">Leave Balance</h6>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body">
								<div class="text-center">
									<p class="text-muted f-15">Available</p>
									<h4 class="fw-bold text-primary mb-0">9<span class="text-secondary">/12</span></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Accrued so Far</p>
								<h4 class="fw-bold text-primary mb-0">20</h4>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Carryover</p>
								<h4 class="fw-bold text-primary mb-0">10</h4>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Carryover</p>
								<h3 class="fw-bold text-primary mb-0">25</h3>
								<div class="text-right">
									<button type="button" class="btn btn-orange">
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
				<div class="row p-2">
					<div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
						<h6 class="text-left fw-bold">Leave Availed</h6>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body">
								<div class="text-center">
									<p class="text-muted f-15">Available</p>
									<h4 class="fw-bold text-primary mb-0">9</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Accrued so Far</p>
								<h4 class="fw-bold text-primary mb-0">20</h4>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Carryover</p>
								<h4 class="fw-bold text-primary mb-0">10</h4>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Carryover</p>
								<h3 class="fw-bold text-primary mb-0">25</h3>
								<div class="text-right">
									<button type="button" class="btn btn-orange">
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
			</div>
		</div>
		<div class="card profile-box flex-fill card-top-border w-100">
			<div class="card-body">
				<div class="row p-2">
					<div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
						<h6 class="text-left fw-bold">Team Leave Balance</h6>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body">
								<div class="text-center">
									<p class="text-muted f-15">Total employee</p>
									<h4 class="fw-bold text-primary mb-0">9</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Accrued so Far</p>
								<h4 class="fw-bold text-primary mb-0">20</h4>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Carryover</p>
								<h4 class="fw-bold text-primary mb-0">10</h4>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Carryover</p>
								<h3 class="fw-bold text-primary mb-0">25</h3>
								<div class="text-right">
									<button type="button" class="btn btn-orange">
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
				<div class="row p-2">
					<div class="col-sm-12 col-xl-12 col-md-12 col-lg-12">
						<h6 class="text-left fw-bold">Leave Availed</h6>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body">
								<div class="text-center">
									<p class="text-muted f-15">Available</p>
									<h4 class="fw-bold text-primary mb-0">9</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Accrued so Far</p>
								<h4 class="fw-bold text-primary mb-0">20</h4>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Carryover</p>
								<h4 class="fw-bold text-primary mb-0">10</h4>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xl-3 col-md-3 col-lg-3">
						<div class="card shadow small-card left-line">
							<div class="card-body text-center">
								<p class="text-muted f-15">Carryover</p>
								<h3 class="fw-bold text-primary mb-0">25</h3>
								<div class="text-right">
									<button type="button" class="btn btn-orange">
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
			</div>
		</div>
	</div>
</div>

@endsection
@section('script')
<script>
</script>
@endsection