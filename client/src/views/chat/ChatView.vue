<script setup>

import ChatForm from '@/views/chat/partials/ChatForm.vue';
import TemporaryMessages from '@/views/chat/partials/TemporaryMessages.vue';
import Messages from '@/views/chat/partials/Messages.vue';
import { computed, onMounted, watch, ref, onUnmounted } from 'vue';
import { useChatStore } from '@/stores/chat';
import { useRoute } from 'vue-router';
import { storeToRefs } from 'pinia';
import EmptyMessagePlaceholder from './partials/EmptyMessagePlaceholder.vue';
import { useUsageStore } from '@/stores/usage';
import { useUsageService } from '@/services/usageService';

const { addNewUsageRequest } = useUsageService()

const { chatTime } = storeToRefs(useUsageStore());
const { startChatTimeCount, stopChatTimeCouont } = useUsageStore();

const route = useRoute();
const { getChatMessages } = useChatStore();
const { temporaryMessage, chat, activeChatId } = storeToRefs(useChatStore());
const chatId = computed(() => route.params.id);

const chatContainerRef = ref(null);

const setChatViewHeight = async () => {
  if (chatContainerRef.value) {
    setTimeout(() => {
      chatContainerRef.value.scrollTop = chatContainerRef.value.scrollHeight
    }, 100)
  }
}

onMounted( () => {
  setTimeout(() => {
    activeChatId.value = chatId.value;
    (route.name === 'chat') && getChatMessages(chatId.value)
  }, 500)

  startChatTimeCount();
});

onUnmounted(() => {
  stopChatTimeCouont()
})

const updateChatUsage = async () => {
  chatTime.value = 0;
  
  await addNewUsageRequest({
    name: 'chatbot'
  })
}

watch(chatTime, (chatTime) => {
  if (chatTime === 60) {
    updateChatUsage();
  }
})

watch([temporaryMessage, chatContainerRef, chatId], () => {
  setChatViewHeight()
})

watch(chatId, (id) => {
  getChatMessages(id)
  activeChatId.value = id
  document.title = `${chat.value?.title || 'Chat'} | VTASVP`;
})

</script>

<template>
  <div class="relative min-h-[88vh]">
    <EmptyMessagePlaceholder v-if="!chat?.messages && !temporaryMessage" />
    <div 
      v-else
      class="w-full text-black relative h-[79vh] overflow-y-auto space-y-6 py-6 scroll-smooth" 
      ref="chatContainerRef">
      <Messages :messages="chat?.messages" />
      <TemporaryMessages />
    </div>
    <div class="w-full absolute bottom-4">
      <ChatForm @submitted="setChatViewHeight" />
    </div>
  </div>
</template>