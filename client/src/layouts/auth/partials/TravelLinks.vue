<script setup>

import NavDropdownTrigger from '@/components/dropdowns/navDropdown/NavDropdownTrigger.vue';
import NavDropdownLink from '@/components/dropdowns/navDropdown/NavDropdownLink.vue';
import { ref, watch } from 'vue';

const isTravelDropdownLinkShow = ref(JSON.parse(sessionStorage.getItem('travel-dropdown')) || false);

const toggleChatDropdown = () => {
  (!isTravelDropdownLinkShow.value)
    ? isTravelDropdownLinkShow.value = true
    : isTravelDropdownLinkShow.value = false
}

watch(isTravelDropdownLinkShow, (chatDropdownState) => {
  sessionStorage.setItem('travel-dropdown', JSON.stringify(chatDropdownState));
})

</script>

<template>
  <NavDropdownTrigger 
    button-text="Travels" 
    icon-class="fa fa-globe" 
    @toggle-dropdown="toggleChatDropdown" 
    :is-links-show="isTravelDropdownLinkShow">
    <NavDropdownLink 
      to="/travel/create" 
      @click="closeOnSmallScreen" 
      title="New Chat"
      class="bg-gray-800">
      <div class=" flex items-center justify-between">
        <span>New travel</span>
        <i class="fa fa-plus"></i>
      </div>
    </NavDropdownLink>
  </NavDropdownTrigger>
</template>