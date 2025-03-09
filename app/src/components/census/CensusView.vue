<template>
  <v-card>
    <v-tabs v-model="tab" align-tabs="left" color="rgba(19,84,122,.8)">
      <v-tab :value="1">{{ t('by_name') }}</v-tab>
      <v-tab :value="2">{{ t('ranking') }}</v-tab>
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
import RankingChart from "./RankingChart.vue";
import { useI18n } from 'vue-i18n';

const { t, locale } = useI18n();
const tab = ref(null);
</script>
