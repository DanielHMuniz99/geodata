<template>
  <v-row justify="center">
    <v-carousel v-if="carouselNews.length" height="400">
      <v-carousel-item
        v-for="noticia in carouselNews"
        :key="noticia.id"
      >
        <v-img
          :src="'https://agenciadenoticias.ibge.gov.br/' + noticia.image"
          cover
        >
          <v-container class="fill-height d-flex align-center justify-center">
            <v-card-title class="text-white text-h5 text-center strokeme">
              {{ noticia.titulo }}
            </v-card-title>
          </v-container>
        </v-img>
      </v-carousel-item>
    </v-carousel>

    <v-list v-if="listNews.length">
      <v-list-item v-for="news in listNews" :key="news.id" :href="news.link" target="_blank">
        <template v-slot:prepend>
          <v-avatar size="64">
            <v-img
              :src="'https://agenciadenoticias.ibge.gov.br/' + news.image"
              alt="notícia"
            ></v-img>
          </v-avatar>
        </template>
        <v-list-item-content>
          <v-list-item-title>{{ news.titulo }}</v-list-item-title>
          <v-list-item-subtitle>{{ news.introducao }}</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-row>
</template>

<script setup>
import axios from 'axios';
import { ref, onMounted, inject } from 'vue';

const config = inject("config");
const carouselNews = ref([]);
const listNews = ref([]);

const fetchNews = async () => {
  try {
    const response = await axios.get(`${config.apiUrl}/news/get/${localStorage.locale}`);
    const allNews = response.data.items.slice(0, 10);
    carouselNews.value = allNews.slice(0, 3).map(noticia => ({
      id: noticia.id,
      titulo: noticia.titulo,
      image: JSON.parse(noticia.imagens).image_intro || ''
    }));

    listNews.value = allNews.map(noticia => ({
      id: noticia.id,
      titulo: noticia.titulo,
      introducao: noticia.introducao,
      image: JSON.parse(noticia.imagens).image_intro || ''
    }));
  } catch (error) {
    console.error('Error when searching for news:', error);
  }
}

onMounted(fetchNews);

</script>