<template>
    <div>
        <div class="w-full">
            <div class="card w-8">
                <div class="card-header">
                    HRA Calculation
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class=" ww-full d-flex  justify-around ">
                           <h1>Do you want to consider default rent paid amount for HRA calculation?</h1>
                            <div class="d-flex">
                                <div class="justify-around items-center  ">
                                    <input type="radio" name="HRA-cal" id="">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}">yes</label>
                                </div>
                                <div class="justify-around items-center  ">
                                    <input type="radio" name="HRA-cal" id="">
                                    <label for="" class="mx-3 text-1xl" :style="{color:'#002f56'}">No</label>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const ingredient = ref('');

</script>




{

<!-- <template>
    <div class="card flex justify-content-center">
        <div class="flex flex-wrap gap-3">
            <div class="flex align-items-center">
                <RadioButton v-model="ingredient" inputId="ingredient1" name="pizza" value="Cheese" />
                <label for="ingredient1" class="ml-2">Cheese</label>
            </div>
            <div class="flex align-items-center">
                <RadioButton v-model="ingredient" inputId="ingredient2" name="pizza" value="Mushroom" />
                <label for="ingredient2" class="ml-2">Mushroom</label>
            </div>
            <div class="flex align-items-center">
                <RadioButton v-model="ingredient" inputId="ingredient3" name="pizza" value="Pepper" />
                <label for="ingredient3" class="ml-2">Pepper</label>
            </div>
            <div class="flex align-items-center">
                <RadioButton v-model="ingredient" inputId="ingredient4" name="pizza" value="Onion" />
                <label for="ingredient4" class="ml-2">Onion</label>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const ingredient = ref('');
</script> -->
}
