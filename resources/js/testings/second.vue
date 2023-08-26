<template>
    <div class="timeline-container">
      <div v-for="experience in experiences" :key="experience.id" class="timeline-item">
        <div class="timeline-dot">
          {{ experience.years }}
        </div>
        <div class="timeline-content">
          <h3 class="text-lg font-semibold">{{ experience.title }}</h3>
          <p class="text-gray-600">{{ experience.details }}</p>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';

  const experiences = ref([
    {
      id: 1,
      years: '2015 - 2017',
      title: 'Job Title 1',
      details: 'Description of job responsibilities and achievements...',
    },
    {
      id: 2,
      years: '2017 - 2020',
      title: 'Job Title 2',
      details: 'Description of job responsibilities and achievements...',
    },
    // Add more experience items as needed
  ]);
  </script>

  <style scoped>
  .timeline-container {
  }

  .timeline-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 2rem;
  }

  .timeline-dot {
    @apply w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold;
  }

  .timeline-content {
    margin-left: 1rem;
  }
  </style>
