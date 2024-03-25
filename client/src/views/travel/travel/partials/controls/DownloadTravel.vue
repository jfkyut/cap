<script setup>

import DropdownButton from '@/components/dropdowns/dropdown/DropdownButton.vue';
import { useTravelStore } from '@/stores/travel';
import { storeToRefs } from 'pinia';
import { ref } from 'vue';
import html2pdf from 'html2pdf.js';

const { travel } = storeToRefs(useTravelStore())

const downloadLinkRef = ref(null);

const download = () => {
  const travelHtml = document.querySelector('#pdf-this');

  html2pdf(travelHtml, {
    margin: 10,
    filename: `${travel.value.title}.pdf`,
    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
  }).save();
}

</script>

<template>
  <DropdownButton @click="download">
    <i class="fa fa-download mr-3"></i>
    <span>Download PDF</span>
  </DropdownButton>
  <a class="sr-only" ref="downloadLinkRef"></a>
</template>