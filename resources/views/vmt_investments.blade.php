@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/payCheck.css') }}">
@endsection
@section('content')
    <div class=" mt-30 investments-wrapper">
        <div class="card shadow  left-line mb-2 ">
            <div class="card-body pb-0 pt-1">
                <ul class="nav nav-pills    nav-tabs-dashed" id="pills-tab" role="tablist">
                    <li class="nav-item   mx-4" role="presentation">
                        <a class="nav-link active  " id="" data-bs-toggle="pill" href=""
                            data-bs-target="#investment_dec" role="tab" aria-controls="pills-home" aria-selected="true">
                            Declaration</a>
                    </li>
                    <li class="nav-item   mx-4" role="presentation">
                        <a class="nav-link   " id="" data-bs-toggle="pill" href=""
                            data-bs-target="#exemptions" role="tab" aria-controls="pills-home" aria-selected="true">
                            Investments and Exemptions</a>
                    </li>
                    <li class="nav-item   mx-4" role="presentation">
                        <a class="nav-link   " id="" data-bs-toggle="pill" href=""
                            data-bs-target="#form_12bb" role="tab" aria-controls="pills-home" aria-selected="true">
                            Form 12 BB</a>
                    </li>
                    <li class="nav-item   mx-4" role="presentation">
                        <a class="nav-link   " id="" data-bs-toggle="pill" href=""
                            data-bs-target="#tax_filling" role="tab" aria-controls="pills-home" aria-selected="true">
                            Tax Filling</a>
                    </li>



                </ul>
            </div>
        </div>
        <div class="card top-line mb-0">
            <div class="card-body">
                <div class="tab-content " id="pills-tabContent">
                    <div class="tab-pane fade active show" id="investment_dec" role="tabpanel" aria-labelledby="">
                        <div class="text-center">
                            <div class="d-flex justify-content-center">
                                <div style="height: 300px;max-width:500px;" class="">
                                    <img src="{{ URL::asset('assets/images/no_dataFile.svg') }}" class="h-100 w-100"
                                        alt="user-pic" </div>
                                </div>

                            </div>
                            <h4> <span class="text-orange">Sorry !</span> No data</h4>
                        </div>
                    </div>
                    <div class="tab-pane fade  " id="exemptions" role="tabpanel">

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
                            <div class="grid md:grid-cols-2 xl:grid-cols-4 lg:grid-cols-4 gap-4">
                                <div class="tw-card text-center bg-orange-50 border-l-orange-400 border-l-4 ">
                                    <p class="text-ash-medium mb-2 f-13 ">Maximum Limit</p>
                                    <h6 class="mb-0 text-gray-500 text-base font-semibold">-</h6>
                                </div>
                                <div class="tw-card text-center bg-indigo-50 border-l-indigo-400 border-l-4 ">
                                    <p class="text-ash-medium mb-2 f-13 "> Declared Amount</p>
                                    <h6 class="mb-0 text-gray-500 text-base font-semibold">-</h6>
                                </div>

                                <div class="tw-card text-center bg-green-50 border-l-green-400 border-l-4 ">
                                    <p class="text-ash-medium mb-2 f-13 ">Status</p>
                                    <h6 class="mb-0 text-gray-500 text-base font-semibold">Not Submited</h6>
                                </div>
                                <div class="tw-card text-center bg-violet-50 border-l-violet-400 border-l-4 ">
                                    <p class="text-ash-medium mb-2 f-13 ">Late Date For Submission</p>
                                    <h6 class="mb-0 text-gray-500 text-base font-semibold">-</h6>
                                </div>
                            </div>
                        </div>

                        <div class="card left-line shadow mb-2">
                            <div class="card-body pb-0 pt-1">
                                <ul class="nav nav-pills    nav-tabs-dashed" id="pills-tab" role="tablist">
                                    <li class="nav-item   " role="presentation">
                                        <a class="nav-link active " id="" data-bs-toggle="pill" href=""
                                            data-bs-target="#house_property" role="tab" aria-controls=""
                                            aria-selected="true">
                                            HRA
                                        </a>
                                    </li>

                                    <li class="nav-item   " role="presentation">
                                        <a class="nav-link    " id="" data-bs-toggle="pill" href=""
                                            data-bs-target="#c_cc" role="tab" aria-controls="" aria-selected="true">
                                            Section 80C & 80CCC</a>
                                    </li>
                                    <li class="nav-item   " role="presentation">
                                        <a class="nav-link    " id="" data-bs-toggle="pill" href=""
                                            data-bs-target="#income_loss" role="tab" aria-controls=""
                                            aria-selected="true">
                                            Income/Loss from Housing Property</a>
                                    </li>
                                    <li class="nav-item   " role="presentation">
                                        <a class="nav-link   mx-0 mx-xl-3 " id="" data-bs-toggle="pill"
                                            href="" data-bs-target="#other_exemptions" role="tab"
                                            aria-controls="" aria-selected="true">
                                            Other Exemptions
                                        </a>
                                    </li>

                                    <li class="nav-item   " role="presentation">
                                        <a class="nav-link   mx-0  mx-xl-3 " id="" data-bs-toggle="pill"
                                            href="" data-bs-target="#reimbursement" role="tab"
                                            aria-controls="" aria-selected="true">
                                            Reimbursement
                                        </a>
                                    </li>
                                    <li class="nav-item   mx-4" role="presentation">
                                        <a class="nav-link   " id="" data-bs-toggle="pill" href=""
                                            data-bs-target="#section24" role="tab" aria-controls="pills-home"
                                            aria-selected="true">
                                            Section 24</a>
                                    </li>
                                    <li class="nav-item   " role="presentation">
                                        <a class="nav-link   " id="" data-bs-toggle="pill" href=""
                                            data-bs-target="#previous_income" role="tab" aria-controls=""
                                            aria-selected="true">
                                            Previous Employer Income
                                        </a>
                                    </li>
                                    <li class="nav-item   " role="presentation">
                                        <a class="nav-link   mx-0  mx-xl-3 " id="" data-bs-toggle="pill"
                                            href="" data-bs-target="#other_income" role="tab"
                                            aria-controls="" aria-selected="true">
                                            Other Source Of Income
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="tab-content " id="">
                            <div class="tab-pane fade active show " id="house_property" role="tabpanel"
                                aria-labelledby="">
                                <div class="table-responsive mb-3">
                                    <table class="table investment_table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sections</th>
                                                <th scope="col">Particulars</th>
                                                <th scope="col">References</th>
                                                <th scope="col">Max Limit</th>
                                                <th scope="col">Declaration Amount</th>
                                                <th scope="col">Proofs</th>

                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Section
                                                    10(13A)</td>
                                                <td>House Rent Allowance</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-transprarent border-0 outline-none "
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
                                                    {{-- <textarea name="" id="" class="text-box outline-none border-0 form-control resize-none " disabled
                                                        cols="5" rows="1"></textarea> --}}
                                                    <button data-bs-target="#AddRendted_modal" data-bs-toggle="modal"
                                                        class="text-white py-1.5 w-full rounded-md  bg-indigo-800">Add</button>
                                                </td>
                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>

                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>

                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>


                                <div class="tw-card bg-gray-100">
                                    <div class="flex mb-3 justify-between">
                                        <span class="text-lg text-indigo-950 font-semibold">Rental Property</span> <button
                                            class="btn btn-border-orange" data-bs-target="#AddRendted_modal"
                                            data-bs-toggle="modal"><i class="fa fa-plus-circle me-2"
                                                aria-hidden="true"></i>
                                            Add Rented</button>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-xl-12 col-xxl-12 col-lg-12 mb-3">
                                        <div class="table-responsive mb-3">
                                            <table class="table investment_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Landlord Name</th>
                                                        <th scope="col">Landlord PAN</th>
                                                        <th scope="col">From Month</th>
                                                        <th scope="col">To Month</th>
                                                        <th scope="col">City</th>
                                                        <th scope="col">Total Rent</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>

                                                        </td>
                                                        <td>

                                                        </td>
                                                        <td>

                                                        </td>
                                                        <td>

                                                        </td>
                                                        <td>

                                                        </td>
                                                        <td>

                                                        </td>
                                                        <td>

                                                        </td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>




                                </div>
                            </div>
                            <div class="tab-pane fade  " id="c_cc" role="tabpanel" aria-labelledby="">
                                <div class="table-responsive">
                                    <table class="table investment_table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sections</th>
                                                <th scope="col">Particulars</th>
                                                <th scope="col">References</th>
                                                <th scope="col">Maximum Limit (<i class="fa fa-rupee mx-1"></i>150000)
                                                </th>
                                                <th scope="col">Declaration Amount</th>
                                                <th scope="col">Proofs</th>
                                                {{-- <th scope="col">Upload Document</th> --}}
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="">80C</td>
                                                <td>Employee PF (Deducted from Salary)</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-transprarent border-0 outline-none "
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Employee’s PF contribution is eligible for deduction under section 80C of Income tax Act. This means that your PF contribution is exempted under section 80C. Maximum exemption of 1.5 lakh per annum is fixed for all investments under Section 80C.">
                                                        <i class="fa fa-exclamation-circle  text-warning"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>

                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>

                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>

                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan=""> 80C</td>
                                                <td>Voluntary Provident Fund (Deducted from Salary)</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-transprarent border-0 outline-none "
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Employee’s VPF contribution is eligible for deduction under section 80C of Income tax Act. This means that your VPF contribution is exempted under section 80C. Maximum exemption of 1.5 lakh per annum is fixed for all investments under Section 80C.">
                                                        <i class="fa fa-exclamation-circle  text-warning"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td></td>

                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>

                                                <td align="">

                                                    <div class="upload_file ">
                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>

                                                    </div>

                                                </td>
                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>
                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>80c</td>
                                                <td>Public Provident Fund</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-transprarent border-0 outline-none "
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="All deposits made in Public Provident Fund (PPF) are deductible under Section 80C of the Income Tax Act. Also, the accumulated amount and interest is exempted from tax at the time of withdrawal.">
                                                        <i class="fa fa-exclamation-circle  text-warning"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>

                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>
                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>
                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>80C</td>
                                                <td>Previous PF</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-transprarent border-0 outline-none "
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Provident Fund deducted by the previous Employer">
                                                        <i class="fa fa-exclamation-circle  text-warning"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>
                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>

                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>
                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>80C</td>
                                                <td>Life Insurance Pol+B53icy</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-transprarent border-0 outline-none "
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="You can claim deduction from your taxable income on account of premium paid towards life insurance for self, spouse or children. In case of insurance policies issued on or after 1st April, 2012, deduction of 10% of the sum assured will be allowed up to a maximum of Rs. 1.5 lac.">
                                                        <i class="fa fa-exclamation-circle  text-warning"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>
                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>

                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>
                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>80C</td>
                                                <td>Housing Loan Principal</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-transprarent border-0 outline-none "
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="For Home Loan, u/s 80C, deduction upto Rs. 1,50,000 is allowed on Principal repayment, stamp duty & registration charges, in the year in which actual principal amount is paid.C43:C50">
                                                        <i class="fa fa-exclamation-circle  text-warning"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>

                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>
                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>
                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>80C</td>
                                                <td>Mutual Funds</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-transprarent border-0 outline-none "
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Investment in mutual funds for tax saving purpose is called Equity Linked Saving Schemes (ELSS) which qualifies for Section 80C deduction. Not all mutual funds can provide 80C deduction. Examples of ELSS: SBI Magnum Tax Gain, HDFC Tax Saver, Fidelity Tax Advantage, etc.">
                                                        <i class="fa fa-exclamation-circle  text-warning"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>

                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>
                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>
                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>80C</td>
                                                <td>National Saving Certificate</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-transprarent border-0 outline-none "
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="The National Savings Certificate (NSC) is an investment scheme floated by the Government of India. It offers guaranteed interest and capital protection. NSC can be bought from most post offices in India, and is easily accessible. Investments of up to Rs 1.5 lakh in the scheme qualifies for deduction u/s 80C of the Income Tax Act. Furthermore, the interest earned on the certificates are also added back to the initial investment and qualify for a tax exemption as well.">
                                                        <i class="fa fa-exclamation-circle  text-warning"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>

                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>
                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>
                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>80C</td>
                                                <td>Unit Linked Investment Plan</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-transprarent border-0 outline-none "
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Unit Linked Insurance Plan (ULIP) is a combination of insurance and investment. The goal of ULIP is to provide wealth creation along with life cover. ULIP provider invests a portion of your investment towards life insurance and rest into a fund. All ULIPs qualify as life insurance policy and the premiums are exempted from income tax benefit. Deduction is available on ULIPS under Section 80C, provided the sum assured is at least 10 times the annual premium.">
                                                        <i class="fa fa-exclamation-circle  text-warning"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>
                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>

                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>
                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>80C</td>
                                                <td>Tuition Fees</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-transprarent border-0 outline-none "
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Any amount paid as tuition fee for the education of the first two children of the employee/tax payer is eligible for deduction u/s 80C of Income Tax Act. A parent can claim a deduction on the amount paid as tuition fees to any university, college, school or any other educational institution. Other components of fees such as development fees, transport fees are not eligible for deduction u/s 80C. Only tuition fees part of the total fees paid is allowed for deduction.">
                                                        <i class="fa fa-exclamation-circle  text-warning"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>

                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>
                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>
                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>80C</td>
                                                <td>Fixed Deposit</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-transprarent border-0 outline-none "
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="The amount invested in Scheduled Bank FD is exempted u/s 80C of the Income Tax Act. There is a compulsory lock-in of five years under Scheduled Bank FD and the fund cannot be withdrawn before completion of the period. Also, the interest earned under an FD is taxable under 'income from other sources'">
                                                        <i class="fa fa-exclamation-circle  text-warning"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>

                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>
                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>
                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>80C</td>
                                                <td>Deferred Annuity</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-transprarent border-0 outline-none "
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Sum paid under non-commutable deferred annuity for an individual on the life of the taxpayer, spouse or any child is allowed for deduction. This is nothing but a standard pension plan eligible for tax exemption under Section 80C. Example of such schemes are, Jeevan Dhara, Jeevan Akshay, Jeeven Suraksha etc. by LIC or Pension Plus plan by HDFC Standard Life.">
                                                        <i class="fa fa-exclamation-circle  text-warning"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>

                                                </td>
                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>
                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>
                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>80C</td>
                                                <td>Super Annuation Fund</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-transprarent border-0 outline-none "
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="A superannuation fund is a retirement fund offered by your employer. The employer contributes 15% of your basic salary to this fund. It is not mandatory for you as an employee to contribute to the fund, but you may do so if you wish. Employee’s contribution is exempt from taxation u/s 80C of Income Tax Act.">
                                                        <i class="fa fa-exclamation-circle  text-warning"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>

                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>
                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>
                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>80c</td>
                                                <td>Sukanya Samriddhi Scheme</td>
                                                <td>

                                                    <button type="button"
                                                        class="btn btn-transprarent border-0 outline-none "
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Also referred to as the girl child prosperity scheme. Only one account per girl child is allowed to a maximum of two girl children.">
                                                        <i class="fa fa-exclamation-circle  text-warning"
                                                            aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>
                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>

                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>
                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>80C</td>
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
                                                <td></td>
                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>
                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>

                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>
                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>80CCC</td>
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
                                                <td></td>
                                                <td>
                                                    <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                        cols="5" rows="1"></textarea>
                                                </td>
                                                <td align="">

                                                    <div class="upload_file ">

                                                        <i class="fa fa-upload" aria-hidden="true"><input type="file"
                                                                name="" id="" multiple></i>


                                                    </div>

                                                </td>

                                                </td>
                                                <td>
                                                    <p>Not Submitted</p>
                                                </td>
                                                <td>


                                                    <div class="dropdown investment_dropDown">
                                                        <button
                                                            class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-pencil-square-o text-info me-2"
                                                                    aria-hidden="true"></i> Edit</a>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="fa fa-times-circle-o text-danger me-2"
                                                                    aria-hidden="true"></i> Clear</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade " id="reimbursement" role="tabpanel" aria-labelledby="">

                                <div class="card top-line mb-0 border-bottom-0 border-end-0 border-start-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table investment_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Sections</th>
                                                        <th scope="col">Particulars</th>
                                                        <th scope="col">References</th>
                                                        <th scope="col">Max Limit</th>
                                                        <th scope="col">Declaration Amount</th>
                                                        <th scope="col">Proofs</th>

                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td> 17(2)</td>
                                                        <td class="noWhite-space">

                                                            <p>Vehicle Reimbursement</p>
                                                            <div class="d-flex justify-content-center">
                                                                <div class="form-check me-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="cc" id="below_cc">
                                                                    <label class="form-check-label" for="below_cc">
                                                                        Below 1600 CC
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="cc" id="above_cc">
                                                                    <label class="form-check-label" for="above_cc">

                                                                        Above 2400 CC
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </td>
                                                        <td>

                                                            <button type="button"
                                                                class="btn btn-transprarent border-0 outline-none "
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="If Cubic Capacity is below 1.6 ltrs (1600CC) expenses can be considered upto 1800pm & If Cubic Capacity is above 1.6 ltrs then  expenses can be considered upto 2400pm">
                                                                <i class="fa fa-exclamation-circle  text-warning"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                        <td>28800</td>

                                                        <td>
                                                            <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                cols="5" rows="1"></textarea>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>Not Submitted</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td> 17(2)</td>
                                                        <td>Driver Reimbursement</td>
                                                        <td>

                                                            <button type="button"
                                                                class="btn btn-transprarent border-0 outline-none "
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Maximum exemption will be restricted to Rs.900/- per month or amount paid under CTC  whichever is less.">
                                                                <i class="fa fa-exclamation-circle  text-warning"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                        <td>10800</td>

                                                        <td>
                                                            <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                cols="5" rows="1"></textarea>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>Not Submitted</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td> 17(2)</td>
                                                        <td>Vehicle Reimbursement</td>
                                                        <td>

                                                            <button type="button"
                                                                class="btn btn-transprarent border-0 outline-none "
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Exemption will be restricted to the extend of bills provided or as per CTC, whichever is less. Maximum amount of exemption is ">
                                                                <i class="fa fa-exclamation-circle  text-warning"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                        <td>36000</td>

                                                        <td>
                                                            <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                cols="5" rows="1"></textarea>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>Not Submitted</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="section24" role="tabpanel" aria-labelledby="">
                                <div class="text-end py-3">
                                    <button data-bs-target="#section24_modal" data-bs-toggle="modal"
                                        class="py-1.5 px-4 text-white text-center rounded-md bg-indigo-600">Add
                                        New</button>

                                </div>
                                <div class="table-responsive ">
                                    <table class="table investment_table">
                                        <thead>
                                            <tr>

                                                <th scope="col">Particulars</th>
                                                <th scope="col">References</th>
                                                <th scope="col">Max Limit</th>
                                                <th scope="col">Declaration Amount</th>
                                                <th scope="col">Proofs</th>

                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="previous_income" role="tabpanel" aria-labelledby="">

                                <div class="card top-line mb-0 border-bottom-0 border-end-0 border-start-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table investment_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Sections</th>
                                                        <th scope="col">Particulars</th>
                                                        <th scope="col">References</th>
                                                        <th scope="col">Max Limit</th>
                                                        <th scope="col">Declaration Amount</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>Previous Employer Income</td>
                                                        <td>Previous Employer Gross</td>
                                                        <td>

                                                            <button type="button"
                                                                class="btn btn-transprarent border-0 outline-none "
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Please refer 'Gross Income' in your last month Tax Sheet provided by your previous employer">
                                                                <i class="fa fa-exclamation-circle  text-warning"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                        <td>

                                                        </td>
                                                        <td>
                                                            <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                cols="5" rows="1"></textarea>
                                                        </td>



                                                        <td>
                                                            <p>-</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>



                                                    </tr>

                                                    <tr>
                                                        <td>Previous Employer Income</td>
                                                        <td>Previous Employer Standard Deduction</td>
                                                        <td>

                                                            <button type="button"
                                                                class="btn btn-transprarent border-0 outline-none "
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Please refer 'Standard Deduction Column' in your last month Tax Sheet provided by your previous employer">
                                                                <i class="fa fa-exclamation-circle  text-warning"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                        <td></td>

                                                        <td>
                                                            <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                cols="5" rows="1"></textarea>
                                                        </td>


                                                        <td>
                                                            <p>-</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>



                                                    </tr>

                                                    <tr>
                                                        <td>Previous Employer Income</td>
                                                        <td>Previous Employer PT</td>
                                                        <td>

                                                            <button type="button"
                                                                class="btn btn-transprarent border-0 outline-none "
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Please refer 'Profession Tax' in your last month Tax Sheet provided by your previous employer">
                                                                <i class="fa fa-exclamation-circle  text-warning"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                        <td></td>

                                                        <td>
                                                            <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                cols="5" rows="1"></textarea>
                                                        </td>


                                                        <td>
                                                            <p>-</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td>Previous Employer Income</td>
                                                        <td>Previous Employer PF</td>
                                                        <td>

                                                            <button type="button"
                                                                class="btn btn-transprarent border-0 outline-none "
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Please refer 'Employee PF Deduction' in your last month Tax Sheet provided by your previous employer">
                                                                <i class="fa fa-exclamation-circle  text-warning"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                        <td></td>

                                                        <td>
                                                            <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                cols="5" rows="1"></textarea>
                                                        </td>


                                                        <td>
                                                            <p>-</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td>Previous Employer Income</td>
                                                        <td>Previous Employer TDS</td>
                                                        <td>

                                                            <button type="button"
                                                                class="btn btn-transprarent border-0 outline-none "
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Please refer 'TDS Deducted' in your last month Tax Sheet provided by your previous employer">
                                                                <i class="fa fa-exclamation-circle  text-warning"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                        <td></td>

                                                        <td>
                                                            <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                cols="5" rows="1"></textarea>
                                                        </td>


                                                        <td>
                                                            <p>-</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="other_income" role="tabpanel" aria-labelledby="">

                                <div class="card top-line mb-0 border-bottom-0 border-end-0 border-start-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table investment_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Sections</th>
                                                        <th scope="col">Particulars</th>
                                                        <th scope="col">References</th>
                                                        <th scope="col">Max Limit</th>
                                                        <th scope="col">Declaration Amount</th>
                                                        <th scope="col">Proofs</th>

                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Other Income</td>
                                                        <td>Income earned from other sources</td>
                                                        <td>

                                                            <button type="button"
                                                                class="btn btn-transprarent border-0 outline-none "
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Income earned from other sources within the financial year">
                                                                <i class="fa fa-exclamation-circle  text-warning"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                        <td></td>

                                                        <td>
                                                            <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                cols="5" rows="1"></textarea>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>-</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>



                                                    </tr>
                                                    <tr>
                                                        <td>Sec 80TTA</td>
                                                        <td>Interest from Savings</td>
                                                        <td>

                                                            <button type="button"
                                                                class="btn btn-transprarent border-0 outline-none "
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Interest income earned from a saving account, Post office and FD">
                                                                <i class="fa fa-exclamation-circle  text-warning"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                        <td></td>

                                                        <td>
                                                            <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                cols="5" rows="1"></textarea>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>-</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>



                                                    </tr>
                                                    <tr>
                                                        <td>Sec 80TTB</td>
                                                        <td>Interest from Savings</td>
                                                        <td>

                                                            <button type="button"
                                                                class="btn btn-transprarent border-0 outline-none "
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Interest income earned from a saving account, Post office and FD Senior Citizen">
                                                                <i class="fa fa-exclamation-circle  text-warning"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                        <td></td>

                                                        <td>
                                                            <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                cols="5" rows="1"></textarea>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>-</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="income_loss" role="tabpanel" aria-labelledby="">
                                <ul class="nav nav-pills  my-3   nav-tabs-dashed" id="pills-tab" role="tablist">
                                    <li class="nav-item   " role="presentation">
                                        <a class="nav-link active " id="" data-bs-toggle="pill"
                                            href="" data-bs-target="#self_occupied_property" role="tab"
                                            aria-controls="" aria-selected="true">
                                            Self Occupied Property
                                        </a>
                                    </li>

                                    <li class="nav-item  mx-4  " role="presentation">
                                        <a class="nav-link  " id="" data-bs-toggle="pill" href=""
                                            data-bs-target="#letOut_property" role="tab" aria-controls=""
                                            aria-selected="true">
                                            Let Out Property
                                        </a>
                                    </li>
                                    <li class="nav-item   " role="presentation">
                                        <a class="nav-link  " id="" data-bs-toggle="pill" href=""
                                            data-bs-target="#deemed_property" role="tab" aria-controls=""
                                            aria-selected="true">
                                            Deemed Let Out Property
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content " id="">
                                    <div class="tab-pane fade active show" id="self_occupied_property" role="tabpanel"
                                        aria-labelledby="">
                                        <div class="tw-card bg-gray-100">

                                            <table class="table investment_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Lender Name</th>
                                                        <th scope="col">Lender PAN</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Loss From Housing Property</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>

                                                </tbody>

                                            </table>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="letOut_property" role="tabpanel"
                                        aria-labelledby="">
                                        <div class="table-responsive ">
                                            <table class="table investment_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Lender Name</th>
                                                        <th scope="col">Lender PAN</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Rent Received</th>
                                                        <th scope="col">Municipal Tax</th>
                                                        <th scope="col">Maintenace</th>
                                                        <th scope="col">Net Value</th>
                                                        <th scope="col">Interest</th>
                                                        <th scope="col">Income/Loss</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="deemed_property" role="tabpanel"
                                        aria-labelledby="">
                                        <div class="table-responsive ">
                                            <table class="table investment_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Lender Name</th>
                                                        <th scope="col">Lender PAN</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Rent Received</th>
                                                        <th scope="col">Municipal Tax</th>
                                                        <th scope="col">Maintenace</th>
                                                        <th scope="col">Net Value</th>
                                                        <th scope="col">Interest</th>
                                                        <th scope="col">Income/Loss</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="other_exemptions" role="tabpanel" aria-labelledby="">

                                <div class="card top-line mb-0 border-bottom-0 border-end-0 border-start-0">
                                    <div class="card-body">
                                        <div class="table-responsive ">
                                            <table class="table investment_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Sections</th>
                                                        <th scope="col">Particulars</th>
                                                        <th scope="col">References</th>
                                                        <th scope="col">Max Limit</th>
                                                        <th scope="col">Declaration Amount</th>
                                                        <th scope="col">Proofs</th>

                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> 80CCD (1B)</td>
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
                                                                cols="5" rows="1"></textarea>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>Not Submitted</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td> 80CCD (2)</td>
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
                                                                cols="5" rows="1"></textarea>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>Not Submitted</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td> 80D </td>
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
                                                                cols="5" rows="1"></textarea>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>Not Submitted</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-secondary me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td>80D</td>
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
                                                                cols="5" rows="1"></textarea>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>Not Submitted</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td>80D</td>
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
                                                        <td>

                                                        <td>
                                                            <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                cols="5" rows="1"></textarea>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>-</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-secondary me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>80D</td>
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
                                                                cols="5" rows="1"></textarea>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>-</p>
                                                        </td>
                                                        <td class="">


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-secondary me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td> 80DD</td>
                                                        <td>
                                                            <p> Medical Expenditure for a Disabled Dependant Disability
                                                            </p>
                                                            <div class="d-flex justify-content-center">
                                                                <div class="form-check me-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="cc" id="below_cc">
                                                                    <label class="form-check-label" for="below_cc">
                                                                        40% To 80%
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="cc" id="above_cc">
                                                                    <label class="form-check-label" for="above_cc">
                                                                        More than 80%
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </td>
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
                                                                cols="5" rows="1"></textarea>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>Not Submitted</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>

                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td> 80DDB</td>
                                                        <td>

                                                            <p> Medical Expenditure on Self or Dependant for Specified
                                                                Disease
                                                                Age
                                                            </p>
                                                            <div class="d-flex justify-content-center">
                                                                <div class="form-check me-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="cc" id="below_cc">
                                                                    <label class="form-check-label" for="below_cc">
                                                                        Age Below 60
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="cc" id="above_cc">
                                                                    <label class="form-check-label" for="above_cc">
                                                                        Age More than 60
                                                                    </label>
                                                                </div>

                                                            </div>

                                                        </td>

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
                                                                cols="5" rows="1"></textarea>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>Not Submitted</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>

                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td> 80E</td>
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
                                                                cols="5" rows="1"></textarea>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>Not Submitted</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td> 80EE</td>
                                                        <td>Additional Relief on home loan interest (First-home Buyers FY
                                                            2016-2017)
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
                                                            <button data-bs-target="#ee_modal" data-bs-toggle="modal"
                                                                class="text-white py-1.5 w-full rounded-md  bg-indigo-800">Add</button>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>Not Submitted</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>

                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td>80EEA</td>
                                                        <td>Additional Relief on home loan interest (First-home Buyers FY
                                                            2019-2020)
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
                                                            {{-- <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                cols="5" rows="1"></textarea> --}}
                                                            <button data-bs-target="#eea_modal" data-bs-toggle="modal"
                                                                class="text-white py-1.5 w-full rounded-md  bg-indigo-800">Add</button>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>Not Submitted</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>

                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td> 80EEB</td>
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
                                                            {{-- <textarea name="" id="" class="text-box form-control resize-none" placeholder="type here"
                                                                cols="5" rows="1"></textarea> --}}
                                                            <button data-bs-target="#eeb_modal" data-bs-toggle="modal"
                                                                class="text-white py-1.5 w-full rounded-md  bg-indigo-800">Add</button>
                                                        </td>

                                                        <td align="">

                                                            <div class="upload_file ">

                                                                <i class="fa fa-upload" aria-hidden="true"><input
                                                                        type="file" name="" id=""
                                                                        multiple></i>


                                                            </div>

                                                        </td>
                                                        <td>
                                                            <p>Not Submitted</p>
                                                        </td>
                                                        <td>


                                                            <div class="dropdown investment_dropDown">
                                                                <button
                                                                    class="btn  bg-transparent outline-none border-0 dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-pencil-square-o text-info me-2"
                                                                            aria-hidden="true"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fa fa-times-circle-o text-danger me-2"
                                                                            aria-hidden="true"></i> Clear</a>
                                                                    <a class="dropdown-item" href="#"></a>
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade  " id="form_12bb" role="tabpanel">
                        <div class="text-center">
                            <div class="d-flex justify-content-center">
                                <div style="height: 300px;max-width:500px;" class="">
                                    <img src="{{ URL::asset('assets/images/no_dataFile.svg') }}" class="h-100 w-100"
                                        alt="user-pic" </div>
                                </div>

                            </div>
                            <h4> <span class="text-orange">Sorry !</span> No data</h4>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="tax_filling" role="tabpanel">
                        {{-- <div class="text-center">
                            <div class="d-flex justify-content-center">
                                <div style="height: 300px;max-width:500px;" class="">
                                    <img src="{{ URL::asset('assets/images/no_dataFile.svg') }}" class="h-100 w-100"
                                        alt="user-pic" </div>
                                </div>

                            </div>
                            <h4> <span class="text-orange">Sorry !</span> No data</h4>
                        </div> --}}

                        <div class="row">
                            <div class=" col-sm-12 col-md-12 col-xl-6 col-xxl-6 col-lg-6 mb-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <h6 class="modal-title">E-filing </h6>
                                            </div>
                                            <div class="col-4">
                                                <img src="{{ URL::asset('assets/images/e-filing.svg') }}" height="60px"
                                                    width="200px" class="" alt="">
                                            </div>
                                            <div class="col-8 d-flex align-items-center justify-content-center">
                                                <a class="btn btn-border-orange" type="button"
                                                    href="https://eportal.incometax.gov.in/iec/foservices/#/login"
                                                    target="_blank"><i class="fa fa-hand-pointer-o me-1"
                                                        aria-hidden="true"></i> Click here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-sm-12 col-md-12 col-xl-6 col-xxl-6 col-lg-6">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <h6 class="modal-title">Clear Tax</h6>
                                            </div>
                                            <div class="col-4">
                                                <img src="{{ URL::asset('assets/images/ClearTax-Logo.svg') }}"
                                                    height="60px" width="200px" class="" alt="">
                                            </div>
                                            <div class="col-8 d-flex align-items-center justify-content-center">
                                                <a class="btn btn-border-orange" type="button"
                                                    href="https://cleartax.in/income-tax-efiling" target="_blank"> <i
                                                        class="fa fa-hand-pointer-o me-1" aria-hidden="true"></i>Click
                                                    here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <div id="AddRendted_modal" class="modal  fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg">
                <div class="modal-content ">
                    <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                        <span class="text-lg modal-title text-indigo-950 font-semibold">Add New Rental </span>
                        <button type="button" class="close outline-none bg-transparent border-0 h3"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <form>
                                <div
                                    class="grid gap-y-4 gap-x-6 mb-6 md:grid-cols-2 2xl:grid-cols-2 sm:grid-cols-1 xl:grid-cols-2 lg:grid-cols-2">

                                    <div class="">
                                        <label for="lender_type" class="block mb-2  font-medium text-gray-900 ">From
                                            Month</label>
                                        <input type="date" id="lender_type"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>
                                    <div class="">
                                        <label for="lender_type" class="block mb-2  font-medium text-gray-900 ">To
                                            Month</label>
                                        <input type="date" id="lender_type"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>
                                    <div class="">
                                        <label for="lender_type"
                                            class="block mb-2  font-medium text-gray-900 ">City</label>
                                        <input type="text" id="lender_type"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>
                                    <div class="">
                                        <label for="rendPaid_inp" class="block mb-2  font-medium text-gray-900 ">Total
                                            Rent Paid</label>
                                        <input type="text" id="rendPaid_inp"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>
                                    <div class="landlord-details" id="landlordDetails" style="display:none">
                                        <div class="">
                                            <label for="lender_name"
                                                class="block mb-2  font-medium text-gray-900 ">Landlord
                                                Name <span class="text-red-600">*</span> </label>
                                            <input type="text" id="lender_name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                required>
                                        </div>
                                        <div class="">
                                            <label for="lender_name"
                                                class="block mb-2  font-medium text-gray-900 ">Landlord
                                                PAN <span class="text-red-600">*</span> </label>
                                            <input type="text" id="lender_name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button
                                        class="bg-orange-700 text-white py-1.5 rounded-md px-5 text-center">Save</button>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div id="ee_modal" class="modal  fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg">
                <div class="modal-content ">
                    <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                        <h6 class="modal-title mb-1 text-primary">Add new rental details <span
                                class="ml-3 text-xs text-gray-400 font-semibold">(The maximum deduction of Rs 50,000 can
                                be claimed under this section)</span> </h6>
                        <button type="button" class="close outline-none bg-transparent border-0 h3"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div
                                class="grid gap-y-4 gap-x-6 mb-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3">
                                <div class="">
                                    <label for="lender_name"
                                        class="block mb-2  font-medium text-gray-900 ">Limit</label>
                                    <input type="text" id="lender_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                        required>
                                </div>



                                <div class="">

                                    <label for="lender_type" class="block mb-2  font-medium text-gray-900 ">Type</label>
                                    <select id="lender_type"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option selected>Choose Type</option>

                                    </select>
                                </div>
                                <div class="">
                                    <label for="sanction_date" class="block mb-2  font-medium text-gray-900 ">Loan
                                        Sanction Date</label>
                                    <input type="date" id="sanction_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                        required>
                                </div>
                                <div class="">
                                    <label for="property_value" class="block mb-2  font-medium text-gray-900 ">Property
                                        Value</label>
                                    <input type="text" id="property_value"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                        required>
                                </div>
                                <div class="">
                                    <label for="loan_amount" class="block mb-2  font-medium text-gray-900 ">Loan
                                        Amount</label>
                                    <input type="text" id="loan_amount"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1  block w-full p-2.5 "
                                        required>
                                </div>
                                <div class="">
                                    <label for="declaration_amount"
                                        class="block mb-2  font-medium text-gray-900 ">Declaration
                                        Amount</label>
                                    <input type="text" id="declaration_amount"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                        required>
                                </div>

                            </div>
                            <div class="text-end">
                                <button class="bg-orange-700 text-white py-1.5 rounded-md px-5 text-center">Save</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <div id="eea_modal" class="modal  fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg">
                <div class="modal-content ">
                    <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                        <h6 class="modal-title mb-1 text-primary">Add new rental details <span
                                class="ml-3 text-xs text-gray-400 font-semibold">(The maximum deduction available under
                                this section is Rs. 1.5 Lakhs)</span> </h6>
                        <button type="button" class="close outline-none bg-transparent border-0 h3"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <form>
                                <div
                                    class="grid gap-y-4 gap-x-6 mb-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3">
                                    <div class="">
                                        <label for="lender_name"
                                            class="block mb-2  font-medium text-gray-900 ">Limit</label>
                                        <input type="text" id="lender_name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>



                                    <div class="">

                                        <label for="lender_type"
                                            class="block mb-2  font-medium text-gray-900 ">Type</label>
                                        <select id="lender_type"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                            <option selected>Choose Type</option>

                                        </select>
                                    </div>
                                    <div class="">
                                        <label for="sanction_date" class="block mb-2  font-medium text-gray-900 ">Loan
                                            Sanction Date</label>
                                        <input type="date" id="sanction_date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>
                                    <div class="">
                                        <label for="property_value"
                                            class="block mb-2  font-medium text-gray-900 ">Property
                                            Value</label>
                                        <input type="text" id="property_value"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>
                                    <div class="">
                                        <label for="loan_amount" class="block mb-2  font-medium text-gray-900 ">Loan
                                            Amount</label>
                                        <input type="text" id="loan_amount"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1  block w-full p-2.5 "
                                            required>
                                    </div>
                                    <div class="">
                                        <label for="declaration_amount"
                                            class="block mb-2  font-medium text-gray-900 ">Declaration
                                            Amount</label>
                                        <input type="text" id="declaration_amount"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>

                                </div>
                                <div class="text-end">
                                    <button
                                        class="bg-orange-700 text-white py-1.5 rounded-md px-5 text-center">Save</button>
                                </div>
                            </form>


                    </div>
                </div>
            </div>
        </div>
        <div id="eeb_modal" class="modal  fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg">
                <div class="modal-content ">
                    <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                        <h6 class="modal-title mb-1 text-primary"> <span
                                class="ml-3 text-xs text-gray-400 font-semibold">(The maximum deduction available under
                                this section is Rs. 1.5 Lakhs for electric vehicle purchase)</span> </h6>
                        <button type="button" class="close outline-none bg-transparent border-0 h3"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <form>
                                <div
                                    class="grid gap-y-4 gap-x-6 mb-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3">
                                    <div class="">
                                        <label for="lender_name"
                                            class="block mb-2  font-medium text-gray-900 ">Limit</label>
                                        <input type="text" id="lender_name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>



                                    <div class="">

                                        <label for="lender_type"
                                            class="block mb-2  font-medium text-gray-900 ">Type</label>
                                        <select id="lender_type"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                            <option selected>Choose Type</option>

                                        </select>
                                    </div>
                                    <div class="">
                                        <label for="sanction_date" class="block mb-2  font-medium text-gray-900 ">Loan
                                            Sanction Date</label>
                                        <input type="date" id="sanction_date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>
                                    <div class="">
                                        <label for="property_value"
                                            class="block mb-2  font-medium text-gray-900 ">Property
                                            Value</label>
                                        <input type="text" id="property_value"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>
                                    <div class="">
                                        <label for="loan_amount" class="block mb-2  font-medium text-gray-900 ">Loan
                                            Amount</label>
                                        <input type="text" id="loan_amount"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1  block w-full p-2.5 "
                                            required>
                                    </div>
                                    <div class="">
                                        <label for="declaration_amount"
                                            class="block mb-2  font-medium text-gray-900 ">Declaration
                                            Amount</label>
                                        <input type="text" id="declaration_amount"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>

                                </div>
                                <div class="text-end">
                                    <button
                                        class="bg-orange-700 text-white py-1.5 rounded-md px-5 text-center">Save</button>
                                </div>
                            </form>


                    </div>
                </div>
            </div>
        </div>
        <div id="section24_modal" class="modal  fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg">
                <div class="modal-content ">
                    <div class="modal-header py-2 new-role-header border-0 d-flex align-items-center">
                        <h6 class="modal-title mb-1 text-primary">Section 24</h6>
                        <button type="button" class="close outline-none bg-transparent border-0 h3"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <form>
                                <div
                                    class="grid gap-y-4 gap-x-6 mb-6 md:grid-cols-2 2xl:grid-cols-3 sm:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3">
                                    <div class="">
                                        <label for="lender_name"
                                            class="block mb-2  font-medium text-gray-900 ">Particulars</label>
                                        <input type="text" id="lender_name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>
                                    <div class="">
                                        <label for="lender_name"
                                            class="block mb-2  font-medium text-gray-900 ">References</label>
                                        <input type="text" id="lender_name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>

                                    <div class="">
                                        <label for="sanction_date" class="block mb-2  font-medium text-gray-900 ">Loan
                                            Max Limit</label>
                                        <input type="text" id="sanction_date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>
                                    <div class="">
                                        <label for="property_value" class="block mb-2  font-medium text-gray-900 ">
                                            Declartoin Amount</label>
                                        <input type="text" id="property_value"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>
                                    <div class="">
                                        <label for="section_proofs" class="block mb-2  font-medium text-gray-900 ">Loan
                                            Proofs</label>
                                        <input type="text" id="section_proofs"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100 focus:outline-none focus:ring outline-1  block w-full p-2.5 "
                                            required>
                                    </div>

                                    <div class="">
                                        <label for="declaration_amount"
                                            class="block mb-2  font-medium text-gray-900 ">Status
                                        </label>
                                        <input type="text" id="declaration_amount"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            required>
                                    </div>

                                </div>
                                <div class="text-end">
                                    <button
                                        class="bg-orange-700 text-white py-1.5 rounded-md px-5 text-center">Save</button>
                                </div>
                            </form>


                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/gridjs/gridjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/dashboard-projects.init.js') }}"></script>

    <script>
        $(document).ready(function() {

            $("#rendPaid_inp").keypress(function() {
                if (this.value >= 100000) {
                    $('#landlordDetails').css('display', 'block');

                }
                else if(this.value < 100000 ){
                    $('#landlordDetails').css('display', 'none');
                }
                else{
                    $('#landlordDetails').css('display', 'none');
                }

            });

        })
    </script>
@endsection
