<template>
    <div class="w-screen h-screen flex justify-center items-center bg-gray-100">
      <div class="btn-status">
        <input
          type="checkbox"
          name="checkbox"
          id="checkbox"
          class="hidden"
          v-model="isChecked"
        />
        <label
          for="checkbox"
          class="relative inline-block w-12 h-6 rounded-lg  transition duration-300"
          :class="[  isChecked  ? ' bg-green-200' : 'bg-red-200']"
        >
          <span
            class="absolute inset-0 inline-block w-6 h-6 rounded-full shadow transform transition-transform"
            :class="[  isChecked  ? 'translate-x-6 bg-green-500' : 'bg-red-500']"
          ></span>
        </label>
      </div>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';

  const isChecked = ref(false);
  </script>

  <style scoped>
  /* Add your global styles or Tailwind utility classes here */
  </style>
