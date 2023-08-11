<template>
    <!-- <div class="image-slider">
      <div class="slider-container">
        <img v-for="(image, index) in images" :key="index" :src="image" :class="{ active: currentIndex === index }">
      </div>
      <div class="indicator">
        <span v-for="(image, index) in images" :key="index" :class="{ active: currentIndex === index }" @click="setCurrentIndex(index)"></span>
      </div>
    </div> -->

    <div class="relative inline-block text-left">
        <div>
          <button type="button" class="flex items-center text-gray-600 focus:outline-none">
            <img src="profile-icon.png" alt="Profile Icon" class="w-8 h-8 rounded-full">
            <svg class="w-4 h-4 ml-2 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7.293 6.293a1 1 0 011.414 0L10 7.586l1.293-1.293a1 1 0 111.414 1.414l-2 2a1 1 0 01-1.414 0l-2-2a1 1 0 010-1.414z"/><path d="M10 18a8 8 0 100-16 8 8 0 000 16z"/></svg>
          </button>
        </div>
        <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
          <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">View Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Logout</a>
          </div>
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
