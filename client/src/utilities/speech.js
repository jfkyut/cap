import { computed, ref } from 'vue';

export const useSpeechSynthesis = () => {

  const synthesis = window.speechSynthesis;

  const isSpeaking = ref(false);

  const isSupported = computed(() => {
    return (!synthesis) 
            ? false 
            : true
  })

  const speak = (text) => {
    if (!isSpeaking.value) {
      const utterance = new SpeechSynthesisUtterance(text);

      utterance.onstart = () => isSpeaking.value = true;
      utterance.onend = () => isSpeaking.value = false;

      synthesis.speak(utterance);
    }
  }

  const stop = () => {
    synthesis.cancel()
    isSpeaking.value = false; 
  }

  return {
    isSupported,
    isSpeaking,
    speak,
    stop
  }
}

export const useSpeechRecognition = () => {
  
  const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition) || false;

  recognition.lang = "en-US";
  recognition.interimResults = true;
  recognition.continuous = true;

  const isSupported = computed(() => {
    return (!recognition) 
            ? false 
            : true
  })

  const isListening = ref(false);
  const transcript = ref(null);

  const listen = () => {
    recognition.start();
    isListening.value = true
  }

  const cancel = () => {
    recognition.cancel();
    isListening.value = false;
  }

  const stop = () => {
    recognition.stop();
    isListening.value = false;
  }

  recognition.onresult = (e) => {
    transcript.value = e.results[0][0].transcript;
  }

  recognition.onerror = (e) => {
    console.error("Speech recognition error:", e.error);
  }  

  recognition.onend = () => {
    if (isListening.value) {
      listen()
    }
  }

  return {
    isSupported,
    transcript,
    isListening,
    listen,
    cancel,
    stop
  }
}