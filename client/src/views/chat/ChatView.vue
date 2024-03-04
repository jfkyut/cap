<script setup>

import ChatForm from '@/views/chat/partials/ChatForm.vue';
import TemporaryMessages from '@/views/chat/partials/TemporaryMessages.vue';
import Messages from '@/views/chat/partials/Messages.vue';

</script>

<template>
  <div class="relative min-h-[88vh]">
    <div class="w-full text-black relative h-[80vh] overflow-y-auto">
      <Messages />
      <TemporaryMessages />
    </div>
    <div class="w-full absolute bottom-4">
      <ChatForm />
    </div>
  </div>
</template>