<template>
        <button
          class="transition ease-in-out duration-300 w-12 bg-gray-200 rounded-full focus:outline-none"
          :class="[isChecked ? 'bg-green-300':'bg-red-300'  ]"
          @click="isChecked = !isChecked"
        >
          <div
            class="transition ease-in-out duration-300 rounded-full h-6 w-6 bg-white shadow"
            :class="{ 'transform translate-x-full ': isChecked }"
          ></div>
        </button>

  </template>

  <script>
import { ref } from 'vue';

export default {
  setup() {
    const isChecked = ref(false);

    const toggleChecked = () => {
      isChecked.value = !isChecked.value;
    };

    return {
      isChecked,
      toggleChecked,
    };
  },
};
</script>
