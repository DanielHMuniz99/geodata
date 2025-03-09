<template>
  <v-container>
    <DoughnutChart v-if="rankingData" :chartData="rankingData"/>
  </v-container>
</template>

<script setup>
import { ref, inject, onMounted } from "vue";
import axios from "axios";
import { DoughnutChart } from "vue-chart-3";
import { Chart, registerables } from "chart.js";

Chart.register(...registerables);

const config = inject("config");
const rankingData = ref(null);

const generateColors = (count) => {
  const colors = ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF"];
  return colors.slice(0, count);
};

const searchRanking = async () => {
  try {
    const response = await axios.get(`${config.apiUrl}/census/ranking`);
    const data = response.data[0]?.res || [];
    const topNames = data.slice(0, 20);
    
    rankingData.value = {
      labels: topNames.map((item) => item.nome),
      datasets: [
        {
          data: topNames.map((item) => item.frequencia),
          backgroundColor: generateColors(topNames.length),
        },
      ],
    };
  } catch (error) {
    console.error("Erro ao buscar ranking:", error);
  }
};

onMounted(searchRanking);
</script>
