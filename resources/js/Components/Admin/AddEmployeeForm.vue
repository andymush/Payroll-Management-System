<script setup >
import { ref } from 'vue';


</script>

<template>
    <div class="d-flex justify-center mt-5">
        <p class="text-h6 text-md-h5 text-lg-h5">Add Employee</p>
    </div>
    <v-form v-model="valid">
      <v-container>
        <v-row>
          <v-col cols="12" md="4">
            <v-text-field
              v-model="firstname"
              :rules="nameRules"
              :counter="10"
              label="First name"
              required
              hide-details
            ></v-text-field>
          </v-col>
  
          <v-col cols="12" md="4">
            <v-text-field
              v-model="lastname"
              :rules="nameRules"
              :counter="10"
              label="Last name"
              hide-details
              required
            ></v-text-field>
          </v-col>
  
          <v-col cols="12" md="4">
            <v-text-field
              v-model="email"
              :rules="emailRules"
              label="E-mail"
              hide-details
              required
            ></v-text-field>
          </v-col>

        </v-row>

        <v-row>
          <v-col cols="12" md="4">
            <v-text-field
              v-model="designation"
              :rules="nameRules"
              :counter="10"
              label="Designation"
              required
              hide-details
            ></v-text-field>
          </v-col>
  
          <v-col cols="12" md="4">
            <v-text-field
              v-model="Department"
              :rules="nameRules"
              :counter="10"
              label="Department"
              hide-details
              required
            ></v-text-field>
          </v-col>
        </v-row>
        <v-row>
  
          <v-col cols="12" md="4">
            
            <v-date-picker></v-date-picker>

          </v-col>
          
        </v-row>
      </v-container>
    </v-form>
  </template>

 