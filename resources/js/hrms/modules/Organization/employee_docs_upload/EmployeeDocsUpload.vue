<template>
    <h2>Upload Documents</h2>
    <br/>
    <div class="p-2 shadow card profile-box card-top-border">
        <div class="card-body justify-content-center align-items-center">
            <div class="header-card-text">
            <h6 class="mb-0">Personal Documents</h6>
            </div>
            <div class="mb-2 form-card">
            <div class="mt-1 row">
                <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <label for="" class="float-label"
                    >Aadhar Card Front<span class="text-danger">*</span></label
                >

                <input
                    v-if="AadharDocFrontInvalid"
                    type="file"
                    accept="image/png, image/gif, image/jpeg"
                    ref="AadharCardFront"
                    class="onboard-form form-control file is-invalid"
                    @change="AadharFront($event)"
                />
                <input
                    v-if="!AadharDocFrontInvalid"
                    type="file"
                    accept="image/png, image/gif, image/jpeg"
                    ref="AadharCardFront"
                    class="onboard-form form-control file"
                    @change="AadharFront($event)"
                />
                <span class="p-error" v-if="AadharDocFrontInvalid"
                    >Aadhar Card Front is required</span
                >
                </div>
                <div
                class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6"
                id="aadhar_card_backend_content"
                >
                <label for="" class="float-label">
                    Aadhar Card Back<span class="text-danger">*</span></label
                >

                <input
                    v-if="AadharDocBackInvalid"
                    type="file"
                    accept="image/png, image/gif, image/jpeg"
                    ref="AadharCardBack"
                    @change="AadharBack($event)"
                    class="onboard-form form-control file is-invalid"
                />
                <input
                    v-if="!AadharDocBackInvalid"
                    type="file"
                    accept="image/png, image/gif, image/jpeg"
                    ref="AadharCardBack"
                    @change="AadharBack($event)"
                    class="onboard-form form-control file"
                />

                <span v-if="AadharDocBackInvalid" class="p-error"
                    >Aadhar Card Back is Required</span
                >
                </div>
                <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <label for="" class="float-label">
                    Pan Card<span class="text-danger">*</span></label
                >

                <input
                    v-if="PancardInvalid"
                    type="file"
                    accept="image/png, image/gif, image/jpeg"
                    placeholder="Pan Card"
                    name="pan_card_file"
                    id="pan_card_file"
                    ref="PanCardDoc"
                    @change="PanCard($event)"
                    class="onboard-form form-control file is-invalid"
                />

                <input
                    v-if="!PancardInvalid"
                    type="file"
                    accept="image/png, image/gif, image/jpeg"
                    placeholder="Pan Card"
                    name="pan_card_file"
                    id="pan_card_file"
                    ref="PanCardDoc"
                    @change="PanCard($event)"
                    class="onboard-form form-control file"
                />

                <span v-if="PancardInvalid" class="p-error"
                    >Pan Card is Required</span
                >
                </div>
                <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <label for="" class="float-label"> Passport</label>

                <input
                    type="file"
                    accept="image/png, image/gif, image/jpeg"
                    ref="PassportDoc"
                    placeholder="Passport"
                    name="passport_file"
                    id="passport_file"
                    @change="Passport($event)"
                    class="onboard-form form-control file"
                />
                </div>
                <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <label for="" class="float-label">Voter ID</label>

                <input
                    type="file"
                    accept="image/png, image/gif, image/jpeg"
                    ref="VoterIdDoc"
                    placeholder="Voters ID"
                    name="voters_id_file"
                    id="voters_id_file"
                    @change="VoterId($event)"
                    class="onboard-form form-control file"
                />
                </div>
                <div class="mb-2 col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <label for="" class="float-label"> Driving License</label>

                <input
                    type="file"
                    accept="image/png, image/gif, image/jpeg"
                    placeholder="Driving License"
                    name="dl_file"
                    id="dl_file"
                    @change="DrivingLisence($event)"
                    ref="DrivingLicenseDoc"
                    class="onboard-form form-control file"
                />
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <label for="" class="float-label"
                    >Educations Certificate<span class="text-danger">*</span></label
                >
                <input
                    type="file"
                    accept="image/png, image/gif, image/jpeg"
                    placeholder="Educations Certificate"
                    name="education_certificate_file"
                    @change="EductionCertifacte($event)"
                    v-if="EducationCertificateInvalid"
                    id="education_certificate_file"
                    ref="EductionDoc"
                    class="onboard-form form-control file is-invalid"
                />

                <input
                    type="file"
                    accept="image/png, image/gif, image/jpeg"
                    placeholder="Educations Certificate"
                    name="education_certificate_file"
                    @change="EductionCertifacte($event)"
                    v-if="!EducationCertificateInvalid"
                    id="education_certificate_file"
                    ref="EductionDoc"
                    class="onboard-form form-control file"
                />

                <span v-if="EducationCertificateInvalid" class="p-error"
                    >Eduction Certifacte is Required</span
                >
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <label for="" class="float-label"> Relieving Letter</label>
                <input
                    type="file"
                    accept="image/png, image/gif, image/jpeg"
                    placeholder="Relieving Letter"
                    name="reliving_letter_file"
                    id="reliving_letter_file"
                    @change="ReleivingLetter($event)"
                    ref="ReleivingLetterDoc"
                    class="onboard-form form-control file"
                />
                </div>
            </div>
            </div>

            <div class="row">
            <div class="text-right col-12">
                <button
                type="submit"
                data="row-6"
                next="row-6"
                placeholder=""
                name="submit_form"
                id="msform"
                class="text-center btn btn-orange processOnboardForm"
                value="Submit"
                :disabled="fileUploadValidation"
                @click="SubmitEmployeeOnboardingData"
                >
                Submit
                </button>
            </div>
            </div>
        </div>
    </div>
</template>

<script setup>



</script>
