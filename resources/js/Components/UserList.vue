<template>
    <v-container>
      <v-data-table :headers="headers" :items="users" />
    </v-container>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        headers: [
          { text: 'ID', value: 'id' },
          { text: 'Name', value: 'name' },
          { text: 'Email', value: 'email' },
        ],
        users: [],
      };
    },
  
    mounted() {
      axios.get('/users')
        .then(response => {
          this.users = response.data;
        });
    },
  };
  </script>
  