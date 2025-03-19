<template>
    <v-container>
      <v-row justify="center">
        <v-col cols="12" md="12">
          <v-card-title class="text-h6">{{ $t('quality_life_comparison') }}</v-card-title>
            <v-card-text>
              <v-form>
                <v-row>
                  <v-col cols="12" md="6">
                    <v-select
                      v-model="originCountry"
                      :items="countries"
                      item-title="country"
                      item-value="code"
                      :label="$t('country_origin')"
                      return-object
                    >
                      <template v-slot:selection="{ item }">
                        <v-avatar size="24" class="mr-2">
                          <img :src="getFlagUrl(item.raw.code)" :alt="item.raw.country" />
                        </v-avatar>
                        {{ item.raw.country }}
                      </template>
                      <template v-slot:item="{ props, item }">
                        <v-list-item v-bind="props">
                          <template v-slot:prepend>
                            <v-avatar size="24">
                              <img :src="getFlagUrl(item.raw.code)" :alt="item.raw.country" />
                            </v-avatar>
                          </template>
                        </v-list-item>
                      </template>
                    </v-select>
                  </v-col>
                  <v-col cols="12" md="6">
                    <v-select
                      v-model="targetCountry"
                      :items="countries"
                      item-title="country"
                      item-value="code"
                      :label="$t('country_comparison')"
                      return-object
                    >
                      <template v-slot:selection="{ item }">
                        <v-avatar size="24" class="mr-2">
                          <img :src="getFlagUrl(item.raw.code)" :alt="item.raw.country" />
                        </v-avatar>
                        {{ item.raw.country }}
                      </template>
                      <template v-slot:item="{ props, item }">
                        <v-list-item v-bind="props">
                          <template v-slot:prepend>
                            <v-avatar size="24">
                              <img :src="getFlagUrl(item.raw.code)" :alt="item.raw.country" />
                            </v-avatar>
                          </template>
                        </v-list-item>
                      </template>
                    </v-select>
                  </v-col>
                </v-row>

                <v-row>
                  <v-col cols="12" md="6">
                    <v-select
                      v-model="currency"
                      :items="currencies.map(c => c.currency_code)"
                      :label="$t('currency')"
                    ></v-select>
                  </v-col>
                  <v-col cols="12" md="6">
                    <v-text-field
                      v-model="salary"
                      :label="$t('your_salary_in', { currency: currency })"
                      type="number"
                      prefix="$"
                      required
                    ></v-text-field>
                  </v-col>
                  <v-btn @click="compareIncome()" color="primary" block :loading="loading">{{ $t('compare') }}</v-btn>
                </v-row>
              </v-form>

              <v-alert v-if="result" class="mt-4" type="info">
                {{ $t('with_your_salary', { salary: salary, originCountry: in_origin_country, result: result, targetCountry: of_target_country }) }}
              </v-alert>
  
              <v-alert v-if="error" class="mt-4" type="error">
                {{ error }}
              </v-alert>
            </v-card-text>
        </v-col>
      </v-row>
    </v-container>
  </template>
  
<script setup>
  import { ref, inject, onMounted, watch } from "vue";
  import axios from "axios";
  import { useI18n } from 'vue-i18n';

  const of_target_country = ref("");
  const in_origin_country = ref("");

  const { t, locale } = useI18n();
  const config = inject("config");
  const countries = ref([]);
  const originCountry = ref(null);
  const targetCountry = ref(null);
  const salary = ref(null);
  const currency = ref("USD");
  const currencies = ref([]);
  const result = ref(null);
  const error = ref(null);
  const loading = ref(false);

  const fetchCountries = async () => {
    try {
      const response = await axios.get(`${config.apiUrl}/countries`);
      countries.value = response.data;
    } catch (error) {
      console.error("Error when searching for countries:", error);
    }
  }

  const fetchCurrencies = async () => {
    try {
      const response = await axios.get(`${config.apiUrl}/currencies/get`);
      const data = response.data;

      currencies.value = data.map(item => ({
        code: item.code,
        currency_code: item.name,
        currency: item.currency
      }));

    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  const updateCurrency = () => {
    if (!originCountry.value) {
      return;
    }

    const selectedCurrency = currencies.value.find(
      item => item.code === originCountry.value.code
    );

    if (selectedCurrency) {
      currency.value = selectedCurrency.currency_code;
    } else {
      currency.value = "USD";
    }
  };

  const getFlagUrl = (code) => {
    return `${config.apiUrl}/images/flags/icons/${code.toUpperCase()}.svg`;
  }

  const compareIncome = async () => {
    if (!originCountry.value || !targetCountry.value || !salary.value) {
      error.value = "Please fill in all fields";
      return;
    }

    loading.value = true;
    error.value = null;
    result.value = null;

    const translateData = {};

    if (localStorage.locale == "pt") {
      translateData.value = {
        lang: localStorage.locale,
        origin_country: `in ${originCountry.value.country}`,
        target_country: `of ${targetCountry.value.country}`,
      };
    }

    try {
      const response = await axios.get(`${config.apiUrl}/income/compare-income`, {
        params: {
          origin_country: originCountry.value.code,
          salary: salary.value,
          target_country: targetCountry.value.code,
          translate_data: translateData.value
        },
      });

      result.value = response.data.quality_of_life;

      in_origin_country.value = originCountry.value.country;
      of_target_country.value = targetCountry.value.country;

      if (response.data.translate_data) {
        in_origin_country.value = response.data.translate_data.translatedTexts[0];
        of_target_country.value = response.data.translate_data.translatedTexts[1];
      }

    } catch (error) {
      error.value = "Error fetching data. Check the values ​​entered.";
    } finally {
      loading.value = false;
    }
  }

  onMounted(fetchCountries(), fetchCurrencies());

  watch(originCountry, updateCurrency);
</script>
  