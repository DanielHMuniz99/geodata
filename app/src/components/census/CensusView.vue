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
  import { ref, watch, onMounted } from 'vue';
  import { useI18n } from 'vue-i18n';
  import NameSearch from './NameSearch.vue';
  import RankingChart from './RankingChart.vue';

  const { t } = useI18n();
  const tab = ref(1);

  const hashToTab = {
    '#by-name': 1,
    '#ranking': 2,
  };

  const tabToHash = {
    1: '#by-name',
    2: '#ranking',
  };

  onMounted(() => {
    const hash = window.location.hash;
    if (hash && hashToTab[hash]) {
      tab.value = hashToTab[hash];
    }
  });

  watch(tab, (newTab) => {
    const newHash = tabToHash[newTab];
    if (newHash) {
      window.location.hash = newHash;
    }
  });

</script>