<template>
    <div class="image-slider">
      <transition name="fade" mode="out-in">
        <img :src="currentImage" :key="currentImage" alt="Holiday Image" />
      </transition>
      <div class="controls">
        <button @click="prevImage">Previous</button>
        <button @click="nextImage">Next</button>
      </div>
    </div>
  </template>

  <script setup>
  import { ref, computed, onMounted } from 'vue';


  const currentIndex = ref(0);

  const currentImage = computed(() => images[currentIndex.value]);

  function nextImage() {
    currentIndex.value = (currentIndex.value + 1) % images.length;
  }

  function prevImage() {
    currentIndex.value = (currentIndex.value - 1 + images.length) % images.length;
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

  onMounted(startAutoplay);
  </script>

  <style scoped>
  .image-slider {
    position: relative;
    max-width: 100%;
    overflow: hidden;
    margin: 0 auto;
  }

  .fade-enter-active,
  .fade-leave-active {
    transition: opacity 0.5s;
  }

  .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
    opacity: 0;
  }

  .controls {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
  }

  button {
    padding: 8px 12px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  button:hover {
    background-color: #0056b3;
  }
  </style>
