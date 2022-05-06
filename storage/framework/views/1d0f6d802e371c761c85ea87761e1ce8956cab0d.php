
<?php $__env->startSection('css'); ?>

    <link href="<?php echo e(URL::asset('assets/libs/jsvectormap/jsvectormap.min.css')); ?>" rel="stylesheet">
    <style type="text/css">
        .e-table>:not(caption)>*>*{
            border-bottom-width: 0px !important;
            padding: .45rem .6rem !important;
        }
        .e-table .e-table, .e-table>thead{
            border: 0px !important ;
        }

        .table-bordered .table-bordered>:not(caption)>*>* {
            border-top-width: 0px !important;
            border-bottom-width: 0px !important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Dashboards <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Appraisal Review <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0 align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">PERFORMANCE & DEVELOPMENT REVIEW (PDR)</h4>
                    
                </div><!-- end card header -->

                <div class="card-body  pb-2">

                    <table class="table e-table align-middle table-nowrap mb-0 " style="border: none;">
                        
                        <tbody>
                            <tr style="border: none;">
                                <th colspan="12"><b>Designation</b></th>
                            </tr>
                            <tr style="border: none;">
                                <td class=" text-left">
                                    Employee Name: 
                                </td>
                                <td class="text-left">
                                    <?php echo e(Auth::user()->name); ?>

                                </td>
                            </tr>
                            <tr  style="border: none;">
                                <td class="text-left">
                                   Employee ID:
                                </td>
                                <td class="text-left">
                                    AST0072
                                </td>
                            </tr>
                            <tr style="border: none;">
                                <td class="col-xl-6 text-left">
                                   Job Title / Designation:
                                </td>
                                <td class="col-xl-6 text-left">
                                    AGM – Operations 
                                </td>
                            </tr>
                            <tr style="border: none;">
                                <td class="col-xl-6 text-left">
                                   Business Unit/Process/Function:
                                </td>
                                <td class="col-xl-6 text-left">
                                   Call Centre
                                </td>
                            </tr>
                            <tr style="border: none;">
                                <td class="col-xl-6 text-left">
                                   L1 Name
                                </td>
                                <td class="col-xl-6 text-left">
                                   Ajeesh Kumar R -Head Service Delivery  
                                </td>
                            </tr>
                            <tr style="border: none;">
                                <td class="col-xl-6 text-left">
                                  L2 Name
                                </td>
                                <td class="col-xl-6 text-left">
                                   Kumar
                                </td>
                            </tr>
                            <tr style="border: none;">
                                <td class="col-xl-6 text-left">
                                 Review Period:  
                                </td>
                                <td class="col-xl-6 text-left">
                                   Jul’20 To Mar’21
                                </td>
                            </tr>
                        </tbody>
                    </table>
                         
                </div><!-- end card body -->
            </div><!-- end card -->

            <div class="card">
                <h4 class="card-title mb-0 flex-grow-1"> ANNUAL GOAL SETTING & REVIEW</h4>    
            </div>

            <div class="card">
                <h4 class="card-title mb-0 flex-grow-1"> Objectives and Activities (What)</h4>    
            </div>

            <div class="card">
                <div class="card-body pb-2">
                    <table class="table table-bordered align-middle mb-0">
                        <thead>
                            <tr>
                                <th width="60%" class="">To be filled at the beginning of the review year
                                    <br/>(Appraiser to prepare and obtain agreement of employee)
                                </th>
                                <th width="20%" class="">To be filled during annual appraisal
                                    <br/>(Appraiser to prepare and discuss with Reviewer)
                                </th>
                                <th width="20%" class="">To be filled during annual appraisal<br/>
                                    (Appraiser to prepare and discuss with Reviewer)
                                </th>
                            </tr>
                            <tr>
                                <th class="" width="60%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class="">
                                                    START OF THE YEAR   
                                                </td>
                                                <td width="30%" class="r">
                                                    WEIGHTAGE
                                                </td>
                                                <td width="30%" class="">
                                                    Self Appraisal
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </th>
                                <th class=""  width="20%">L1 Review</th>
                                <th class=""  width="20%">L2 Review</th>
                            </tr>
                            <tr>
                                <td class="" width="60%">
                                    <table class="p-0 table-bordered" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class="">
                                                    What have you agreed to do this year?
                                                    <br/>
                                                    (Employee & Appraiser to agree) 
                                                </td>
                                                <td width="30%" class="">
                                                    Total must add to 100%   
                                                </td>
                                                <td width="15%" class="">
                                                    Self Appraised Remarks
                                                </td>
                                                <td width="15%" class="">
                                                    Achieved %
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                   L1 Manager - Comments
                                                </td>
                                                <td width="50%" class="">
                                                    Score as per the  L1 Weightage   
                                                </td>
                                               
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                    L1 Manager - Comments
                                                </td>
                                                <td width="50%" class="">
                                                    Score as per the  L1 Weightage   
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            

                            <tr>
                                <td class="" width="60%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class=" p-0">
                                                    <table class="table-bordered p-0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td width="50%" class="">
                                                                   Revenue as per AOP for the FY 2022-23
                                                                </td>
                                                                <td width="50%" class="">
                                                                    Total Revenue to be decided by Manager and HOD   
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="30%" class="">
                                                    25%  
                                                </td>
                                                <td width="15%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="number" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="%" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="50%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />  
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="50%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td class="" width="60%">
                                    <table class="table-bordered  p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class="">
                                                    <table class="table-bordered  p-0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td width="50%" class="">
                                                                   Billing Closure
                                                                </td>
                                                                <td width="50%" class="">
                                                                    > 15 Days Of Service Month closure   
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="30%" class="">
                                                    20%  
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="number" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="%" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered  p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="50%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="50%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
    
                            <tr>
                                <td class="" width="60%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class="">
                                                    <table class="table-bordered p-0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td width="50%" class="">
                                                                    New Products/Services UAT & GO Live
                                                                </td>
                                                                <td width="50%" class="">
                                                                    One Product Go Live / Quarter for each client  
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="30%" class="">
                                                    20% 
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                   <input type="text" class="form-control"  id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="50%" class="">
                                                    <input type="text" class="form-control"  id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="50%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="" width="60%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class="">
                                                    <table class="table-bordered p-0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td width="50%" class="">
                                                                   Voice Boat Core Operations & Delivery
                                                                </td>
                                                                <td width="50%" class="">
                                                                    Timely campaign Uploads, Reporting, Minimal Client Escalations    
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="30%" class="">
                                                    15%  
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="50%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="50%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

    
                            <tr>
                                <td class="" width="60%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class="">
                                                    <table class="table-bordered p-0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td width="50%" class="">
                                                                   Own Model Development
                                                                </td>
                                                                <td width="50%" class="">
                                                                    Voice Bot Team Individual Contribution of 300 words each month  
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="30%" class="">
                                                    15%  
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="50%" class="">
                                                  <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="50%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>


                            <tr>
                                <td class="" width="60%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class="">
                                                    <table class="table-bordered p-0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td width="50%" class="">
                                                                   Attendance
                                                                </td>
                                                                <td width="50%" class="">
                                                                    1. Attendance <br/>2. Late Reporting <br/>3. Policy adherence <br/>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="30%" class="">
                                                    5%  
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="50%" class="">
                                                      <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="50%" class="">
                                                       <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                             <tr>
                                <td class="" width="60%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class="">
                                                   &nbsp;
                                                </td>
                                                <td width="30%" class="">
                                                    <b>100%</b>
                                                </td>
                                                <td width="15%" class="">
                                                  
                                                </td>
                                                <td width="15%" class="">
                                                   <b>TOTAL SCORE</b>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                   <b>0</b>
                                                </td>
                                                <td width="50%" class="">
                                                    <b></b>  
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class=""  width="20%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="">
                                                    <b>0</b>
                                                </td>
                                                <td width="50%" class="">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row mt-2">
                                        <div class="text-end col-xl-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- end col -->

    </div><!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->

    <!-- dashboard init -->
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\__Codings\ClientWorks\ABS\Prototyping\pms_prototype\resources\views/vmt_appraisalreview.blade.php ENDPATH**/ ?>