<script setup>

import { onMounted, ref, watch } from 'vue';
import ApexCharts from 'apexcharts';
import { useUsageService } from '@/services/usageService';

const { getDailyUsageReportRequest } = useUsageService();

const options = ref(null);
const chart = ref(null);
const showDropdown = ref(false);

const dates = ref({
  start: null,
  end: null
});

const toggleDropdown = () => {
  (showDropdown.value) 
    ? showDropdown.value = false
    : showDropdown.value = true
}

const days = ref(null);

const updateOption = (dates, series) => {
  options.value = {
    // set the labels option to true to show the labels on the X and Y axis
    xaxis: {
      show: true,
      categories: dates,
      labels: {
        show: true,
        style: {
          fontFamily: "Inter, sans-serif",
          cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
        }
      },
      axisBorder: {
        show: false,
      },
      axisTicks: {
        show: false,
      },
    },
    yaxis: {
      show: true,
      labels: {
        show: true,
        style: {
          fontFamily: "Inter, sans-serif",
          cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
        },
        formatter: function (value) {
          return value + ' min';
        }
      }
    },
    series: series,
    chart: {
      sparkline: {
        enabled: false
      },
      height: "100%",
      width: "100%",
      type: "area",
      fontFamily: "Inter, sans-serif",
      dropShadow: {
        enabled: false,
      },
      toolbar: {
        show: false,
      },
    },
    tooltip: {
      enabled: true,
      x: {
        show: false,
      },
    },
    fill: {
      type: "gradient",
      gradient: {
        opacityFrom: 0.55,
        opacityTo: 0,
        shade: "#1C64F2",
        gradientToColors: ["#1C64F2"],
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 6,
    },
    legend: {
      show: false
    },
    grid: {
      show: false,
    },
  }
}

const setDays = (num) => {
  days.value = num;

  toggleDropdown();
}

onMounted( async () => {

  days.value = 7;

  const { data } = await getDailyUsageReportRequest({ days: days.value })

  updateOption(data.dates, data.series);

  dates.value.start = data.start_date;
  dates.value.end = data.end_date;

  if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined') {
    chart.value = new ApexCharts(document.getElementById("labels-chart"), options.value);
    chart.value.render();
  }
})

watch(days, async (days) => {

  const { data } = await getDailyUsageReportRequest({ days: days })

  updateOption(data.dates, data.series);

  dates.value.start = data.start_date;
  dates.value.end = data.end_date;

  chart.value.updateOptions(options.value);
})

</script>

<template>
  <div>

    
    <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800">
      <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
        <div>
          <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Daily Usage</h5>
        </div>
      </div>
      <div id="labels-chart" class="px-2.5"></div>
      <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5 p-4 md:p-6 pt-0 md:pt-0">
        <div class="flex justify-between items-center pt-5 relative">
          <!-- Button -->
          <button
            @click="toggleDropdown"
            id="dropdownDefaultButton"
            data-dropdown-toggle="lastDaysdropdown"
            data-dropdown-placement="bottom"
            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
            type="button">
            Last {{ days }} days
            <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div 
            id="lastDaysdropdown" 
            :class="[!showDropdown && 'hidden']"
            class="z-10 absolute bottom-8 -left-8 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                  <button @click="setDays(7)" class="text-start w-full block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</button>
                </li>
                <li>
                  <button @click="setDays(30)" class="text-start w-full block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</button>
                </li>
                <li>
                  <button @click="setDays(90)" class="text-start w-full block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</button>
                </li>
              </ul>
          </div>
          
          <div class="inline-flex items-center text-blue-700 dark:text-blue-600 font-medium hover:underline">
            {{ dates.start }} - {{ dates.end }}
          </div>
        </div>
      </div>
    </div>


  </div>
</template>