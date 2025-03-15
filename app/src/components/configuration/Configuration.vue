<template>
    <v-card>
      <v-tabs v-model="tab" align-tabs="left" color="rgba(19,84,122,.8)">
        <v-tab :value="1">{{ t('integrations') }}</v-tab>
      </v-tabs>
  
      <v-tabs-window v-model="tab">
        <v-tabs-window-item :value="1">
          Integrations/>
        </v-tabs-window-item>
      </v-tabs-window>
    </v-card>
  </template>
  
  <script setup>
  import { ref } from "vue";
//  import Integrations from './Integrations.vue';
  import { useI18n } from 'vue-i18n';
  
  const { t, locale } = useI18n();
  const tab = ref(null);
  </script>
  