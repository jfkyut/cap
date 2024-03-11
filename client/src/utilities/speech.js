import { computed, ref } from 'vue';

export const useSpeechSynthesis = () => {

  const synthesis = ref(window.speechSynthesis);

  const isSpeaking = computed(() => synthesis.value.speaking);

  const isSupported = computed(() => {
    return (!synthesis.value) 
            ? false 
            : true
  })

  const speak = (text) => {
    (!isSpeaking.value) && synthesis.value.speak(new SpeechSynthesisUtterance(text));

    console.log(isSpeaking.value);
  }

  const stop = () => synthesis.value.cancel()

  return {
    isSupported,
    isSpeaking,
    speak,
    stop
  }
}