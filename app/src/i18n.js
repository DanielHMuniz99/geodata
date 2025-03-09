import { createI18n } from 'vue-i18n';

const messages = {
  en: {
    search: "Search",
    search_name: "Search name",
    by_name: "By name",
    ranking: "Ranking",
  },
  pt: {
    search: "Pesquisar",
    search_name: "Pesquisar nome",
    by_name: "Por nome",
    ranking: "Ranking",
  }
};

const i18n = createI18n({
  legacy: false,
  locale: 'en',
  fallbackLocale: 'en',
  messages
});

export default i18n;
