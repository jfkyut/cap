<script setup>

import { RouterLink } from 'vue-router';

defineProps({ to: String, class: String })

</script>

<template>
  <li>
    <RouterLink 
      :to="to" 
      :class="class"
      active-class="bg-gray-700" 
      class="flex items-center w-full p-2 transition duration-75 rounded-lg group text-white hover:bg-gray-700">
      <slot />
    </RouterLink>
  </li>
</template>