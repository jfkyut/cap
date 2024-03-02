<script setup>

import ChatForm from '@/views/chat/partials/ChatForm.vue';

</script>

<template>
  <div class="relative min-h-[88vh]">
    <div class="w-full text-black relative h-[80vh] overflow-y-auto">
      <div class="p-10 my-5"></div>
    </div>
    <div class="w-full absolute bottom-4">
      <ChatForm />
    </div>
  </div>
</template>