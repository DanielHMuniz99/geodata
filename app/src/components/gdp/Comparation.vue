<template>
    <v-container>
      <v-row justify="center">
        <v-col cols="12" md="12">
          <v-card-title class="text-h6">Quality of Life Comparison</v-card-title>
            <v-card-text>
              <v-form>
                <v-select
                  v-model="originCountry"
                  :items="countries"
                  item-title="country"
                  item-value="code"
                  label="Country of origin"
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
                      <v-list-item-title>{{ item.raw.country }}</v-list-item-title>
                    </v-list-item>
                  </template>
                </v-select>

                <v-select
                  v-model="targetCountry"
                  :items="countries"
                  item-title="country"
                  item-value="code"
                  label="Country of Comparison"
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
                      <v-list-item-title>{{ item.raw.country }}</v-list-item-title>
                    </v-list-item>
                  </template>
                </v-select>
  
                <v-select
                  v-model="currency"
                  :items="currencies"
                  label="Currency"
                  disabled
                ></v-select>
  
                <v-text-field
                  v-model="salary"
                  label="Your Salary (in USD)"
                  type="number"
                  prefix="$"
                  required
                ></v-text-field>

                <v-btn @click="compareIncome()" color="primary" block :loading="loading">Compare</v-btn>
              </v-form>
  
              <v-alert v-if="result" class="mt-4" type="info">
                With a salary of ${{ salary }} in {{ originCountry?.country }},
                you are richer than <strong>{{ result }}%</strong> of the population of {{ targetCountry?.country }}
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
  import { ref, inject, onMounted } from "vue";
  import axios from "axios";

  const config = inject("config");
  const countries = ref([]);
  const originCountry = ref(null);
  const targetCountry = ref(null);
  const salary = ref(null);
  const currency = ref("USD");
  const currencies = ref(["USD"]);
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

    try {
      const response = await axios.get(`${config.apiUrl}/income/compare-income`, {
        params: {
          origin_country: originCountry.value.code,
          salary: salary.value,
          target_country: targetCountry.value.code,
        },
      });

      result.value = response.data;
    } catch (error) {
      error.value = "Error fetching data. Check the values ​​entered.";
    } finally {
      loading.value = false;
    }
  }

  onMounted(fetchCountries);
</script>
  