@extends('layouts.master')
@section('css')

<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet">
<style type="text/css">
.e-table>:not(caption)>*>* {
    border-bottom-width: 0px !important;
    padding: .45rem .6rem !important;
}

.e-table .e-table,
.e-table>thead {
    border: 0px !important;
}

.table-bordered .table-bordered>:not(caption)>*>* {
    border-top-width: 0px !important;
    border-bottom-width: 0px !important;
}
</style>
@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Self Appraisal Review @endslot
@endcomponent






<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0 align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">PERFORMANCE MANAGEMENT SYSTEMS (PMS) </h4>

            </div><!-- end card header -->

            <div class="card-body  pb-2">

                <table class="table e-table align-middle table-nowrap mb-0 " style="border: none;">

                    <tbody>
                        <tr style="border: none;">
                            <td class=" text-left">
                                <b>Employee Name: </b>
                            </td>
                            <td class="text-left">
                                {{Auth::user()->name}}
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="text-left">
                                <b>Employee ID:
                            </td>
                            <td class="text-left">
                                AST0072
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="col-xl-6 text-left">
                                <b>Job Title / Designation:</b>
                            </td>
                            <td class="col-xl-6 text-left">
                                AGM – Operations
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="col-xl-6 text-left">
                                <b>Business Unit/Process/Function:</b>
                            </td>
                            <td class="col-xl-6 text-left">
                                Call Centre
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="col-xl-6 text-left">
                                <b>Reporting Manager :</b>
                            </td>
                            <td class="col-xl-6 text-left">
                                Ajeesh Kumar R -Head Service Delivery
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="col-xl-6 text-left">
                                <b>Managers Manager :</b>
                            </td>
                            <td class="col-xl-6 text-left">
                                Kumar
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="col-xl-6 text-left">
                                <b>Review Period: </b>
                            </td>
                            <td class="col-xl-6 text-left">
                                Jul’21 To Mar’22
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div><!-- end card body -->
        </div><!-- end card -->

        <div class="card">

            <div class="card-body  pb-2">

                <table class="table e-table align-middle table-nowrap mb-0 " style="border: none;">

                    <tbody>
                        <tr style="border: none;">
                            <td class=" text-left">
                                <b>Overall Annual Score: </b>
                            </td>
                            <td class="text-left">
                                80
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="text-left">
                                <b>Corresponding ANNUAL PERFORMANCE Rating:</b>
                            </td>
                            <td class="text-left">
                                Exceeds Expectations
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="col-xl-6 text-left">
                                <b>Ranking:</b>
                            </td>
                            <td class="col-xl-6 text-left">
                                4
                            </td>
                        </tr>
                        <tr style="border: none;">
                            <td class="col-xl-6 text-left">
                                <b> Action:</b>
                            </td>
                            <td class="col-xl-6 text-left">
                                15%
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div><!-- end card body -->
        </div><!-- end card -->

        <!-- @can('L1_Review')
                            <th style=" background-color: #405189;">
                                <h6 style="color:white;">Reporting Manger Review's (L1)<br /><br /> Comments
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Score
                                </h6>
                            </th>
                            @endcan

                            @can('L2_Review')
                            <th class="r" style=" background-color: #405189;">
                                <h6 style="color:white;"> Managers Manager (L2)<br /><br /> Comments
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Score</h6>
                            </th>
                            @endcan

                            @can('Final_Review')
                            <th class="r" style=" background-color: #405189;">
                                <h6 style="color:white;"> Final Review <br />( HR or Head Of the Department)</h6>
                            </th>
                            @endcan -->


        <!-- appraisal table -->
        <div class="card">
            <div class="card-body pb-2">
                <div class="table-content mb-4">
                    <table class="table align-middle mb-0  responsive" id="table">

                        <thead class="thead" id="tHead">
                            <tr>
                                <th scope="col">Dimension</th>
                                <th scope="col">KPI</th>
                                <th scope="col">Operational Definition</th>
                                <th scope="col">Measure</th>
                                <th scope="col">Frequency</th>
                                <th scope="col">Target</th>
                                <th scope="col">Stretch Target</th>
                                <th scope="col">Source</th>
                                <th scope="col">KPI Weightage</th>
                                <th scope="col">KPI - Achievement (Self Review)</th>
                                <th scope="col">Self KPI Achievement %</th>
                                <th scope="col">Comments</th>
                                <th scope="col">KPI - Achievement (Manager Review)</th>
                                <th scope="col">Manager KPI Achievement %

                                </th>



                            </tr>
                        </thead>
                        <tbody class="tbody" id="tbody">
                            <tr>
                                <th scope="row">Finance</th>
                                <td>
                                    <div> "&quot;Ensuring Timely payout to employees on the Salary &amp; reimbursement
                                        claimed
                                        (Target &gt; 95%)
                                        Adherence to Statutory &amp; Compliance regulations
                                        KCF/RR: reduce 0-1-2 ratings in KCF by Q4 assessment"</div>
                                </td>
                                <td>
                                    <div> "Adherence to Statutory &amp; Compliance regulations
                                        KCF/RR: reduce 0-1-2 ratings in KCF by Q4 assessment
                                        Bottom line impact" </div>
                                </td>
                                <td>
                                    <div>"Tracking of reimbursement should be done till Payout.
                                        Follow a comprehensive checklist &amp; ensure NIL deviations to Statutory &amp;
                                        compliance norms.
                                        Timely reports to Finance Team as per the requirement.
                                        Concerns raised on KCF to be ascertained &amp; gaps in the process to be
                                        arrested.
                                        Aim to have all KCF points under 4 or 5 category by Q4"</div>
                                </td>
                                <td>
                                    <div> Monthly</div>
                                </td>
                                <td>
                                    <div>100% Compliance</div>
                                </td>
                                <td>
                                    <div>100% Compliance</div>
                                </td>
                                <td>
                                    <div>System / Manual</div>
                                </td>
                                <td>
                                    <div>15%</div>
                                </td>
                                <td>
                                    <div> Regular followup done with the CST Team and Brain stroming with the team
                                        members to
                                        deliver the on time payout, Starts working with the team, to get full support
                                        from
                                        team to Achieve the 100% timely payout and understanding where the support
                                        required
                                        to my teamr̥</div>
                                </td>
                                <td>
                                    <div>100%</div>
                                </td>
                                <td>
                                    <div>Starts working with the team, to get full support from team to Achieve the 100%
                                        timely payout and understanding where the support required to my team</div>
                                </td>


                                <td>
                                    "Great outcome of Reimbursement delivery for GS and SS also maintain the consitency
                                    delivery deviation sheet ontime and everytime
                                    Most importantly need to focus on STM centralisation in 2019 Q2"
                                </td>
                                <td>
                                    104%
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">Customer</th>
                                <td>
                                    <div>"Drive Improvement on Payroll &amp; Reimbursement process
                                        Improve Reimbursement TAT (Target 100%)
                                        Quality of deliverables (Target 100%)
                                        Timely Query handling (Target 100%)"</div>
                                </td>
                                <td>
                                    <div>"Drive Improvement on Input Adherance (Target &gt; 85%)
                                        Improve Payroll TAT (Target 100%)
                                        Quality of deliverables (Target 100%)
                                        Timely Query handling (Target 100%)
                                        Tax Related (Insource Proof Verification &amp; Form 16) Target 100%"</div>
                                </td>
                                <td>
                                    <div>"Monitor the entire process &amp; ascertain the NVA's. Removing the NVA's will
                                        help
                                        us to strengthen the process with an improved TAT.
                                        Improve the hygiene of the process through proactive mails, regular concalls,
                                        etc.
                                        Jump to action when Client is not adhereing to timelines / proper info provided.
                                        Conduct regular calls with Clients &amp; understand their pain areas. Take
                                        remedial
                                        action &amp; improve upon. Records the minutes &amp; circulate with action plan.
                                        Ensure friction free delivery by completing the task within TAT agreed with the
                                        Clients.
                                        Cultivate &quot;First time Right&quot; culture amongst Team members
                                        Monitor &amp; ensure Queries of consultants / clients / employees are handled
                                        within
                                        TAT with appropriate &amp; relevant response.
                                        Automate the entire reimbursement process which will inturn improve the
                                        Productivity, Quality TAT"</div>
                                </td>
                                <td>
                                    <div>Monthly</div>
                                </td>
                                <td>
                                    <div>"TAT : 100%
                                        Quality : 100%
                                        Query Handling TAT - 100%"</div>
                                </td>
                                <td>
                                    <div>"Input Adherence : 95%
                                        TAT : 100%
                                        Quality : 100%"</div>
                                </td>
                                <td>
                                    <div>FO /BO</div>
                                </td>
                                <td>
                                    <div>25%</div>
                                </td>
                                <td>
                                    <div>Regular follow-up is been done with HRD to complete the process as per TAT, we
                                        are
                                        explaining them to understand the statutory issues which we are facing and
                                        educating
                                        them to close the delivery ontime. In case Errors occurred analyzing the Problem
                                        while checking the QC and the non-repetition of the same issue.
                                    </div>
                                </td>

                                <td>
                                    <div>100%</div>
                                </td>
                                <td>
                                    <div>Start working to understand the customer needs to make the quality deliverable
                                        and
                                        payout on time </div>
                                </td>
                                <td>Yes, agreed with you most of the time your delivery has been exceeded the
                                    expectation leavel and keep focus on quality delivery and TAT reduction in 2019 - Q3
                                </td>
                                <td>105%</td>

                            </tr>


                            <tr>
                                <th scope="row">Process</th>
                                <td>
                                    <div>"Awareness and Adherence to Quality Processes without compromising on
                                        Compliance
                                        (Target 100%)
                                        Performance &amp; Cross Functional activities
                                        No Rework in processing (Target &lt;1%)
                                        Process Improvement ( Implemented Ideas)
                                        Automation of Reimbursement Process, Payroll and Quality Check CI - Minimum 1
                                        improvement project per TL"</div>
                                </td>
                                <td>
                                    <div>"Awareness and Adherence to Quality Processes without compromising on
                                        Compliance
                                        (Target 100%)
                                        Performance &amp; Cross Functional activities
                                        No Rework in processing (Target &lt;1%)
                                        Process Improvement ( Implemented Ideas)
                                        Automation of Reimbursement Process"</div>
                                </td>
                                <td>
                                    <div>"Acheive &amp; sustain 100% in Quality of deliverables (Measured through
                                        Internal
                                        &amp; external trackers)
                                        Support within process (not individuals) at the time of crisis.
                                        Arrest the gap which results in re-work &amp; discuss with Team members /
                                        Consultants for further action.
                                        Improvement in the existing process is very vital. Ensure Team members
                                        contribute
                                        more ideas which ideally converts into reduction of FTE's / improve the Quality
                                        of
                                        deliverable."</div>
                                </td>
                                <td>
                                    <div>Daily</div>
                                </td>
                                <td>
                                    <div>"Quality : 100%
                                        Re-work : 1%
                                        TAT (Reim) - 1 day Payroll - 4 Hrs"</div>
                                </td>
                                <td>
                                    <div>"Quality : 100%
                                        Re-work : 1%"</div>
                                </td>
                                <td>
                                    <div>Measured through Internal ; external trackers</div>
                                </td>
                                <td>
                                    <div>20%</div>
                                </td>
                                <td>
                                    <div>Ensure to follow the standardize SOP , process improvement and quality delivery
                                        of
                                        output without compromising on statutory compliance</div>
                                </td>
                                <td>
                                    <div>100%</div>
                                </td>
                                <td>
                                    <div>"Encouriging the People to get the Ideas in the Process development with the
                                        help of
                                        CI Projects to make the process efficiency
                                        Trying to Avoid the Rework and trying to collect the First time right Inputs
                                        from
                                        the Customer, Brain stroming with the Members and make the solution within the
                                        team
                                        to deliver the Paysheets on time"</div>
                                </td>
                                <td>"I have seen lot more cross functional from your side like form 16 issuance and F n
                                    F UAT
                                    FTR has been increased based on the QC and more focus on the error free
                                    Reimbursement
                                    Very good movement on the CI where most of the member certified the CI and including
                                    yourselvs
                                    Reimbursement automation in process and phase I has been released and more focus on
                                    the WEB development -2019 Q2"</td>
                                <td>100%</td>

                            </tr>
                            <tr>
                                <th scope="row" rowspan="2">Best People
                                </th>
                                <td>
                                    <div> "(Shared Goal) Lead system enhancement in Paybill ensuring 100% compliance
                                        Monitor &amp; adhere to 100% Accurate, On time statutory remittance and issual
                                        of
                                        Form 16"</div>
                                </td>
                                <td>
                                    <div>"Ensure to dig deep &amp; arrest the deviations.Remove unwanted reports from
                                        Paybill
                                        which will help in friction free process.
                                        Form 16 &amp; 24Q from Paybill, Investment portal enhancement should be carried
                                        out.On time generation, validation &amp; reconcilation of Statutory reports to
                                        ensure NIL deviation from Statutory guidelines
                                        Ensuring the KCF guidelines are adhered on day to day basis with a strignent
                                        control.
                                        "</div>
                                </td>
                                <td>
                                    <div>"(Shared Goal) Ensure to dig deep &amp; arrest the deviations.Remove unwanted
                                        reports from Paybill which will help in friction free process.
                                        Form 16 &amp; 24Q from Paybill, Investment portal enhancement should be carried
                                        out.On time generation, validation &amp; reconcilation of Statutory reports to
                                        ensure NIL deviation from Statutory guidelines
                                        Ensuring the KCF guidelines are adhered on day to day basis with a strignent
                                        control.
                                        Better Team Control which will in turn help in overall development
                                        Encourging the Team members for all Cross functional activites &amp; drive it
                                        for
                                        their improvement
                                        Ascertain the Time study of the process &amp; have optimal resources required. "
                                    </div>
                                </td>
                                <td>
                                    <div>Monthly</div>
                                </td>
                                <td>
                                    <div>"Reduction in &gt; 45 days onboarding - by 25% by Q2 , progressively to reach
                                        90% by
                                        Q4
                                        Reduction in rework
                                        F&amp;F end to end completion and payout within 30 days from LWD / Date of
                                        intimation"</div>
                                </td>
                                <td>
                                    <div>90% </div>
                                </td>
                                <td>
                                    <div>System / Manual</div>
                                </td>
                                <td>
                                    <div>20%</div>
                                </td>
                                <td>
                                    <div>Need to ensure the system our Paybill and RD to support our process to complete
                                        our
                                        shared goals</div>
                                </td>

                                <td>
                                    <div>100%</div>
                                </td>
                                <td>
                                    <div>trying to give the ideas and requirements to make our system to helpful, we are
                                        planning to develop the knowledge th beyond the process with cross functional
                                        activities</div>
                                </td>
                                <td>
                                    <div> Agreed and you have shown your fullest support towards develop the system and
                                        UAT
                                        process and keep doing the same</div>
                                </td>
                                <td>
                                    <div>100%</div>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <div>Retention, Succession Plan for the Leader and his directs, and Improvement in
                                        GPS
                                        score</div>
                                </td>
                                <td>
                                    <div>"Appropriate back up plan should be documented / training provided.
                                        Regularly conduct team meetings understand their grievances &amp; take
                                        corrective
                                        action.
                                        Be a Mentor. Encourage Buddy Processing &amp; train the New / Low perfomers to
                                        acheive higher standards.
                                        Train the Leaders to become better Leaders &amp; ensure Team members are
                                        growing.
                                        Encourging the Team members for all Cross functional activites &amp; drive it
                                        for
                                        their improvement"</div>
                                </td>
                                <td>
                                    <div>"Applicable for all:
                                        Improved knowledge on processes, to back-up in case of absence of POC.
                                        Improves motivation and encourages a spirit of healthy competition in the group
                                        Helps is Business Continuity. Reduced impact on service deliverable and
                                        escalations
                                        Improves Work-Life Balance and engagement levels within the Organization
                                        Better Team &amp; Self Control which will in turn help in overall development
                                        L4-G4 &amp; above
                                        Appropriate back up plan should be documented / training provided.
                                        Regularly conduct team meetings understand their grievances &amp; take
                                        corrective
                                        action.
                                        Be a Mentor. Encourage Buddy Processing &amp; train the New / Low perfomers to
                                        acheive higher standards.
                                        Train the Leaders to become better Leaders &amp; ensure Team members are
                                        growing.
                                        Encourging the Team members for all Cross functional activites &amp; drive it
                                        for
                                        their improvement"</div>
                                </td>
                                <td>
                                    <div>Weekly</div>
                                </td>
                                <td>
                                    <div>Adhere to Company Policies ; regulations</div>
                                </td>
                                <td>
                                    <div>Adhere to Company Policies ; regulations</div>
                                </td>
                                <td>
                                    <div>"Manual
                                        "<div>
                                </td>
                                <td>
                                    <div>20%</div>
                                </td>
                                <td>
                                    <div>Retention of the people is the most important , we will try to do the best for
                                        our
                                        people getting the valuable feedback from the people and place the right things
                                        in
                                        place</div>
                                </td>

                                <td>
                                    <div>100%</div>
                                </td>
                                <td>
                                    <div>Understanding the grievances to take the correct action and encouraging the
                                        team
                                        members to develop, we are trying to make a appropriate backup plan to make the
                                        process more efficiency without creating the dependency</div>
                                </td>
                                <td>
                                    <div> "Positive feedback allover the team and need to develop Arokya on your
                                        successor
                                        plan and he should be able to take over your postion in end of 2019
                                        I have seen more task assigned to your team member which is makes more retention
                                        and
                                        this should be continue and keep encourage the team members on the cross
                                        functional
                                        activity"</div>
                                </td>
                                <td>
                                    <div> 100%</div>
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>
                <div class="buttons d-flex align-items-center justify-content-end">
                    <button class="btn btn-primary" id="add">Add<i class="fa fa-plus"></i></button>

                    <button class="btn btn-primary mx-3">Remove<i class="fa fa-remove"></i></button>
                </div>

            </div>
        </div>
    </div><!-- end col -->
    <div class="row mt-3">
        <div class="col-lg-12">
            <label class="form-label">
                Appraiser Feedback:
            </label>
            <div class="my-2">
                <textarea class="form-control" placeholder="" id="gen-info-description-input" name="performance"
                    rows="4"></textarea>
            </div>
        </div>
    </div>



    <div class="card">
        <div class="card-header">
            <p>Appraisee's Annual Score & Rating</p>
        </div>
        <div class="card-body pb-2">
            <h5>Best People Rating Grid</h5>
            <div class="table-content mb-4">
                <table class="table align-middle mb-0  responsive" id="table">

                    <thead class="thead" id="tHead">
                        <tr>
                            <th scope="col" colspan="6">Best People
                                Rating Grid</th>
                            <th scope="col"> Appraisee's Annual Score & Rating</th>

                        </tr>
                    </thead>
                    <tbody class="tbody" id="tbody">


                        <tr>
                            <td class="">
                                Overall Annual Score
                            </td>
                            <td class="">Less than 60 </td>
                            <td class="">60-70</td>
                            <td class="">70-80</td>
                            <td class="">80-90</td>
                            <td class="">90-100</td>
                            <td class="">100</td>
                        </tr>

                        <tr>

                            <td class="">
                                Corresponding ANNUAL PERFORMANCE Rating

                            </td>
                            <td class="">Needs Action</td>
                            <td class="">Below Expectations</td>
                            <td class="">Meet Expectations</td>
                            <td class="">Exceeds Expectations </td>
                            <td class="">Exceptionally Exceeds Expectations</td>
                            <td class="">Exceptional </td>
                        </tr>

                        <tr>
                            <td class="">
                                Ranking
                            </td>
                            <td class="">1</td>
                            <td class="">2</td>
                            <td class="">3</td>
                            <td class="">4</td>
                            <td class="">5</td>
                            <td class="">5</td>
                        </tr>
                        <tr>

                            <td class="">
                                Action
                            </td>
                            <td class="">Exit</td>
                            <td class="">PIP</td>
                            <td class="">10% </td>
                            <td class=""> 15% </td>
                            <td class="">20%</td>
                            <td class="">5%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    
</div><!-- end row -->

@endsection
@section('script')
<!-- apexcharts -->

<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection