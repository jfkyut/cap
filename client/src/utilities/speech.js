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
  
  const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition || false);

  recognition.lang = "en-US";
  recognition.interimResults = true;

  const isSupported = computed(() => {
    return (!recognition) 
            ? false 
            : true
  })

  const transcript = ref(null);

  const listen = () => {
    recognition.start()
  }

  const cancel = () => {
    recognition.cancel();
  }

  const stop = () => {
    recognition.stop();
  }

  recognition.onresult = (e) => {
    console.log("Speech recognition result:", e.results);
    transcript.value = e.results[0][0].transcript;
  }

  recognition.onerror = (e) => {
    console.error("Speech recognition error:", e.error);
  }  

  return {
    isSupported,
    transcript,
    listen,
    cancel,
    stop
  }
}