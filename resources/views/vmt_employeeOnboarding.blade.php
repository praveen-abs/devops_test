@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('/assets/premassets/css/onboarding.css') }}">
@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Employee Onboarding @endslot
@endcomponent


<div class="main">

    <div class="container-fluid">
        <div class="card mt-4 p-5">

            <div class="row ">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <div class="p-3">
                        <div id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong class="f-9 onboard-detail">Personal Details</strong></li>
                                <li id="personal"><strong class="f-9 onboard-detail">Location Details</strong></li>
                                <li id="payment"><strong class="f-9 onboard-detail">Official Details</strong></li>
                                <li id="confirm"><strong class="f-9 onboard-detail">Family Details</strong></li>
                                <li id="end"><strong class="f-9 onboard-detail">Personal Documents</strong></li>
                            </ul>
                            <fieldset id="row-1">
                                <form id="form-1" enctype="multipart/form-data">
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="employee_code" class="onboard-form" value="{{$empNo}}" required readonly/>
                                                <label class="fieldlabels" for="employee_code">Employee Code</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="employee_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="employee_name">Employee Name as per
                                                    Aadhar</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="dob" class="onboard-form" required />
                                                <label class="fieldlabels" for="dob">Date of Birth</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <select name="marital_status" class="onboard-form mt-2" required >
                                                    <option value="married">Married</option>
                                                    <option value="widowed">Widowed</option>
                                                    <option value="separated">Separated</option>
                                                    <option value="divorced">Divorced</option>
                                                    <option value="single">Single</option>
                                                </select>
                                                <label class="fieldlabels" for="marital_status">Marital Status</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="doj" class="onboard-form" required />
                                                <label class="fieldlabels" for="doj">Date of Joining</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <select name="gender" class="onboard-form mt-2" required >
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                                <label class="fieldlabels" for="gender">Gender</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="number" name="mobile_no" minlength="10" maxlength="10"
                                                    class="onboard-form" required />
                                                <label class="fieldlabels" for="mobile_no">Mobile Number</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="email" name="email" class="onboard-form" required />
                                                <label class="fieldlabels" for="email">Email ID</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="number" name="aadhar" pattern="aadhar"
                                                    class="onboard-form" required />
                                                <label class="error aadhar_label" for="aadhar"
                                                    style="display: none;"></label>
                                                <label class="fieldlabels" for="aadhar">Aadhaar Number</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="pan_no" class="onboard-form pan" pattern="pan"
                                                    required />
                                                <label class="error pan_no_label" for="pan_no"
                                                    style="display: none;"></label>
                                                <label class="fieldlabels" for="pan_no">Pan Card Number</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="dl_no" class="onboard-form" pattern="dl" required />
                                                <label class="error dl_no_label" for="dl_no"
                                                    style="display: none;"></label>
                                                <label class="fieldlabels" for="dl_no">DL Number</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="passport_no" pattern="passport" class="onboard-form not-required validate" />
                                                <label class="error passport_no_label" for="passport_no"
                                                    style="display: none;"></label>
                                                <label class="fieldlabels" for="passport_no">Passport Number</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="passport_exp" class="onboard-form not-required validate" />
                                                <label class="fieldlabels" for="passport_exp">Passport Exp Date</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <select name="nationality" class="onboard-form mt-2" required >
                                                    <option value="">-- select one --</option>
                                                    <option value="afghan">Afghan</option>
                                                    <option value="albanian">Albanian</option>
                                                    <option value="algerian">Algerian</option>
                                                    <option value="american">American</option>
                                                    <option value="andorran">Andorran</option>
                                                    <option value="angolan">Angolan</option>
                                                    <option value="antiguans">Antiguans</option>
                                                    <option value="argentinean">Argentinean</option>
                                                    <option value="armenian">Armenian</option>
                                                    <option value="australian">Australian</option>
                                                    <option value="austrian">Austrian</option>
                                                    <option value="azerbaijani">Azerbaijani</option>
                                                    <option value="bahamian">Bahamian</option>
                                                    <option value="bahraini">Bahraini</option>
                                                    <option value="bangladeshi">Bangladeshi</option>
                                                    <option value="barbadian">Barbadian</option>
                                                    <option value="barbudans">Barbudans</option>
                                                    <option value="batswana">Batswana</option>
                                                    <option value="belarusian">Belarusian</option>
                                                    <option value="belgian">Belgian</option>
                                                    <option value="belizean">Belizean</option>
                                                    <option value="beninese">Beninese</option>
                                                    <option value="bhutanese">Bhutanese</option>
                                                    <option value="bolivian">Bolivian</option>
                                                    <option value="bosnian">Bosnian</option>
                                                    <option value="brazilian">Brazilian</option>
                                                    <option value="british">British</option>
                                                    <option value="bruneian">Bruneian</option>
                                                    <option value="bulgarian">Bulgarian</option>
                                                    <option value="burkinabe">Burkinabe</option>
                                                    <option value="burmese">Burmese</option>
                                                    <option value="burundian">Burundian</option>
                                                    <option value="cambodian">Cambodian</option>
                                                    <option value="cameroonian">Cameroonian</option>
                                                    <option value="canadian">Canadian</option>
                                                    <option value="cape verdean">Cape Verdean</option>
                                                    <option value="central african">Central African</option>
                                                    <option value="chadian">Chadian</option>
                                                    <option value="chilean">Chilean</option>
                                                    <option value="chinese">Chinese</option>
                                                    <option value="colombian">Colombian</option>
                                                    <option value="comoran">Comoran</option>
                                                    <option value="congolese">Congolese</option>
                                                    <option value="costa rican">Costa Rican</option>
                                                    <option value="croatian">Croatian</option>
                                                    <option value="cuban">Cuban</option>
                                                    <option value="cypriot">Cypriot</option>
                                                    <option value="czech">Czech</option>
                                                    <option value="danish">Danish</option>
                                                    <option value="djibouti">Djibouti</option>
                                                    <option value="dominican">Dominican</option>
                                                    <option value="dutch">Dutch</option>
                                                    <option value="east timorese">East Timorese</option>
                                                    <option value="ecuadorean">Ecuadorean</option>
                                                    <option value="egyptian">Egyptian</option>
                                                    <option value="emirian">Emirian</option>
                                                    <option value="equatorial guinean">Equatorial Guinean</option>
                                                    <option value="eritrean">Eritrean</option>
                                                    <option value="estonian">Estonian</option>
                                                    <option value="ethiopian">Ethiopian</option>
                                                    <option value="fijian">Fijian</option>
                                                    <option value="filipino">Filipino</option>
                                                    <option value="finnish">Finnish</option>
                                                    <option value="french">French</option>
                                                    <option value="gabonese">Gabonese</option>
                                                    <option value="gambian">Gambian</option>
                                                    <option value="georgian">Georgian</option>
                                                    <option value="german">German</option>
                                                    <option value="ghanaian">Ghanaian</option>
                                                    <option value="greek">Greek</option>
                                                    <option value="grenadian">Grenadian</option>
                                                    <option value="guatemalan">Guatemalan</option>
                                                    <option value="guinea-bissauan">Guinea-Bissauan</option>
                                                    <option value="guinean">Guinean</option>
                                                    <option value="guyanese">Guyanese</option>
                                                    <option value="haitian">Haitian</option>
                                                    <option value="herzegovinian">Herzegovinian</option>
                                                    <option value="honduran">Honduran</option>
                                                    <option value="hungarian">Hungarian</option>
                                                    <option value="icelander">Icelander</option>
                                                    <option value="indian">Indian</option>
                                                    <option value="indonesian">Indonesian</option>
                                                    <option value="iranian">Iranian</option>
                                                    <option value="iraqi">Iraqi</option>
                                                    <option value="irish">Irish</option>
                                                    <option value="israeli">Israeli</option>
                                                    <option value="italian">Italian</option>
                                                    <option value="ivorian">Ivorian</option>
                                                    <option value="jamaican">Jamaican</option>
                                                    <option value="japanese">Japanese</option>
                                                    <option value="jordanian">Jordanian</option>
                                                    <option value="kazakhstani">Kazakhstani</option>
                                                    <option value="kenyan">Kenyan</option>
                                                    <option value="kittian and nevisian">Kittian and Nevisian</option>
                                                    <option value="kuwaiti">Kuwaiti</option>
                                                    <option value="kyrgyz">Kyrgyz</option>
                                                    <option value="laotian">Laotian</option>
                                                    <option value="latvian">Latvian</option>
                                                    <option value="lebanese">Lebanese</option>
                                                    <option value="liberian">Liberian</option>
                                                    <option value="libyan">Libyan</option>
                                                    <option value="liechtensteiner">Liechtensteiner</option>
                                                    <option value="lithuanian">Lithuanian</option>
                                                    <option value="luxembourger">Luxembourger</option>
                                                    <option value="macedonian">Macedonian</option>
                                                    <option value="malagasy">Malagasy</option>
                                                    <option value="malawian">Malawian</option>
                                                    <option value="malaysian">Malaysian</option>
                                                    <option value="maldivan">Maldivan</option>
                                                    <option value="malian">Malian</option>
                                                    <option value="maltese">Maltese</option>
                                                    <option value="marshallese">Marshallese</option>
                                                    <option value="mauritanian">Mauritanian</option>
                                                    <option value="mauritian">Mauritian</option>
                                                    <option value="mexican">Mexican</option>
                                                    <option value="micronesian">Micronesian</option>
                                                    <option value="moldovan">Moldovan</option>
                                                    <option value="monacan">Monacan</option>
                                                    <option value="mongolian">Mongolian</option>
                                                    <option value="moroccan">Moroccan</option>
                                                    <option value="mosotho">Mosotho</option>
                                                    <option value="motswana">Motswana</option>
                                                    <option value="mozambican">Mozambican</option>
                                                    <option value="namibian">Namibian</option>
                                                    <option value="nauruan">Nauruan</option>
                                                    <option value="nepalese">Nepalese</option>
                                                    <option value="new zealander">New Zealander</option>
                                                    <option value="ni-vanuatu">Ni-Vanuatu</option>
                                                    <option value="nicaraguan">Nicaraguan</option>
                                                    <option value="nigerien">Nigerien</option>
                                                    <option value="north korean">North Korean</option>
                                                    <option value="northern irish">Northern Irish</option>
                                                    <option value="norwegian">Norwegian</option>
                                                    <option value="omani">Omani</option>
                                                    <option value="pakistani">Pakistani</option>
                                                    <option value="palauan">Palauan</option>
                                                    <option value="panamanian">Panamanian</option>
                                                    <option value="papua new guinean">Papua New Guinean</option>
                                                    <option value="paraguayan">Paraguayan</option>
                                                    <option value="peruvian">Peruvian</option>
                                                    <option value="polish">Polish</option>
                                                    <option value="portuguese">Portuguese</option>
                                                    <option value="qatari">Qatari</option>
                                                    <option value="romanian">Romanian</option>
                                                    <option value="russian">Russian</option>
                                                    <option value="rwandan">Rwandan</option>
                                                    <option value="saint lucian">Saint Lucian</option>
                                                    <option value="salvadoran">Salvadoran</option>
                                                    <option value="samoan">Samoan</option>
                                                    <option value="san marinese">San Marinese</option>
                                                    <option value="sao tomean">Sao Tomean</option>
                                                    <option value="saudi">Saudi</option>
                                                    <option value="scottish">Scottish</option>
                                                    <option value="senegalese">Senegalese</option>
                                                    <option value="serbian">Serbian</option>
                                                    <option value="seychellois">Seychellois</option>
                                                    <option value="sierra leonean">Sierra Leonean</option>
                                                    <option value="singaporean">Singaporean</option>
                                                    <option value="slovakian">Slovakian</option>
                                                    <option value="slovenian">Slovenian</option>
                                                    <option value="solomon islander">Solomon Islander</option>
                                                    <option value="somali">Somali</option>
                                                    <option value="south african">South African</option>
                                                    <option value="south korean">South Korean</option>
                                                    <option value="spanish">Spanish</option>
                                                    <option value="sri lankan">Sri Lankan</option>
                                                    <option value="sudanese">Sudanese</option>
                                                    <option value="surinamer">Surinamer</option>
                                                    <option value="swazi">Swazi</option>
                                                    <option value="swedish">Swedish</option>
                                                    <option value="swiss">Swiss</option>
                                                    <option value="syrian">Syrian</option>
                                                    <option value="taiwanese">Taiwanese</option>
                                                    <option value="tajik">Tajik</option>
                                                    <option value="tanzanian">Tanzanian</option>
                                                    <option value="thai">Thai</option>
                                                    <option value="togolese">Togolese</option>
                                                    <option value="tongan">Tongan</option>
                                                    <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                                    <option value="tunisian">Tunisian</option>
                                                    <option value="turkish">Turkish</option>
                                                    <option value="tuvaluan">Tuvaluan</option>
                                                    <option value="ugandan">Ugandan</option>
                                                    <option value="ukrainian">Ukrainian</option>
                                                    <option value="uruguayan">Uruguayan</option>
                                                    <option value="uzbekistani">Uzbekistani</option>
                                                    <option value="venezuelan">Venezuelan</option>
                                                    <option value="vietnamese">Vietnamese</option>
                                                    <option value="welsh">Welsh</option>
                                                    <option value="yemenite">Yemenite</option>
                                                    <option value="zambian">Zambian</option>
                                                    <option value="zimbabwean">Zimbabwean</option>
                                                </select>
                                                <label class="fieldlabels" for="nationality">Nationality</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <select name="blood_group" class="onboard-form mt-2" required >
                                                    <option value="a-positive">A Positive</option>
                                                    <option value="a-negative">A Negative</option>
                                                    <option value="a-unknown">A Unknown</option>
                                                    <option value="b-positive">B Positive</option>
                                                    <option value="b-negative">B Negative</option>
                                                    <option value="b-unknown">B Unknown</option>
                                                    <option value="ab-positive">AB Positive</option>
                                                    <option value="ab-negative">AB Negative</option>
                                                    <option value="ab-unknown">AB Unknown</option>
                                                    <option value="o-positive">O Positive</option>
                                                    <option value="o-negative">O Negative</option>
                                                    <option value="o-unknown">O Unknown</option>
                                                    <option value="unknown">Unknown</option>
                                                </select>
                                                <label class="fieldlabels" for="blood_group">Blood Group</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-right p-0"><button type="button" data="row-1"
                                                next="row-2" name="next" class="next bg-pink action-button text-center"
                                                value="Next">Next<i
                                                    class="text-white fa fa-arrow-right ml-2"></i></button></div>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset id="row-2">
                                <form id="form-2" enctype="multipart/form-data">
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="current_address" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="current_address">Current Address</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="current_city" class="onboard-form" required />
                                                <label class="fieldlabels" for="current_city">Current City</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="curent_district" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="curent_district">Current
                                                    District</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="number" name="current_pincode" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="current_pincode">Current Pincode</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="current_state" class="onboard-form" required />
                                                <label class="fieldlabels" for="current_state">Current State</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="permanent_address" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="permanent_address">Permanent
                                                    Address</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="permanent_city" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="permanent_city">Permanent City</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="permanent_district" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="permanent_district">Permanent
                                                    District</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="number" name="permanent_pincode" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="permanent_pincode">Permanent
                                                    Pincode</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="permanent_state" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="permanent_state">Permanent State</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <select name="physically_challenged" class="onboard-form mt-2" required >
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                                <label class="fieldlabels" for="physically_challenged">Physically
                                                    Challenged</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="number" name="account_no" class="onboard-form" pattern="account" required />
                                                <label class="error account_no_label" for="account_no"
                                                    style="display: none;"></label>
                                                <label class="fieldlabels" for="account_no">Account Number</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="bank_ifsc" class="onboard-form" required />
                                                <label class="fieldlabels" for="bank_ifsc">Bank IFSC Code</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="bank_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="bank_name">Bank Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-left p-0">
                                            <a type="button" data="row-2" prev="row-1" name="previous" class="previous bg-pink  action-button text-center" value="Previous">
                                                <i class="text-white fa fa-arrow-left mr-2"></i>Previous
                                            </a>
                                        </div>
                                        <div class="col-6 text-right p-0">
                                            <button type="button" data="row-2" next="row-3" name="next" class="next bg-pink action-button text-center" value="Next">Next
                                                <i class="text-white fa fa-arrow-right ml-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset id="row-3">
                                <form id="form-3" enctype="multipart/form-data">
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="department" class="onboard-form" required />
                                                <label class="fieldlabels" for="department">Department</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="process" class="onboard-form" required />
                                                <label class="fieldlabels" for="process">Process</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="designation" class="onboard-form" required />
                                                <label class="fieldlabels" for="designation">Designation</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="cost_center" class="onboard-form" required />
                                                <label class="fieldlabels" for="cost_center">Cost Center</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="confirmation_period" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="confirmation_period">Confirmation
                                                    Period</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="holiday_location" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="holiday_location">Holiday
                                                    Location</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l1_manager_code" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l1_manager_code">L1 Manager Code</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l1_manager_designation" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l1_manager_designation">L1 Manager
                                                    Designation</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l1_manager_name" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l1_manager_name">L1 Manager Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l2_manager_code" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l2_manager_code">L2 Manager Code</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l2_manager_designation" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l2_manager_designation">L2 Manager
                                                    Designation</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l2_manager_name" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l2_manager_name">L2 Manager Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l3_manager_code" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l3_manager_code">L3 Manager Code</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l3_manager_designation" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l3_manager_designation">L3 Manager
                                                    Designation</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l3_manager_name" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l3_manager_name">L3 Manager Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l4_manager_code" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l4_manager_code">L4 Manager Code</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l4_manager_designation" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l4_manager_designation">L4 Manager
                                                    Designation</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="l4_manager_name" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="l4_manager_name">L4 Manager Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="work_location" class="onboard-form" required />
                                                <label class="fieldlabels" for="work_location">Work Location</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="email" name="officical_mail" class="onboard-form"
                                                    required />
                                                <label class="fieldlabels" for="officical_mail">Official E-Mail
                                                    Id</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="number" minlength="10" maxlength="10"
                                                    name="official_mobile" class="onboard-form" required />
                                                <label class="fieldlabels" for="official_mobile">Official Mobile</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="number" name="emp_notice" class="onboard-form" required />
                                                <label class="fieldlabels" for="emp_notice">Employee Notice Period
                                                    Days</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-left p-0"><a type="button" data="row-3" prev="row-2"
                                                name="previous" class="previous bg-pink action-button text-center"
                                                value="Previous"><i
                                                    class="text-white fa fa-arrow-left mr-2"></i>Previous</a></div>
                                        <div class="col-6 text-right p-0"><button type="button" data="row-3"
                                                next="row-4" name="next" class="next bg-pink action-button text-center"
                                                value="Next">Next<i
                                                    class="text-white fa fa-arrow-right ml-2"></i></button></div>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset id="row-4">
                                <form id="form-4" enctype="multipart/form-data">
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="father_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="father_name">Father Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="mother_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="mother_name">Mother Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="dow" class="onboard-form" required />
                                                <label class="fieldlabels" for="dow">Date of Wedding</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="spouse_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="spouse_name">Spouse Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <select name="spouse_gender" class="onboard-form mt-2" required >
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                                <label class="fieldlabels" for="spouse_gender">Spouse Gender</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="spouse_dob" class="onboard-form" required />
                                                <label class="fieldlabels" for="spouse_dob">Spouse DOB</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="number" name="no_child" class="onboard-form" required />
                                                <label class="fieldlabels" for="no_child">Number of Children</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="text" name="child_name" class="onboard-form" required />
                                                <label class="fieldlabels" for="child_name">Children Name</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <input type="date" name="child_dob" class="onboard-form" required />
                                                <label class="fieldlabels" for="child_dob">Children DOB</label>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 col-lg-3 mt-3 mb-3">
                                                <select name="child_gender" class="onboard-form mt-2" required >
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                                <label class="fieldlabels" for="child_gender">Children Gender</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-left p-0"><a type="button" data="row-4" prev="row-3"
                                                name="previous" class="previous bg-pink action-button text-center"
                                                value="Previous"><i
                                                    class="text-white fa fa-arrow-left mr-2"></i>Previous</a></div>
                                        <div class="col-6 text-right p-0"><button type="button" data="row-4"
                                                next="row-5" name="next" class="next bg-pink action-button text-center"
                                                value="Next">Next<i
                                                    class="text-white fa fa-arrow-right ml-2"></i></button></div>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset id="row-5">
                                <form id="form-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-card">
                                        <div class="row mt-5">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-3 mb-3">
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" name="aadhar_card" class="onboard-form files" required />
                                                <label class="fieldlabels" for="aadhar_card">Aadhar Card</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-3 mb-3">
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" name="pan_card" class="onboard-form files" required />
                                                <label class="fieldlabels" for="pan_card">Pan Card</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-3 mb-3">
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" name="passport" class="onboard-form files" required />
                                                <label class="fieldlabels" for="passport">Passport</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-3 mb-3">
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" name="voters_id" class="onboard-form files" required />
                                                <label class="fieldlabels" for="voters_id">Voters ID</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-3 mb-3">
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" name="dl_file" class="onboard-form files" required />
                                                <label class="fieldlabels" for="dl_file">Driving License</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-3 mb-3">
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" name="education_certificate" class="onboard-form files" required />
                                                <label class="fieldlabels" for="education_certificate">Educations Certificate</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 mt-3 mb-3">
                                                <input type="file" accept=".doc,.docx,.pdf,image/*" name="reliving_letter" class="onboard-form files" required />
                                                <label class="fieldlabels" for="reliving_letter">Reliving Letter</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-left p-0"><a type="button" data="row-5" prev="row-4"
                                                name="previous" class="previous bg-pink action-button text-center"
                                                value="Previous"><i
                                                    class="text-white fa fa-arrow-left mr-2"></i>Previous</a></div>
                                        <div class="col-6 text-right p-0"><button type="submit"
                                                data="row-5" next="row-3" name="next"
                                                class="bg-pink action-button  text-center" value="Submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>

    <!--Main Content-->

