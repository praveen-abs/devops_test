<template>
    <div class="image-slider">
      <div class="slider-container">
        <img v-for="(image, index) in images" :key="index" :src="image" :class="{ active: currentIndex === index }">
      </div>
      <div class="indicator">
        <span v-for="(image, index) in images" :key="index" :class="{ active: currentIndex === index }" @click="setCurrentIndex(index)"></span>
      </div>
    </div>
  </template>

  <script setup>
  import { onMounted, ref } from 'vue';

  // Sample image URLs (replace with your actual image URLs)
  const images = ref([
    '../hrms/assests/images/gear-wide(1).svg',
    '../hrms/assests/images/gear-wide(1).svg',
    '../hrms/assests/images/gear-wide(1).svg',
    '../hrms/assests/images/gear-wide(1).svg',
    '../hrms/assests/images/gear-wide(1).svg',
  ]);

  const currentIndex = ref(0);

  function nextImage() {
    currentIndex.value = (currentIndex.value + 1) % images.value.length;
}

function prevImage() {
    currentIndex.value = (currentIndex.value - 1 + images.value.length) % images.length;
}

// Autoplay functionality (optional)
const autoplayInterval = 5000; // Set the time in milliseconds
let autoplayTimer;

function startAutoplay() {
    autoplayTimer = setInterval(nextImage, autoplayInterval);
}

function stopAutoplay() {
    clearInterval(autoplayTimer);
}

// onMounted(startAutoplay);

onMounted(() => {
    startAutoplay()
})

  const setCurrentIndex = (index) => {
    currentIndex.value = index;
  };
  </script>

  <style>
  /* Styling for the image slider and indicator */
  .image-slider {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
  }

  .slider-container {
    display: flex;
    overflow: hidden;
    margin-bottom: 10px;
  }

  .slider-container img {
    width: 100%;
    max-width: 100%;
    opacity: 0;
    transition: opacity 0.5s ease;
  }

  .slider-container img.active {
    opacity: 1;
  }

  .indicator {
    display: flex;
    gap: 10px;
  }

  .indicator span {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #ccc;
    cursor: pointer;
  }

  .indicator span.active {
    background-color: #555;
  }
  </style>
