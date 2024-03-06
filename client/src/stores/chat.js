import { defineStore } from "pinia";
import { ref } from "vue";
import { useChatService } from "@/services/chatService";

const { getMessages } = useChatService();

export const useChatStore = defineStore('chat', () => {

  const message = ref(null);

  const temporaryMessage = ref(null);

  const chat = ref([]);

  const getMessages = (id) => {
    console.log(id);
    chat.value.forEach((chat) => {
      console.log(chat.id);
      (chat.id === id) && console.log("check")
    })
    
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
    addMessage,
    getMessages
  }
})