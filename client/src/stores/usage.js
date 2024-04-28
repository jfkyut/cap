import { defineStore } from "pinia";
import { ref, watch } from "vue";

export const useUsageStore = defineStore('usage', () => {

  const chatTime = ref(localStorage.getItem('chat-time') || 0);
  const chatInterval = ref(null);

  const travelTime = ref(localStorage.getItem('travel-time') || 0);
  const travelInterval = ref(null);

  watch(chatTime, (chatTime) => {
    localStorage.setItem('chat-time', chatTime)
  })

  watch(travelTime, (travelTime) => {
    localStorage.setItem('travel-time', travelTime)
  })

  const startChatTimeCount = () => {
    chatInterval.value = setInterval(() => {
      chatTime.value++;
    }, 1000)
  }

  const stopChatTimeCouont = () => {
    clearInterval(chatInterval.value)
  }

  const startTravelTimeCount = () => {
    travelInterval.value = setInterval(() => {
      travelTime.value++;
    }, 1000)
  }

  const stopTravelTimeCount = () => {
    clearInterval(travelInterval.value);
  }

  return {
    chatTime,
    travelTime,
    startChatTimeCount,
    stopChatTimeCouont,
    startTravelTimeCount,
    stopTravelTimeCount
  }
});