<template>
  <v-card>
    <v-tabs v-model="tab" align-tabs="left" color="rgba(19,84,122,.8)">
      <v-tab :value="1">Por nome</v-tab>
      <v-tab :value="2">Ranking</v-tab>
    </v-tabs>

    <v-tabs-window v-model="tab">
      <v-tabs-window-item :value="1">
        <NameSearch />
      </v-tabs-window-item>

      <v-tabs-window-item :value="2">
        <RankingChart />
      </v-tabs-window-item>
    </v-tabs-window>
  </v-card>
</template>

<script setup>
import { ref } from "vue";
import NameSearch from "./NameSearch.vue";
import RankingChart from "./census/RankingChart.vue";

const tab = ref(null);
</script>
