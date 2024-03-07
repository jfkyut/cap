import { defineStore } from "pinia";
import { ref } from "vue";
import { useChatService } from "@/services/chatService";

const { getMessages } = useChatService();

export const useChatStore = defineStore('chat', () => {

  const message = ref(null);

  const messages = ref(null);

  const temporaryMessage = ref(null);

  const chat = ref([]);

  const getChatMessages = (id) => {
    chat.value.forEach( async (chat) => {
      if (chat.id === id && chat.messages === undefined) {
        const { data } = await getMessages(id);
        
        chat.messages = data.messages;
      }
    });
  }

  const addChat = (newChat) => {
    (newChat) && chat.value.unshift(newChat)
  }

  const addMessage = (id, messages) => {
    chat.value.forEach((chat) => {
      (chat.id === id) && chat.messages.push(messages);
    });
  } 

  return { 
    message, 
    messages,
    temporaryMessage,
    chat, 
    addChat,
    addMessage,
    getChatMessages
  }
})