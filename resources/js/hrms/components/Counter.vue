<script setup>
import { ref } from 'vue'
import Button from 'primevue/button';

const count = ref(0)
</script>

<template>
    <h4>This is Counter.vue</h4>
  {{ count }}
  <button @click="count++">Count</button> <br />
  <Button label="Success" class="p-button-success" />

</template>
