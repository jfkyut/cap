<script setup>

import ExtraButton from '../buttons/ExtraButton.vue';

</script>

<template>
  <div class="flex items-start gap-2.5">
    <div class="flex flex-col gap-1 w-fit max-w-full">
      <div class="flex items-center space-x-2 rtl:space-x-reverse ">
        <span class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie Green</span>
      </div>
      <div class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
        <p class="text-sm font-normal text-gray-900 dark:text-white"> That's awesome. I think our users will really appreciate the improvements. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus voluptatem quae unde, molestiae sequi impedit quis tenetur laudantium magni alias doloremque sunt accusantium provident saepe rerum minus laborum blanditiis iste?</p>
        <div class="mt-3 flex gap-1 justify-end">
          <ExtraButton>
            <i class="fa fa-play"></i>
          </ExtraButton>
          <ExtraButton>
            <i class="fa fa-clipboard"></i>
          </ExtraButton>
        </div>
      </div>
    </div>
  </div>
</template>