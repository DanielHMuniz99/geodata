<template>
<v-app-bar
    color="teal-darken-4"
  >
    <template v-slot:image>
      <v-img
        gradient="to top right, rgba(19,84,122,.8), rgba(128,208,199,.8)"
      ></v-img>
    </template>
    <template v-slot:prepend>
      <v-app-bar-nav-icon></v-app-bar-nav-icon>
    </template>
    <v-app-bar-title>API</v-app-bar-title>
    <v-spacer></v-spacer>
  </v-app-bar>
</template>