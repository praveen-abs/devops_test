<script setup>
import { ref } from 'vue'

const count = ref(0)
</script>

<template>
    <h4>This is globally registered component</h4>
  {{ count }}
  <button @click="count++">Count</button>
</template>
