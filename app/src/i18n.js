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
    quality_life_comparison: 'Quality of Life Comparison',
    country_origin: 'Country of origin',
    country_comparison: 'Country of comparison',
    currency: 'Currency',
    your_salary_in: 'Your monthly salary (in {currency})',
    compare: "Compare",
    with_your_salary: "With a salary of ${salary} in {originCountry}, you are richer than {result}% of the population of {targetCountry}",
    states_list: "List of States",
    name: "Name",
    abbreviation: "Abbreviation",
    region: "Region",
    loading_states: "Loading states",
    items_per_page: "Items per page",
    of: "of",
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
    quality_life_comparison: 'Comparação de qualidade de vida',
    country_origin: 'País de origem',
    country_comparison: 'País de comparação',
    currency: 'Moeda',
    your_salary_in: 'Seu salário mensal (em {currency})',
    compare: "Compare",
    with_your_salary: "Com um salário de ${salary} {originCountry}, você é mais rico que {result}% da população {targetCountry}",
    states_list: "Lista de Estados",
    name: "Nome",
    abbreviation: "Sigla",
    region: "Região",
    loading_states: "Carregando estados",
    items_per_page: "Itens por página",
    of: "de",
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
