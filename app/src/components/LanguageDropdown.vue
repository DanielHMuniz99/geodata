<template>
  <v-menu offset-y>
    <template v-slot:activator="{ props }">
      <v-btn icon v-bind="props">
        <v-avatar size="32">
          <v-img :src="currentFlag" alt="Language" />
        </v-avatar>
      </v-btn>
    </template>
    <v-list>
      <v-list-item v-for="lang in languages" :key="lang.code" @click="changeLanguage(lang)">
        <v-list-item-avatar>
          <v-img :src="lang.flag" alt="Flag" />
        </v-list-item-avatar>
        <v-list-item-title>{{ lang.label }}</v-list-item-title>
      </v-list-item>
    </v-list>
  </v-menu>
</template>

<script setup>
import { ref } from 'vue';
import { useI18n } from 'vue-i18n';

const i18n = useI18n({ useScope: 'global' });

const languages = ref([
  { code: 'pt', label: 'Português', flag: '/brazil.png' },
  { code: 'en', label: 'English', flag: '/usa.png' }
]);

const currentLanguage = ref(i18n.locale.value);

const currentFlag = ref(languages.value.find(lang => lang.code === currentLanguage.value).flag);

const changeLanguage = (lang) => {
  i18n.locale.value = lang.code;
  localStorage.locale = lang.code;
  currentLanguage.value = lang.code;
  currentFlag.value = lang.flag;
};
</script>
