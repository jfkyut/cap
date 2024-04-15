<script setup>

import DailyChart from '@/views/report/partials/DailyChart.vue';
import UsageChart from '@/views/report/partials/UsageChart.vue';

</script>

<template>
  <div>
    this is report page

    <div class="flex justify-center gap-4">
      <DailyChart />
      <UsageChart />
    </div>
  </div>
</template>