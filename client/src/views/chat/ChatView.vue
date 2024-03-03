<script setup>

import BotBubble from '@/components/chatBubbles/BotBubble.vue';
import ChatForm from '@/views/chat/partials/ChatForm.vue';
import UserBubble from '@/components/chatBubbles/UserBubble.vue';

</script>

<template>
  <div class="relative min-h-[88vh]">
    <div class="w-full text-black relative h-[80vh] overflow-y-auto">
      <div class="w-full max-w-4xl mx-auto space-y-6 mb-6">
        <UserBubble />
        <BotBubble />
      </div>
      <div class="w-full max-w-4xl mx-auto space-y-6 mb-6">
        <UserBubble />
        <BotBubble />
      </div>
      <div class="w-full max-w-4xl mx-auto space-y-6 mb-6">
        <UserBubble />
        <BotBubble />
      </div>
      <div class="w-full max-w-4xl mx-auto space-y-6 mb-6">
        <UserBubble />
        <BotBubble />
      </div>
    </div>
    <div class="w-full absolute bottom-4">
      <ChatForm />
    </div>
  </div>
</template>