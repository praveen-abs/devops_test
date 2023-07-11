<template>
    <div class="uploadEmployee-wrpper">
        <div class="border-0 shadow card profile-box card-top-border p-2">
            <h6 class="text-xl font-semibold"> Employee Quick Onboarding</h6>
            <div class="col col-form-label flex">
                <ul class="list-style-numbered w-9">
                    <li class="my-4"><i class="text-green-500 fa fa-step-forward" aria-hidden="true"></i> Download the
                        <a class="choose-file ms-1" href="http://127.0.0.1:8000/assets/sample_employeeBulkOnboarding.xlsx"
                            target="_blank">
                            <i class="fa fa-file" aria-hidden="true"></i>
                            <p class="mx-4">Sample file</p>
                        </a>
                    </li>
                    <li class="my-4"><i class="text-green-500 fa fa-step-forward" aria-hidden="true"></i> Read the upload
                        instructions on the right before uploading .</li>
                    <li class="my-4"><i class="text-green-500 fa fa-step-forward" aria-hidden="true"></i> Fill the
                        information in excel template</li>
                    <li class="my-4">
                        <div>
                            <!-- upload file -->
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-orange">Upload</button>
                        </div>

                        <div class="">

                            <p id="success-msg"></p>
                            <p id="error-msg"></p>


                        </div>
                    </li>
                </ul>
                <div class="">
                    <div class="col-form-label">
                        <h6> Upload Instructions</h6>
                            <div class="py-2 my-4 alert f-12 alert-warning"><i class='fa fa-warning text-danger'></i> Read
                                these instructions before uploading the file.</div>
                            <div>
                                <ul class="list-style" style="">
                                    <li class="my-4"><i class="text-green-500 fa fa-check" aria-hidden="true"></i> Employee
                                        Number,Employee Name, Email, Date of joining
                                        and Location fields are required to add employees in.</li>
                                    <li class="my-4"><i class="text-green-500 fa fa-check"></i> Enter mobile number is
                                        mandatory while adding employee </li>


                                    <li class="my-4"><i class="text-green-500 fa fa-check"></i> Email id should be valid to
                                        receive all notifications such as leave request
                                        notifications, Attendance request notification and Timesheet reminder
                                        notifications etc. </li>

                                    <li class="my-4"> <i class="text-green-500 fa fa-check"></i> Employee email is unique
                                        across . So, cannot add same employee in two
                                        Organizations with same email. </li>

                                    <li class="my-4"><i class="text-green-500 fa fa-check"></i> Designation is mandatory
                                        since it will help to identify employees in People picker
                                        search results when 2 or more employees have same Name. </li>
                                    <li class="my-4"><i class="text-green-500 fa fa-check"></i> Please check email
                                        notifications in Junk / Spam / Filtered folders if they are
                                        not visible in Inbox. </li>
                                    <!---->
                                </ul>

                            </div>
                    </div>
                </div>
        </div>
    </div>
</div></template>
