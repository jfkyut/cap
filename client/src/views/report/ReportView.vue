<script setup>

import DailyChart from '@/views/report/partials/DailyChart.vue';
import UsageChart from '@/views/report/partials/UsageChart.vue';

</script>

<template>
  <div>
    <div class="flex flex-col md:flex-row justify-center gap-4">
      <DailyChart />
      <UsageChart />
    </div>
  </div>
</template>