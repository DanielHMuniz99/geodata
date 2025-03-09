import { createI18n } from 'vue-i18n';

const messages = {
  en: {
    search: "Search",
  },
  pt: {
    search: "Pesquisar"
  }
};

const i18n = createI18n({
  legacy: false,
  locale: 'en',
  fallbackLocale: 'en',
  messages
});

export default i18n;
