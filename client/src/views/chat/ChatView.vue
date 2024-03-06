<script setup>

import ChatForm from '@/views/chat/partials/ChatForm.vue';
import TemporaryMessages from '@/views/chat/partials/TemporaryMessages.vue';
import Messages from '@/views/chat/partials/Messages.vue';
import { onMounted } from 'vue';
import { useChatStore } from '@/stores/chat';
import { useRoute } from 'vue-router';

const route = useRoute();
const { getMessages } = useChatStore();

onMounted( () => {
  (route.name === 'chat') && getMessages(route.params.id);
})

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