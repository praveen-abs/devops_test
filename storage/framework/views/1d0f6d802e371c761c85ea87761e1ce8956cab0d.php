
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
        <?php $__env->slot('title'); ?> Self Appraisal Review <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


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
                                    <?php echo e(Auth::user()->name); ?>

                                </td>
                            </tr>
                            <tr  style="border: none;">
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
                                <b>Review Period:  </b>
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
                            <tr style="border: none;" >
                                <td class=" text-left">
                                <b>Overall Annual Score: </b>
                                </td>
                                <td class="text-left">
                                    80
                                </td>
                            </tr>
                            <tr  style="border: none;">
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

            <div class="card">
                <div class="card-body pb-2">
                    <table class="table table-bordered align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="" style=" background-color: #405189;" >
                                    <table class="" width="100%" >
                                        <tbody>
                                            <tr>
                                                <td width="30%" class="" style=" background-color: #405189;">
                                                    <h6 style="color:white;">Objectives </h6>
                                                </td>
                                                <td width="25%" class="" style=" background-color: #405189;">
                                                    <h6 style="color:white;">Activities </h6>
                                                </td>                                                
                                                <td width="15%" class="r" style=" background-color: #405189;">
                                                    <h6 style="color:white;">Weightage  % </h6>
                                                </td>
                                                <td width="16%" class="" style=" background-color: #405189;">
                                                    <h6 style="color:white;">Self<br/> Appraisal </h6>
                                                </td>
                                                <td width="4%" class="r" style=" background-color: #405189;">
                                                    <h6 style="color:white;">Achieved  % </h6>
                                                </td>              
                                            </tr>
                                        </tbody>
                                    </table>
                                </th>
                               

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L1_Review')): ?>
                                <th   style=" background-color: #405189;" >
                                    <h6 style="color:white;">Reporting Manger Review's (L1)<br/><br/>  Comments &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Score</h6>
                                </th> 
                                <?php endif; ?>
                               
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L2_Review')): ?>                                                   
                                <th  class="r" style=" background-color: #405189;">
                                    <h6 style="color:white;"> Managers Manager (L2)<br/><br/>  Comments &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Score</h6>
                                </th>   
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Final_Review')): ?>            
                                <th class="r" style=" background-color: #405189;">
                                    <h6 style="color:white;"> Final Review <br/>( HR or Head Of the Department)</h6>
                                </th> 
                                <?php endif; ?>        
                                                                                             
                            </tr>



                        </thead>
                        <tbody>
                
                            <tr>
                                <td class="" width="60%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class=" table-bordered p-0">
                                                    <table class="table-bordered p-0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td width="50%" class="">
                                                                   Revenue as per AOP for the FY 2022-23
                                                                </td>
                                                                <td  class="">
                                                                    Total Revenue to be decided by Manager and HOD   
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="10%" class="">
                                                    25%  
                                                </td>
                                                <td width="15%" class="">
                                                    <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="5%" class="">
                                                   <input type="number" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="%" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L1_Review')): ?>
                                <td class="" >
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
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L2_Review')): ?>
                                <td class="">
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
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Final_Review')): ?>
                                <td class="" width="100%">
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
                                <?php endif; ?>                              
                            </tr>

                            <tr>
                                <td class="" width="60%">
                                    <table class="table-bordered  p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class=" table-bordered p-0">
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
                                                <td width="10%" class="">
                                                    20%  
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="5%" class="">
                                                   <input type="number" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="%" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L1_Review')): ?>
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
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L2_Review')): ?>
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
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Final_Review')): ?>
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
                                <?php endif; ?>                                
                            </tr>
    
                            <tr>
                                <td class="" width="60%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class=" table-bordered p-0">
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
                                                <td width="10%" class="">
                                                    20% 
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="5%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L1_Review')): ?>
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
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L2_Review')): ?>
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
                                <?php endif; ?>
                                
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Final_Review')): ?>
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
                                <?php endif; ?>                               
                            </tr>
                            
                            <tr>
                                <td class="" width="60%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class=" table-bordered p-0">
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
                                                <td width="10%" class="">
                                                    15%  
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="5%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L1_Review')): ?>
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
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L2_Review')): ?>
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
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Final_Review')): ?>
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
                                <?php endif; ?>                              
                            </tr>

    
                            <tr>
                                <td class="" width="60%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class=" table-bordered p-0">
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
                                                <td width="10%" class="">
                                                    15%  
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="5%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L1_Review')): ?>
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
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L2_Review')): ?>
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
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Final_Review')): ?>
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
                                <?php endif; ?>                            
                            </tr>


                            <tr>
                                <td class="" width="60%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class=" table-bordered p-0">
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
                                                <td width="10%" class="">
                                                    5%  
                                                </td>
                                                <td width="15%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                                <td width="5%" class="">
                                                   <input type="text" class="form-control" placeholder="" id="gen-info-description-input" name="performance" placeholder="remark" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L1_Review')): ?>
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
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L2_Review')): ?>
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
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Final_Review')): ?>
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
                                <?php endif; ?>

                            </tr>

                            <tr>
                                <td class="" width="60%">
                                    <table class="table-bordered p-0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="40%" class="">
                                                   &nbsp;
                                                </td>
                                                <td width="10%" class="">
                                                    <b>100%</b>
                                                </td>
                                                <td width="15%" class="">
                                                  
                                                </td>
                                                <td width="15%" class="">
                                                   <b>TOTAL SCORE</b>
                                                </td>
                                                <td width="15%" class="">
                                                   <b>&nbsp;</b>
                                                </td>                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L1_Review')): ?>
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
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('L2_Review')): ?>
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
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Final_Review')): ?>
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
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row mt-2">
                                        <div class="text-end col-xl-12">
                                            <button type="submit" class="btn btn-primary">Save</button>
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
        <div class="row mt-3">
                                <div class="col-lg-12">
                                    <label class="form-label">
                                    Appraiser Feedback:
                                    </label>
                                    <div class="my-2">
                                        <textarea class="form-control" placeholder="" id="gen-info-description-input" name="performance" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <table class="table-bordered p-0" width="100%">
                    <thead>
                        <tr>
                            <th width="28%" class="">
                               Rating Grid
                            </th>
                            <th width="10%" class=""></th>
                            <th width="8%" class=""></th>
                            <th width="8%" class=""> </th>
                            <th width="8%" class=""></th>
                            <th width="8%" class=""></th>
                            <th width="30%" class="">
                               Appraisee's Annual Score & Rating
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                                    

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
                                         
                            <td  class="">
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
                            <td  class="">
                               Ranking
                            </td>
                            <td  class="">1</td>
                            <td  class="">2</td>
                            <td class="">3</td>
                            <td class="">4</td>
                            <td  class="">5</td>
                            <td  class="">5</td>
                        </tr>
                        <tr>
                                
                            <td  class="">
                               Action
                            </td>
                            <td class="">Exit</td>
                            <td  class="">PIP</td>
                            <td  class="">10% </td>
                            <td  class=""> 15% </td>
                            <td  class="">20%</td>
                            <td  class=""></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->

    <!-- dashboard init -->
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\__Codings\ClientWorks\ABS\Prototyping\pms_prototype\resources\views/vmt_appraisalreview.blade.php ENDPATH**/ ?>