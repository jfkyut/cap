import { defineStore } from "pinia";
import { ref } from "vue";

export const useChatStore = defineStore('chat', () => {

  const message = ref(null);

  const temporaryMessage = ref(null);

  return { message, temporaryMessage }
})