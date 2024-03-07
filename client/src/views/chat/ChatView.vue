<script setup>

import ChatForm from '@/views/chat/partials/ChatForm.vue';
import TemporaryMessages from '@/views/chat/partials/TemporaryMessages.vue';
import Messages from '@/views/chat/partials/Messages.vue';
import { computed, onMounted, watch, ref } from 'vue';
import { useChatStore } from '@/stores/chat';
import { useRoute } from 'vue-router';
import { storeToRefs } from 'pinia';

const route = useRoute();
const { getChatMessages } = useChatStore();
const { chat, temporaryMessage } = storeToRefs(useChatStore());

const chatId = computed(() => route.params.id);

const chatContainerRef = ref(null);

const setChatViewHeight = async () => {
  setTimeout(() => {
    chatContainerRef.value.scrollTop = chatContainerRef.value.scrollHeight
  }, 50)
}

onMounted(() => {
  setTimeout(() => {
    (route.name === 'chat') && getChatMessages(chatId.value)
  }, 50)
});

const messages = computed(() => {
  const chatResult = chat.value.find((chat) => chat.id === chatId.value);

  return chatResult?.messages;
})

watch([temporaryMessage, messages], () => {
  setChatViewHeight()
})

watch(chatId, (id) => {
  getChatMessages(id)
})

</script>

<template>
  <div class="relative min-h-[88vh]">
    <div class="w-full text-black relative h-[80vh] overflow-y-auto space-y-6 py-6" ref="chatContainerRef">
      <Messages :messages="messages" />
      <TemporaryMessages />
    </div>
    <div class="w-full absolute bottom-4">
      <ChatForm @submitted="setChatViewHeight" />
    </div>
  </div>
</template>