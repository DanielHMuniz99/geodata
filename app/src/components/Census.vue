<template>
  <v-card>
    <v-container>
      <v-row>
        <v-col cols="12" md="9" sm="9">
          <v-text-field v-model="name" label="Pesquisar nome"></v-text-field>
        </v-col>
        <v-col cols="12" md="3" sm="3">
          <v-btn size="x-large" @click="searchName()"> Pesquisar </v-btn>
        </v-col>
      </v-row>
    </v-container>
    <LineChart v-if="chartData" :chartData="chartData" />
  </v-card>
</template>

<script setup>
import { ref, inject } from "vue";
import axios from "axios";
import { LineChart } from "vue-chart-3";
import { Chart, registerables } from "chart.js";

Chart.register(...registerables);

const config = inject("config");
const name = ref("");
const chartData = ref(null); // Inicializa como null

const searchName = async () => {
  try {
    const response = await axios.get(`${config.apiUrl}/census/names/${name.value}`);
    const data = response.data[0]?.res || [];

    chartData.value = {
      labels: data.map((item) => item.periodo.replace(/[\[\]]/g, "").split(",")[0]), // Extrai o ano inicial do período
      datasets: [
        {
          label: name.value,
          data: data.map((item) => item.frequencia),
          borderColor: "rgba(19,84,122,.8)",
          fill: false,
        },
      ],
    };
  } catch (error) {
    console.error("Erro ao buscar nome:", error);
  }
};
</script>