</div>





@endsection
@section('script')

<!-- ui notifications -->

<script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/notifications.init.js') }}"></script>
<!-- apexcharts -->

<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<!--Page Wrapper-->

<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script><!-- -->
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>


<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script><!-- -->
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

<!-- Page JavaScript Files-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery-1.12.4.min.js"></script>
<!--Popper JS-->
<script src="assets/js/popper.min.js"></script>
<!--Bootstrap-->
<script src="assets/js/bootstrap.min.js"></script>
<!--Sweet alert JS-->
<script src="assets/js/sweetalert.js"></script>
<!--Progressbar JS-->
<script src="assets/js/progressbar.min.js"></script>
<!--Charts-->
<!--Canvas JS-->
<!--Custom Js Script-->
<!--Custom Js Script-->
<script src="{{ URL::asset('/assets/premassets/js/custom.js') }}"></script>
<script src="{{ URL::asset('/assets/premassets/js/onboarding.js') }}"></script>
<!-- <script src="{{ URL::asset('/assets/premassets/js/onboarding.js') }}"></script> -->

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>






<script>

$('#form-5').on('submit', function(e){
        e.preventDefault();
        
        var form_data1 = new FormData(document.getElementById("form-1"));
        var form_data2 = new FormData(document.getElementById("form-2"));
        var form_data3 = new FormData(document.getElementById("form-3"));
        var form_data4 = new FormData(document.getElementById("form-4"));
        var form_data5 = new FormData(document.getElementById("form-5"));
        for (var pair of form_data2.entries()) {    
            form_data1.append(pair[0], pair[1]);
        }
        for (var pair of form_data3.entries()) {    
            form_data1.append(pair[0], pair[1]);
        }
        for (var pair of form_data4.entries()) {    
            form_data1.append(pair[0], pair[1]);
        }
        for (var pair of form_data5.entries()) {    
            form_data1.append(pair[0], pair[1]);
        }
        $.ajax({
            url: "{{url('vmt-employee-onboard')}}", 
            type: "POST", 
            dataType : "json",
            data: form_data1,
            contentType: false,
            processData: false,
            success: function(data)
            {
                alert(data);
            }
        });
    });

</script>


@endsection