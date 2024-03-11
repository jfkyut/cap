<script setup>

import ChatForm from '@/views/chat/partials/ChatForm.vue';
import TemporaryMessages from '@/views/chat/partials/TemporaryMessages.vue';
import Messages from '@/views/chat/partials/Messages.vue';
import { computed, onMounted, watch, ref } from 'vue';
import { useChatStore } from '@/stores/chat';
import { useRoute } from 'vue-router';
import { storeToRefs } from 'pinia';
import EmptyMessagePlaceholder from './partials/EmptyMessagePlaceholder.vue';

const route = useRoute();
const { getChatMessages } = useChatStore();
const { chats, temporaryMessage, chat } = storeToRefs(useChatStore());

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

const currentChat = computed(() => {
  return chats.value.find((chat) => chat.id === chatId.value);
})

watch([temporaryMessage, currentChat], () => {
  setChatViewHeight()
})

watch(currentChat, (current) => {
  chat.value = current;
})

watch(chatId, (id) => {
  getChatMessages(id)
  document.title = `${currentChat.value?.title || 'Chat'} | VTASVP`;
})

</script>

<template>
  <div class="relative min-h-[88vh]">
    <EmptyMessagePlaceholder v-if="!currentChat?.messages && !temporaryMessage" />
    <div 
      v-else
      class="w-full text-black relative h-[79vh] overflow-y-auto space-y-6 py-6 scroll-smooth" 
      ref="chatContainerRef">
      <Messages :messages="currentChat?.messages" />
      <TemporaryMessages />
    </div>
    <div class="w-full absolute bottom-4">
      <ChatForm @submitted="setChatViewHeight" />
    </div>
  </div>
</template>