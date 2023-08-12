<template>
<<<<<<< HEAD

</template>
=======
    <div class="p-4">
      <div class="flex space-x-4">
        <button
          v-for="(tab, index) in tabs"
          :key="index"
          @click="activeTab = index"
          :class="{
            'border text-white': activeTab === index,
            'bg-gray-200': activeTab !== index,
          }"
          class="px-4 py-2 rounded focus:outline-none"
        >
          {{ tab.title }}
        </button>
      </div>

      <transition name="fade" mode="out-in">
        <div :key="activeTab" class="mt-4">
          {{ tabs[activeTab].content }}
        </div>
      </transition>
    </div>
  </template>



  <script setup>
  import { ref } from 'vue';

  const tabs = [
    { title: 'Tab 1', content: 'Content for Tab 1' },
    { title: 'Tab 2', content: 'Content for Tab 2' },
    { title: 'Tab 3', content: 'Content for Tab 3' },
  ];

  const activeTab = ref(0);
  </script>

<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>
>>>>>>> 99cb933385fd803ae9a00182e52604935ba57f1b
