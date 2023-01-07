<script setup>
import { ref } from 'vue'
import Button from 'primevue/button';

const count = ref(0)


</script>


<template>
    <h4>This is ButtonCounter.vue</h4>
  {{ count }}
  <button @click="count++">Button Counter</button> <br />
  <Button label="Secondary" class="p-button-rounded p-button-secondary" />
</template>
