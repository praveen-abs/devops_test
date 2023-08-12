<template>
    <div class="carousel">
      <div class="carousel-items">
        <div v-for="(item, index) in items" :key="index" class="carousel-item" :class="{ active: currentIndex === index }">
          {{ item }}
        </div>
<<<<<<< HEAD
      </div>
      <button @click="changeSlide(-1)" class="change-button">Previous</button>
      <button @click="changeSlide(1)" class="change-button">Next</button>
=======
        <div class=" col-12" v-if="type == 'LC' || type == 'MIP'">
            <div class="row">
                <div class="col-6"><label class="font-medium fs-6 text-gray-700">Regularize Timing
                        as</label>
                </div>
                <div class="col-6">
                    9.30AM
                </div>
            </div>
        </div>
        <div class=" col-12" v-if="type == 'EG' || type == 'MOP'">
            <div class="row">
                <div class="col-6"><label class="font-medium fs-6 text-gray-700">Regularize Timing
                        as</label>
                </div>
                <div class="col-6">
                    6.30PM
                </div>
            </div>
        </div>
        <div v-if="type == 'LC'">
            <div class="col-12">
                <div class="row">
                    <div class="col-6"><label class="font-medium fs-6 text-gray-700">Reason</label></div>
                    <div class="col-6" v-if="source.lc_status">
                        <p class="max-w-min p-1" :class="findStatus(source.lc_status)"> {{ source.lc_status }}</p>
                    </div>
                    <div class="col-6" v-else>
                        <select name="reason" class="form-select btn-line-orange" id="reason_lc">
                            <option selected hidden disabled>
                                Choose Reason
                            </option>
                            <option value="Permission">Permission</option>
                            <option value="Technical Error">Technical Error</option>
                            <option value="Technical Error">Official</option>
                            <option value="Technical Error">Personal</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 " v-if="false">
                <div class="row">
                    <div class="col-12">
                        <textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control "
                            placeholder="Reason here...."></textarea>
                    </div>
                </div>
            </div>

            <div v-if="!source.lc_status" class="text-end btn btn-orange">Apply</div>
        </div>
        <div v-if="type == 'MIP'">
            <div class="col-12">
                <div class="row">
                    <div class="col-6"><label class="font-medium fs-6 text-gray-700">Reason</label></div>
                    <div class="col-6" v-if="source.mip_status">
                        <p class="max-w-min p-1" :class="findStatus(source.mip_status)"> {{ source.mip_status }}</p>
                    </div>
                    <div class="col-6" v-else>
                        <select name="reason" class="form-select btn-line-orange" id="reason_lc">
                            <option selected hidden disabled>
                                Choose Reason
                            </option>
                            <option value="Permission">Permission</option>
                            <option value="Technical Error">Technical Error</option>
                            <option value="Technical Error">Official</option>
                            <option value="Technical Error">Personal</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 " v-if="false">
                <div class="row">
                    <div class="col-12">
                        <textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control "
                            placeholder="Reason here...."></textarea>
                    </div>
                </div>
            </div>

            <div v-if="!source.mip_status" class="text-end btn btn-orange">Apply</div>
        </div>
        <div v-if="type == 'EG'">
            <div class="col-12">
                <div class="row">
                    <div class="col-6"><label class="font-medium fs-6 text-gray-700">Reason</label></div>
                    <div class="col-6" v-if="source.eg_status">
                        <p class="max-w-min p-1" :class="findStatus(source.eg_status)"> {{ source.eg_status }}</p>
                    </div>
                    <div class="col-6" v-else>
                        <select name="reason" class="form-select btn-line-orange" id="reason_lc">
                            <option selected hidden disabled>
                                Choose Reason
                            </option>
                            <option value="Permission">Permission</option>
                            <option value="Technical Error">Technical Error</option>
                            <option value="Technical Error">Official</option>
                            <option value="Technical Error">Personal</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 " v-if="false">
                <div class="row">
                    <div class="col-12">
                        <textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control "
                            placeholder="Reason here...."></textarea>
                    </div>
                </div>
            </div>

            <div v-if="!source.eg_status" class="text-end btn btn-orange">Apply</div>
        </div>
        <div v-if="type == 'MOP'">
            <div class="col-12">
                <div class="row">
                    <div class="col-6"><label class="font-medium fs-6 text-gray-700">Reason</label></div>
                    <div class="col-6" v-if="source.mop_status">
                        <p class="max-w-min p-1" :class="findStatus(source.mop_status)"> {{ source.mop_status }}</p>
                    </div>
                    <div class="col-6" v-else>
                        <select name="reason" class="form-select btn-line-orange" id="reason_lc">
                            <option selected hidden disabled>
                                Choose Reason
                            </option>
                            <option value="Permission">Permission</option>
                            <option value="Technical Error">Technical Error</option>
                            <option value="Technical Error">Official</option>
                            <option value="Technical Error">Personal</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 " v-if="false">
                <div class="row">
                    <div class="col-12">
                        <textarea name="custom_reason" id="reasonBox" cols="30" rows="3" class="form-control "
                            placeholder="Reason here...."></textarea>
                    </div>
                </div>
            </div>

            <div v-if="!source.mop_status" class="text-end btn btn-orange">Apply</div>
        </div>


>>>>>>> 99cb933385fd803ae9a00182e52604935ba57f1b
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';

  const items = ref(['Item 1', 'Item 2', 'Item 3', 'Item 4']);
  const currentIndex = ref(0);

  const changeSlide = (step) => {
    currentIndex.value = (currentIndex.value + step + items.length) % items.length;
  };
  </script>

  <style>
  .carousel {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .carousel-items {
    display: flex;
    overflow: hidden;
    width: 300px;
    margin-bottom: 16px;
  }

  .carousel-item {
    flex: 0 0 300px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ccc;
    transition: transform 0.3s ease;
  }

  .carousel-item.active {
    transform: translateX(0);
  }

  .carousel-item:not(.active) {
    transform: translateX(-100%);
  }

  .change-button {
    margin: 0 4px;
  }
  </style>
