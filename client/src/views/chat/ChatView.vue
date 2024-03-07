<script setup>

import ChatForm from '@/views/chat/partials/ChatForm.vue';
import TemporaryMessages from '@/views/chat/partials/TemporaryMessages.vue';
import Messages from '@/views/chat/partials/Messages.vue';
import { computed, onMounted, watch } from 'vue';
import { useChatStore } from '@/stores/chat';
import { useRoute } from 'vue-router';
import { storeToRefs } from 'pinia';

const route = useRoute();
const { getChatMessages } = useChatStore();
const { chat } = storeToRefs(useChatStore());

const chatId = computed(() => route.params.id);

onMounted( () => {
  setTimeout(() => {
    (route.name === 'chat') && getChatMessages(chatId.value)
  }, 100)
});

watch(chatId, (id) => {
  getChatMessages(id)
})

const messages = computed(() => {
  const chatResult = chat.value.find((chat) => chat.id === chatId.value);

  return chatResult?.messages;
})

</script>

<template>
  <div class="relative min-h-[88vh]">
    <div class="w-full text-black relative h-[80vh] overflow-y-auto">
      <Messages :messages="messages" />
      <TemporaryMessages />
    </div>
    <div class="w-full absolute bottom-4">
      <ChatForm />
    </div>
  </div>
</template>