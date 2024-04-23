<script setup>

import { RouterLink } from 'vue-router';

</script>

<template>
  <div class="flex flex-col lg:flex-row items-center justify-center min-h-[88vh] gap-4">
    <RouterLink to="/chat" class="w-full space-y-6 max-w-sm bg-white border dark:border-gray-700 duration-200 dark:hover:border-blue-600 duration dark:bg-gray-800 p-2 md:p-4 lg:p-6 rounded-lg shadow-lg min-h-[30vh] lg:min-h-[30vh]">
      <header>
        <h2 class="text-black dark:text-white text-xl font-medium">Chatbot</h2>
      </header>
      <p>
        Interact with our chatbot and ask questions about San Vicente, Palawan.
      </p>
    </RouterLink>
    <RouterLink to="/travel/create" class="w-full space-y-6 max-w-sm bg-white border dark:border-gray-700 duration-200 dark:hover:border-blue-600 duration dark:bg-gray-800 p-2 md:p-4 lg:p-6 rounded-lg shadow-lg min-h-[30vh] lg:min-h-[30vh]">
      <header>
        <h2 class="text-black dark:text-white text-xl font-medium">Travel Itinerary Generator</h2>
      </header>
      <p>
        Get help with our AI Travel Itinerary Generator and plan your trip here in San Vicente.
      </p>
    </RouterLink>
  </div>
</template>