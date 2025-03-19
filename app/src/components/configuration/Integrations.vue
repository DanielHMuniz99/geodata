<template>
  <v-card>
    <v-card-title>Integrations</v-card-title>
    <v-card-text>
      <v-list>
        <v-list-item v-for="integration in integrations" :key="integration.id">
          <v-list-item-content>
            <v-list-item-title>{{ integration.name }}</v-list-item-title>
            <v-list-item-subtitle>
              Value: {{ integration.value ? '*****' : 'No value defined' }}
            </v-list-item-subtitle>
            <v-btn icon @click="editIntegration(integration)">
              <v-icon>mdi-pencil</v-icon>
            </v-btn>
            <v-btn icon @click="deleteIntegration(integration.id)">
              <v-icon>mdi-delete</v-icon>
            </v-btn>
          </v-list-item-content>
          <hr>
        </v-list-item>
      </v-list>
    </v-card-text>
  </v-card>
  
  <v-dialog v-model="editDialog" max-width="500">
    <v-card>
      <v-card-title>Edit Integration</v-card-title>
      <v-card-text>
        <v-text-field
          v-model="editedIntegration.name"
          label="Name"
          disabled
        ></v-text-field>
        <v-text-field
          v-model="editedIntegration.value"
          :type="showPassword ? 'text' : 'password'"
          label="Value"
          :append-icon="showPassword ? 'mdi-eye-off' : 'mdi-eye'"
          @click:append="showPassword = !showPassword"
        ></v-text-field>
      </v-card-text>
      <v-card-actions>
        <v-btn color="blue darken-1" text @click="saveIntegration">Save</v-btn>
        <v-btn text @click="editDialog = false">Cancel</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script setup>

  import axios from 'axios';
  import { ref, onMounted, inject } from 'vue';

  const config = inject("config");
  const integrations = ref([]);
  const editDialog = ref(false);
  const editedIntegration = ref();

  const fetchIntegrations = async () => {
    try {
      const response = await axios.get(`${config.apiUrl}/integrations/available`);
      integrations.value = response.data;
    } catch (error) {
      console.error('Error searching for integrations:', error);
    }
  }

  const editIntegration = async (integration) => {
    editedIntegration.value = { ...integration };
    editDialog.value = true;
  }

  const saveIntegration = async () => {
    console.log(editedIntegration.value.value);
    try {
      const response = await axios.get(`${config.apiUrl}/integrations/update`, {
        params: {
          key: editedIntegration.value.name,
          value: editedIntegration.value.value,
        },
      });

      editDialog.value = false;
      await this.fetchIntegrations();
    } catch (error) {
      console.error('Error updating integration:', error);
    }
  }

  const deleteIntegration = async (id) => {
    try {
      await axios.delete(`${config.apiUrl}/integrations/delete/${id}`);
      await this.fetchIntegrations();
    } catch (error) {
      console.error('Error deleting integration:', error);
    }
  }

  onMounted(fetchIntegrations)

</script>