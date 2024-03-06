import { defineStore } from "pinia";
import { ref } from "vue";

export const useChatStore = defineStore('chat', () => {

  const message = ref(null);

  const temporaryMessage = ref(null);

  const chat = ref([]);

  const getMessages = (id) => {
    chat.value.forEach((chat) => {
      if (chat.id === id) {
        chat.messages.length <= 0
          ? 
          : null
      }

    });
  }

  const addChat = (newChat) => {
    (newChat) && chat.value.push(newChat)
  }

  const addMessage = (id, messages) => {
    chat.value.forEach((chat) => {
      (chat.id === id) && chat.messages.push(messages);
    });
  } 

  return { 
    message, 
    temporaryMessage,
    chat, 
    addChat,
    addMessage
  }
})