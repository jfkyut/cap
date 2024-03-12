<script setup>

import { useSpeechRecognition } from '@/utilities/speech';
import { useChatStore } from '@/stores/chat';
import { storeToRefs } from 'pinia';
import { watch } from 'vue';

const { message } = storeToRefs(useChatStore());
const { isSupported, transcript, listen } = useSpeechRecognition();

watch(transcript, (transcript) => {
  message.value = transcript
})

</script>

<template>
  <button 
    @click="listen" 
    type="button" 
    class="inline-flex mb-1 justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
    <i class="fa fa-microphone w-5 h-5"></i>
    <span class="sr-only">Microphone</span>
  </button>
  {{ transcript + " <- this here is transcript" }}
</template>