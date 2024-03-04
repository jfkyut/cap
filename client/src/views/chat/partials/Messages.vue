<script setup>
import UserBubble from '@/components/chatBubbles/UserBubble.vue';
import BotBubble from '@/components/chatBubbles/BotBubble.vue';

</script>

<template>
  <div class="w-full max-w-4xl mx-auto space-y-6 mb-6">
    <UserBubble message="yow" />
    <BotBubble message="yo ka rin." />
  </div>
</template>