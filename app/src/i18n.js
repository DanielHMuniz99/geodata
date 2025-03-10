import { createI18n } from 'vue-i18n';

const messages = {
  en: {
    search: "Search",
    search_name: "Search name",
    by_name: "By name",
    ranking: "Ranking",
    enter_valid_name: "Enter a valid name",
    name_cannot_contain_numbers: "The name cannot contain numbers",
    portuguese: "Portuguese",
    english: "English",
  },
  pt: {
    search: "Pesquisar",
    search_name: "Pesquisar nome",
    by_name: "Por nome",
    ranking: "Ranking",
    enter_valid_name: "Insira um nome válido",
    name_cannot_contain_numbers: "O nome não pode conter números",
    portuguese: "Português",
    english: "Inglês",
  }
};

let lang = 'en';
if (localStorage.locale) {
  lang = localStorage.locale;
}

const i18n = createI18n({
  legacy: false,
  locale: lang,
  fallbackLocale: lang,
  messages
});

export default i18n;
