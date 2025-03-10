<template>
  <v-container>
    <v-row>
      <v-col cols="12" md="9" sm="9">
        <v-text-field v-model="name" :label="t('search_name')"></v-text-field>
      </v-col>
      <v-col cols="12" md="3" sm="3">
        <v-btn size="x-large" @click="searchName()"> {{ t('search') }} </v-btn>
      </v-col>
    </v-row>
    <LineChart v-if="chartData" :chartData="chartData" />
  </v-container>
</template>

<script setup>
import { ref, inject } from "vue";
import axios from "axios";
import { LineChart } from "vue-chart-3";
import { Chart, registerables } from "chart.js";
import { useI18n } from 'vue-i18n';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

Chart.register(...registerables);

const { t, locale } = useI18n();
const config = inject("config");
const name = ref("");
const chartData = ref(null);

const notify = (text) => {
  toast(text, {
    "theme": "colored",
    "type": "error",
    "dangerouslyHTMLString": true
  })
}

const validate = async () => {

  if (!name.value) {
    notify(t('enter_valid_name'));
    return false;
  }

  if (!(/[^0-9]/.test(name.value))) {
    notify(t('name_cannot_contain_numbers'));
    return false;
  }

  return true;
}

const searchName = async () => {

  if (!(await validate())) {
    return false;
  }

  try {
    const response = await axios.get(`${config.apiUrl}/census/names/${name.value}`);
    const data = response.data[0]?.res || [];

    chartData.value = {
      labels: data.map((item) => item.periodo.replace(/[\[\]]/g, "").split(",")[0]),
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
