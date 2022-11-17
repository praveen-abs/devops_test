@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/hr_dashboard.css') }}" rel="stylesheet">
@endsection
@section('content')
    {{-- @component('components.paycheck_breadcrumb')
@slot('li_1') @endslot
@endcomponent --}}
    <div class="container-fluid mt-30">
        <div class="card shadow mb-2 mt-30 investments-wrapper">
            <div class="card-body pb-0 pt-1">
                <ul class="nav nav-pills    nav-tabs-dashed" id="pills-tab" role="tablist">
                    <li class="nav-item active ember-view mx-4" role="presentation">
                        <a class="nav-link active ember-view " id="pills-home-tab" data-bs-toggle="pill" href=""
                            data-bs-target="#investment_dec" role="tab" aria-controls="pills-home" aria-selected="true">
                            Declaration</a>
                    </li>
                    <li class="nav-item  ember-view mx-4" role="presentation">
                        <a class="nav-link  ember-view " id="pills-home-tab" data-bs-toggle="pill" href=""
                            data-bs-target="#exemptions" role="tab" aria-controls="pills-home" aria-selected="true">
                            Investments and Exemptions</a>
                    </li>
                    <li class="nav-item  ember-view mx-4" role="presentation">
                        <a class="nav-link  ember-view " id="pills-home-tab" data-bs-toggle="pill" href=""
                            data-bs-target="#form_12bb" role="tab" aria-controls="pills-home" aria-selected="true">
                            Form 12 BB</a>
                    </li>
                    <li class="nav-item  ember-view mx-4" role="presentation">
                        <a class="nav-link  ember-view " id="" data-bs-toggle="pill" href=""
                            data-bs-target="#tax_filling" role="tab" aria-controls="pills-home" aria-selected="true">
                            Tax Filling</a>
                    </li>


                </ul>




            </div>
        </div>
        <div class="card top-line mb-0">
            <div class="card-body">
                <div class="tab-content " id="pills-tabContent">

                    <div class="tab-pane fade show active " id="investment_dec" role="tabpanel" aria-labelledby="pills-home-tab">

                    </div>
                    <div class="tab-pane fade " id="exemptions" role="tabpanel" aria-labelledby="pills-home-tab">

                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xxl-6 col-xl-6">
                                <h6>Tax Saving Investment </h6>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xxl-6 col-xl-6">
                                <div class="d-flex justify-content-end">
                                    <select name="" id=""
                                        class="border-orange w-50 form-select disabled_focus">
                                        <option value="" selected hidden disabled>Apr 2022 - Mar 2023 </option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="widget-card mb-3">

                            <div class="row">
                                <div class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 d-flex">
                                    <div class="card box_shadow_0 border-rtb  left-line w-100">
                                        <div class="card-body text-center">
                                            <p class="text-ash-medium mb-2 f-13 ">Max Limit</p>
                                            <h5 class="mb-0">INR 1,50,000</h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 d-flex">
                                    <div class="card box_shadow_0 border-rtb  left-line w-100">
                                        <div class="card-body text-center">
                                            <p class="text-ash-medium mb-2 f-13 ">Amount Declared</p>
                                            <h5 class="mb-0">INR 1,50,000</h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 d-flex">
                                    <div class="card box_shadow_0 border-rtb  left-line w-100">
                                        <div class="card-body text-center">
                                            <p class="text-ash-medium mb-2 f-13 ">Auto Approved Amount</p>
                                            <h5 class="mb-0">INR 1,50,000</h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 d-flex">
                                    <div class="card box_shadow_0 border-rtb  left-line w-100">
                                        <div class="card-body text-center">
                                            <p class="text-ash-medium mb-2 f-13 ">Amount Accepted</p>
                                            <h5 class="mb-0">INR 1,50,000</h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-sm-12 col-xl-3 col-md-3 col-lg-3 d-flex">
                                    <div class="card box_shadow_0 border-rtb  left-line w-100">
                                        <div class="card-body text-center">
                                            <p class="text-ash-medium mb-2 f-13 ">Amount Rejected</p>
                                            <h5 class="mb-0">INR 1,50,000</h5>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="investments_exemptinos-table" id="investments_exemptinos">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sections</th>
                                            <th scope="col">Particulars</th>
                                            <th scope="col">References</th>
                                            <th scope="col">Max Limit</th>
                                            <th scope="col">Declaration Amount</th>
                                            <th scope="col">Proof</th>
                                            <th scope="col">Upload Document</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="8">
                                                <p class="text-center fw-bold f-15 text-primary">Reimbursement</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section 17(2)</td>
                                            <td>Vehicle Reimbursement</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="If Cubic Capacity is below 1.6 ltrs (1600CC) expenses can be considered upto 1800pm & If Cubic Capacity is above 1.6 ltrs then  expenses can be considered upto 2400pm">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>28800</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section 17(2)</td>
                                            <td>Driver Reimbursement</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Maximum exemption will be restricted to Rs.900/- per month or amount paid under CTC  whichever is less.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>10800</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section 17(2)</td>
                                            <td>Vehicle Reimbursement</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Exemption will be restricted to the extend of bills provided or as per CTC, whichever is less. Maximum amount of exemption is ">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>36000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="8">
                                                <p class="text-center fw-bold f-15 text-primary">Exemptions under Section
                                                    10</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Section
                                                10(13A)</td>
                                            <td>House Rent Allowance</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Exemption will be provide the Least of:
                                                a) Actual HRA paid
                                                b) Rent paid subtract (-)10% of Basic salary
                                                c) for Metro 50% of Basic salary (Mumbai, Kolkata, Delhi or Chennai)
                                                For non metro 40% of Basic salary">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>28800</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section 10(14)</td>
                                            <td>Driver Reimbursement</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=" Up to Rs. 100 per month per child up to a maximum of 2 children is exempt">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>2400</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section 10(14)</td>
                                            <td>Hostel Expenditure Allowance</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Up to Rs. 300 per month per child up to a maximum of 2 children is exempt:
                                              a) The exemption shall be limited to fare for going anywhere in India along with family twice in a block of four years:                                                                                              b) Current Block Years – 2022 – 2025·                                                                                                       c) Two journeys in a block of 4 calendar years is exempt.                                                          d) Exemption limit where journey is performed by Air - Air fare of economy class in the National Carrier by the shortest route or the amount spent, whichever is less. e) Exemption limit where journey is performed by Rail - Air-conditioned first class rail fare by the shortest route or the amount spent, whichever is less.                           f) Exemption limit if places of origin of journey and destination are connected by rail but the journey is performed by any other mode of transport - Air-conditioned first class rail fare by the shortest route or the amount spent, whichever is less.             g) LTA Includes family  means : Spouse, Children, Parents, brothers and sisters wholly or mainly dependent on the individual">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>7200</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="8">
                                                <p class="text-center fw-bold f-15 text-primary">Previous Employer Income
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Previous Employer Income</td>
                                            <td>Previous Employer Gross</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Please refer 'Gross Income' in your last month Tax Sheet provided by your previous employer">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Previous Employer Income</td>
                                            <td>Previous Employer Standard Deduction</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Please refer 'Standard Deduction Column' in your last month Tax Sheet provided by your previous employer">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Previous Employer Income</td>
                                            <td>Previous Employer PT</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Please refer 'Profession Tax' in your last month Tax Sheet provided by your previous employer">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>Previous Employer Income</td>
                                            <td>Previous Employer PF</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Please refer 'Employee PF Deduction' in your last month Tax Sheet provided by your previous employer">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Previous Employer Income</td>
                                            <td>Previous Employer TDS</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Please refer 'TDS Deducted' in your last month Tax Sheet provided by your previous employer">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="8">
                                                <p class="text-center fw-bold f-15 text-primary">Income from other Sources
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Other Income</td>
                                            <td>Income earned from other sources</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Income earned from other sources within the financial year">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Sec 80TTA</td>
                                            <td>Interest from Savings</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Interest income earned from a saving account, Post office and FD">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Sec 80TTB</td>
                                            <td>Interest from Savings</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Interest income earned from a saving account, Post office and FD Senior Citizen">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>



                                        <tr>
                                            <td colspan="8">
                                                <p class="text-center fw-bold f-15 text-primary">Exemptions under Section
                                                    24</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section 24</td>
                                            <td>Self Occupied Property</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Exemption on Interest on Housing Property:

                                               a) House Property – Self – Maximum limit of Rs.200000/- is eligible.
                                               b) House Property – Deemed Let-out – (Nominal Rent Received – Municipal Tax)- 30% of (Rent Received – Municipal Tax) – Interest Amount (Maximum Limit up to Rs.200000 ) after considering the calculation
                                               c) House Property – Let-out – (Rent Received – Municipal Tax)- 30% of (Rent Received – Municipal Tax) – Interest Amount. Interest Amount (Maximum Limit up to Rs.200000 ) after considering the calculation">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>200000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="8">
                                                <p class="text-center fw-bold f-15 text-primary">Section 80 C & 80CCC</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section 80C</td>
                                            <td>Employee PF (Deducted from Salary)</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Employee’s PF contribution is eligible for deduction under section 80C of Income tax Act. This means that your PF contribution is exempted under section 80C. Maximum exemption of 1.5 lakh per annum is fixed for all investments under Section 80C.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Voluntary Provident Fund (Deducted from Salary)</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Employee’s VPF contribution is eligible for deduction under section 80C of Income tax Act. This means that your VPF contribution is exempted under section 80C. Maximum exemption of 1.5 lakh per annum is fixed for all investments under Section 80C.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Public Provident Fund</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="All deposits made in Public Provident Fund (PPF) are deductible under Section 80C of the Income Tax Act. Also, the accumulated amount and interest is exempted from tax at the time of withdrawal.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>Previous PF</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Provident Fund deducted by the previous Employer">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Life Insurance Pol+B53icy</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="You can claim deduction from your taxable income on account of premium paid towards life insurance for self, spouse or children. In case of insurance policies issued on or after 1st April, 2012, deduction of 10% of the sum assured will be allowed up to a maximum of Rs. 1.5 lac.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Housing Loan Principal</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="For Home Loan, u/s 80C, deduction upto Rs. 1,50,000 is allowed on Principal repayment, stamp duty & registration charges, in the year in which actual principal amount is paid.C43:C50">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Mutual Funds</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Investment in mutual funds for tax saving purpose is called Equity Linked Saving Schemes (ELSS) which qualifies for Section 80C deduction. Not all mutual funds can provide 80C deduction. Examples of ELSS: SBI Magnum Tax Gain, HDFC Tax Saver, Fidelity Tax Advantage, etc.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>National Saving Certificate</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="The National Savings Certificate (NSC) is an investment scheme floated by the Government of India. It offers guaranteed interest and capital protection. NSC can be bought from most post offices in India, and is easily accessible. Investments of up to Rs 1.5 lakh in the scheme qualifies for deduction u/s 80C of the Income Tax Act. Furthermore, the interest earned on the certificates are also added back to the initial investment and qualify for a tax exemption as well.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Unit Linked Investment Plan</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Unit Linked Insurance Plan (ULIP) is a combination of insurance and investment. The goal of ULIP is to provide wealth creation along with life cover. ULIP provider invests a portion of your investment towards life insurance and rest into a fund. All ULIPs qualify as life insurance policy and the premiums are exempted from income tax benefit. Deduction is available on ULIPS under Section 80C, provided the sum assured is at least 10 times the annual premium.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Tuition Fees</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Any amount paid as tuition fee for the education of the first two children of the employee/tax payer is eligible for deduction u/s 80C of Income Tax Act. A parent can claim a deduction on the amount paid as tuition fees to any university, college, school or any other educational institution. Other components of fees such as development fees, transport fees are not eligible for deduction u/s 80C. Only tuition fees part of the total fees paid is allowed for deduction.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Fixed Deposit</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="The amount invested in Scheduled Bank FD is exempted u/s 80C of the Income Tax Act. There is a compulsory lock-in of five years under Scheduled Bank FD and the fund cannot be withdrawn before completion of the period. Also, the interest earned under an FD is taxable under 'income from other sources'">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Deferred Annuity</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Sum paid under non-commutable deferred annuity for an individual on the life of the taxpayer, spouse or any child is allowed for deduction. This is nothing but a standard pension plan eligible for tax exemption under Section 80C. Example of such schemes are, Jeevan Dhara, Jeevan Akshay, Jeeven Suraksha etc. by LIC or Pension Plus plan by HDFC Standard Life.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Super Annuation Fund</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="A superannuation fund is a retirement fund offered by your employer. The employer contributes 15% of your basic salary to this fund. It is not mandatory for you as an employee to contribute to the fund, but you may do so if you wish. Employee’s contribution is exempt from taxation u/s 80C of Income Tax Act.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Sukanya Samriddhi Scheme</td>
                                            <td>

                                                <button type="button" class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Also referred to as the girl child prosperity scheme. Only one account per girl child is allowed to a maximum of two girl children.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>NABARD Notified Bonds</td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="NABARD is an apex development institution, owned by Government of India and works towards the development and upliftment of rural India. The bonds are issued by NABARD (National Bank for Agriculture and Rural Development) and an Investment in NABARD Rural Bonds or NABARD tax free bonds qualifies for Deduction u/s 80 C.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Mutual Pension Scheme</td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="There are a few retirement schemes from mutual funds that would help you to save taxes under Section 80C. Example of such schemes are, Franklin India Pension Fund, UTI Retirement Benefit Pension Fund, Reliance Retirement Fund, HDFC Retirement Savings Fund and Tata Retirement Savings Fund.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td colspan="8">
                                                <p class="text-center fw-bold f-15 text-primary">Chapter VI - Other
                                                    Exemptions</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section 80CCD (1B)</td>
                                            <td>NPS Employee Contribution</td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Additional exemption up to Rs 50,000 in NPS is eligible for income tax deduction. It is irrespective of the type of employment, i.e., a government employee, a private sector employee, or self-employed can claim benefit of Rs 50,000 under Section 80CCD(1B).">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>50000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section 80CCD (2)</td>
                                            <td>NPS Employer Contribution</td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Employer’s contribution up to 10% of (Basic + DA) is eligible for deduction under this section, it is an additional deduction as it is not part of deduction under section 80CCE = [80C + 80CCC + 80CCD(1)]. In the Union Budget 2020, It has been proposed that an aggregate limit of Rs 7.5 lakh covering employer contributions to the Provident fund (PF), National Pension System (NPS) and superannuation fund. Any contribution beyond this limit will, therefore, will be taxable">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section 80D </td>
                                            <td>Medical Insurance Premium</td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="You can claim a deduction up to Rs. 25,000 per year for medical insurance premium. The premium can be for you, your spouse, and dependent children. In case, you or your spouse is 60 years or above, you can claim a deduction up to Rs. 50,000.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section 80D</td>
                                            <td>Preventive Health Check Up</td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="You can claim deduction up to Rs. 5,000 per year on preventive health check-ups.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Parents Medical Insurance Premium</td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="You can claim a deduction up to Rs. 25,000 per year for medical insurance premium for your parents. In case, your father or mother, or either of them is a senior citizen, you can claim a deduction up to Rs. 50,000.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Parents Preventive Health Check Up</td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="You can claim deduction up to Rs. 5,000 per year on preventive health check-ups.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section DD</td>
                                            <td>Medical Expenditure for a Disabled Dependant
                                                Disability>40% <80%>80% </td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="• Deduction allowed up to Rs.75,000 for taking care of disabled persons with 40% or more of one or more disability.
                                               • Deduction allowed up to Rs.1.25 lakhs p.a. for taking care of disabled persons with 80% or more of one or more disability.
                                               • Dependents imply spouse, children, siblings or parents of an individual or any member of the family in an HUF.
                                               ">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>75000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section DDB</td>
                                            <td>Medical Expenditure on Self or Dependant for Specified Disease
                                                Age <60 yrs>60 yrs</td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Deduction under section 80DDB is allowed for medical expenses incurred for medical treatment of specified diseases or ailments. The nature of diseases and ailments which are included for deduction under Section 80DDB are mentioned below:
                                               1. Neurological Diseases as identified by a specialist ,where the level of disability has been certified to be of 40% and above and covers Dementia, Dystonia Musculorum Deformans, Chorea, Motor Neuron Disease, Ataxia, Aphasia, Parkinson’s Disease and Hemiballismus.
                                               2. Malignant Cancer
                                               3. AIDS- Acquired Immuno-Deficiency Syndrome
                                               4. Chronic Renal failure
                                               5. Hematological disorders like Hemophilia or Thalassaemia.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>100000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section 80E</td>
                                            <td>Repayment of Interest on Higher Education</td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="You can claim deduction of Interest paid on a loan taken for pursuing higher education from taxable* income under section 80E of the Income Tax Act, 1961*.
                                               According to Section 80E*, the deduction is allowed on the total interest amount of the EMI paid during the financial year. The loan has to be taken from a bank or financial institution to pursue higher studies.
                                               Interest amount paid during the financial year is allowable as deduction from taxable* income. There is no limit on the deduction amount. The benefit of deduction is available for a maximum of 8 years or till the interest is paid- whichever is earlier. It is applicable even when you have taken an education loan for your spouse, children or for a student for whom you are legal guardian.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td></td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section 80EE</td>
                                            <td>Additional Relief on home loan interest (First-home Buyers FY 2016-2017)
                                            </td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="• The deduction is up to Rs 50,000. It is over and above the Rs 2 lakh limit under Section 24 of the Income Tax Act.
                                               • Value of the House should be Rs.50 Lacs or less
                                               • Loan taken for the house must be Rs.35 lakhs or less
                                               • The loan must be sanctioned by a financial institution or a housing finance company
                                               • The loan must be sanctioned between FY 01.04.2016 to 31.03.2017 (AY 2017 – 2018) and the deduction is allowed for up to Rs.50000 per year until the loan is repaid.
                                               ">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>50000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section 80EEA</td>
                                            <td>Additional Relief on home loan interest (First-home Buyers FY 2019-2020)
                                            </td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="• Section 80EEA has been inserted to allow for an interest deduction from FY - 1st April 2019 and 31st March 2022.
                                               • A deduction for interest payments up to Rs 1,50,000 is available under Section 80EEA. This deduction is over and above the deduction of Rs 2 lakh for interest payments available under Section 24(b) of the Income Tax Act.
                                               • Housing loan must be taken from a financial institution or a housing finance company for buying a residential house property.
                                               • The loan should be sanctioned during the period 1st April 2019 and 31st March 2022.
                                               • Stamp duty value of the house property should be Rs 45 lakhs or less.
                                               • The individual taxpayer should not be eligible to claim deduction under the existing Section 80EE.
                                               • The taxpayer should be a first-time home buyer. The taxpayer should not own any residential house property as on the date of sanction of the loan.
                                               • This deduction can be claimed until you have repaid the housing loan.">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Section 80EEB</td>
                                            <td>Dedution of Interest on loan acquiring Electric Vehicle</td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-transprarent border-0 outline-none "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="a) The loan must be taken from a financial institution or a non-banking financial company for buying an electric vehicle.
                                               b) The loan must be sanctioned anytime during the period starting from 1 April 2019 till 31 March 2023.
                                               c) “Electric vehicle” has been defined to mean a vehicle which is powered exclusively by an electric motor whose traction energy is supplied exclusively by traction battery installed in the vehicle and has such electric regenerative braking system, which during braking provides for the conversion of vehicle kinetic energy into electrical energy.
                                               d) A deduction for interest payments up to Rs 1,50,000 is available under Section 80EEB">
                                                    <i class="fa fa-exclamation-circle  text-warning"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>150000</td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                            <td>
                                                <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                    cols="18" rows="2"></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>





                    </div>
                    <div class="tab-pane fade " id="form_12bb" role="tabpanel" aria-labelledby="pills-home-tab">

                    </div>
                    <div class="tab-pane fade " id="tax_filling" role="tabpanel" aria-labelledby="pills-home-tab">

                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>

    <script></script>
@endsection
