<template>
  <v-card>
    <v-tabs v-model="tab" align-tabs="left" color="rgba(19,84,122,.8)">
      <v-tab :value="1">{{ t('comparation') }}</v-tab>
    </v-tabs>

    <v-tabs-window v-model="tab">
      <v-tabs-window-item :value="1">
        <Comparation/>
      </v-tabs-window-item>
    </v-tabs-window>
  </v-card>
</template>

<script setup>
import { ref } from "vue";
import Comparation from './Comparation.vue';
import { useI18n } from 'vue-i18n';

const { t, locale } = useI18n();
const tab = ref(null);
</script>
