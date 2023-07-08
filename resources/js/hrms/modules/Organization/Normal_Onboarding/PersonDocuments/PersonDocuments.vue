<template>
    <div class="p-2 my-6 mb-0 shadow card profile-box card-top-border">
        <div class="card-body justify-content-center align-items-center">
          <div class="flex header-card-text">
            <!-- <img src="../../../assests/images/folder.png" class="w-1 h-14" alt=""> -->
            <h6 class="my-2"><i class="fa fa-file-image-o" aria-hidden="true"></i> Personal Documents</h6>
          </div>

            <div class="mb-2 form-card">
                <div class="mt-1 row">
                    <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <label for="" class="float-label">Aadhar Card Front<span class="text-danger">*</span></label>
                        <input type="file" accept="image/png, image/gif, image/jpeg" ref="AadharCardFront" id="formFile"
                            class="onboard-form form-control file"
                            @change="service.getPersonalDocuments($event, 'AadharFront')" />
                        <span v-if="v$.AadharCardFront.$error" class="font-medium text-red-600 fs-6">
                            {{ v$.AadharCardFront.required.$message.replace("Value", "Aadhar card front is required") }}
                        </span>


                    </div>
                    <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6" id="aadhar_card_backend_content">
                        <label for="" class="float-label">
                            Aadhar Card Back<span class="text-danger">*</span></label>
                        <input type="file" accept="image/png, image/gif, image/jpeg" ref="AadharCardBack"
                            @change="service.getPersonalDocuments($event, 'AadharBack')"
                            class="onboard-form form-control file" />
                        <span v-if="v$.AadharCardBack.$error" class="font-medium text-red-600 fs-6">
                            {{ v$.AadharCardBack.required.$message.replace("Value", "Aadhar card back is required") }}
                        </span>


                    </div>
                    <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <label for="" class="float-label">
                            Pan Card<span class="text-danger">*</span></label>
                        <input type="file" accept="image/png, image/gif, image/jpeg" placeholder="Pan Card"
                            name="pan_card_file" id="pan_card_file" ref="PanCardDoc"
                            @change="service.getPersonalDocuments($event, 'Pancard')"
                            class="onboard-form form-control file" />
                        <span v-if="v$.PanCardDoc.$error" class="font-medium text-red-600 fs-6">
                            {{ v$.PanCardDoc.required.$message.replace("Value", "Pan card is required") }}
                        </span>


                    </div>
                    <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <label for="" class="float-label"> Passport</label>

                        <input type="file" accept="image/png, image/gif, image/jpeg" ref="PassportDoc"
                            placeholder="Passport" name="passport_file" id="passport_file"
                            @change="service.getPersonalDocuments($event, 'Passport')"
                            class="onboard-form form-control file" />
                    </div>
                    <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <label for="" class="float-label">Voter ID</label>

                        <input type="file" accept="image/png, image/gif, image/jpeg" ref="VoterIdDoc"
                            placeholder="Voters ID" name="voters_id_file" id="voters_id_file"
                            @change="service.getPersonalDocuments($event, 'VoterId')"
                            class="onboard-form form-control file" />
                    </div>
                    <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <label for="" class="float-label"> Driving License</label>

                        <input type="file" accept="image/png, image/gif, image/jpeg" placeholder="Driving License"
                            name="dl_file" id="dl_file" @change="service.getPersonalDocuments($event, 'DrivingLicense')"
                            ref="DrivingLicenseDoc" class="onboard-form form-control file" />
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <label for="" class="float-label">Educations Certificate<span class="text-danger">*</span></label>
                        <input type="file" accept="image/png, image/gif, image/jpeg" placeholder="Educations Certificate"
                            name="education_certificate_file"
                            @change="service.getPersonalDocuments($event, 'EducationCertificate')"
                            id="education_certificate_file" ref="EductionDoc" class="onboard-form form-control file " />
                        <span v-if="v$.EductionDoc.$error" class="font-medium text-red-600 fs-6">
                            {{ v$.EductionDoc.required.$message.replace("Value", "Education certificate is required") }}
                        </span>


                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                        <label for="" class="float-label"> Relieving Letter</label>
                        <input type="file" accept="image/png, image/gif, image/jpeg" placeholder="Relieving Letter"
                            name="reliving_letter_file" id="reliving_letter_file"
                            @change="service.getPersonalDocuments($event, 'RelievingLetter')" ref="ReleivingLetterDoc"
                            class="onboard-form form-control file" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="text-right col-12">
                    <input type="button" value="sample" @click="service.Sampledata"
                        class="mr-4 text-center btn btn-orange processOnboardForm" />

                    <input class="btn btn-orange" type="button" value="check" @click="service.compensatoryCalWhileQuick">

                    <button type="button" data="row-6" next="row-6" placeholder="" name="save_form" id="save_button"
                        class="mr-4 text-center btn btn-orange processOnboardForm" value="button"
                        @click="service.submitForm(0)">
                        Save
                    </button>

                    <button type="submit" data="row-6" next="row-6" placeholder="" name="submit_form" id="msform"
                        class="text-center btn btn-orange processOnboardForm" value="button" @click="service.submitForm(1)">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

import { useNormalOnboardingMainStore } from '../stores/NormalOnboardingMainStore'


const service = useNormalOnboardingMainStore()

import useValidate from '@vuelidate/core'

const v$ = useValidate(service.rules, service.employee_onboarding);



</script>


<style>
#custom-button {
    padding: 5px;
    color: white;
    background-color: #00b28f;
    border: 1px solid #000;
    border-radius: 5px;
    cursor: pointer;
}

#custom-button:hover {
    background-color: #00b28f;
}

#custom-text {
    margin-left: 10px;
    font-family: sans-serif;
    color: #aaa;
}
</style>
