<template>
    <div class="card">
        <div class="card-body">
            <div class="flex justify-between">
                <div>
                    <p>Quick Onboarding</p>
                </div>
                <div>
                    <button class="btn btn-orange">Dowload Sample</button>
                </div>
            </div>
            <div class="card bg-blue-50">
                <div class="card-body">
                    <div class="col-form-label">
                        <h6> Upload Instructions</h6>
                        <div class="py-2 my-4 alert f-12 alert-warning"><i class='fa fa-warning text-danger'></i> Read
                            these instructions before uploading the file.</div>
                        <div>
                            <ul class="list-style" style="">
                                <li class="my-4"><i class="text-green-500 fa fa-check" aria-hidden="true"></i> Employee
                                    Number,Employee Name, Email, Date of joining
                                    and Location fields are required to add employees in.</li>
                                <li class="my-4"><i class="text-green-500 fa fa-check"></i> Enter mobile number is mandatory
                                    while adding employee </li>


                                <li class="my-4"><i class="text-green-500 fa fa-check"></i> Email id should be valid to
                                    receive all notifications such as leave request
                                    notifications, Attendance request notification and Timesheet reminder
                                    notifications etc. </li>

                                <li class="my-4"> <i class="text-green-500 fa fa-check"></i> Employee email is unique across
                                    . So, cannot add same employee in two
                                    Organizations with same email. </li>

                                <li class="my-4"><i class="text-green-500 fa fa-check"></i> Designation is mandatory since
                                    it will help to identify employees in People picker
                                    search results when 2 or more employees have same Name. </li>
                                <li class="my-4"><i class="text-green-500 fa fa-check"></i> Please check email notifications
                                    in Junk / Spam / Filtered folders if they are
                                    not visible in Inbox. </li>
                                <!---->
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="block">
                <label for="lead_mail" class="block text-gray-900 ">
                    Upload File</label>
                <div class="flex items-center ">

                    <input type="text" readonly id="&quot;form-subscribe-Subscribe"
                        class="mr-2 focus:ring-slate-400 focus:ring-1 " placeholder="Choose CSV File" />

                    <button class="btn-indigo-600">
                        Upload
                    </button>
                    <input name="file" type="file" accept=".csv" id="file" class="hidden focus:ring-slate-400 focus:ring-1 "
                        browse file />
                </div>
            </div>

        </div>
    </div>
</template>
