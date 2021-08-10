<template>
  <v-container>
    <v-row>
      <v-spacer />
      <v-col>
        <p class="text-h4 text-center">Welcome to Rate My Movies !</p>
        <p class="text-h4 text-center">Feel free to do so</p>
        <p class="text-h4 text-center">(you must login to review movies)</p>
      </v-col>
      <v-col>
        <v-btn v-if="admin === true" link to="admin">administrer</v-btn>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        Movies of the week
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="6">
        <v-form>
          <v-text-field
            v-model="movieTitle"
            label="Search by title"
            required
            @keydown.enter="findMovie"
          ></v-text-field>
          <v-text-field
            v-model="movieSynopsis"
            :counter="10"
            label="Search by synopsis"
            required
            @keydown.enter="findMovie"
          ></v-text-field>
          <v-select
            label="Filter with categories"
            :items="movieCategories"
          ></v-select>
          <v-btn class="justify-center" @click="findMovie">search !</v-btn>
        </v-form>
      </v-col>
      <v-col v-if="searchResult !== ''">
        <v-card>
          <v-card-title> There is {{ numberResult }} result<span v-if="numberResult >= 2">s</span></v-card-title>
          <v-card-text v-for="result in searchResult" :key="result.id">
            Name: {{ result.title }} Synopsis: {{ result.synopsis }}
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
  const axios = require("axios");

  export default {
    name: "Home",
    props: {},
    data: () => ({
      movieTitle: "",
      movieSynopsis: "",
      movieCategory: "",
      searchResult: "",
      numberResult: "",
      movieCategories: ["Western", "Noir", "Fantasy"],
      admin: false,
    }),
    methods: {
      findMovie() {
        const parameters = {};
        if (this.movieSynopsis !== "") {
          parameters.synopsis = this.movieSynopsis;
        } else if (this.movieTitle !== "") {
          parameters.title = this.movieTitle;
        }
        axios({
          method: "GET",
          url: "/api/movies",
          params: parameters,
        }).then((response) => {
          const data = response.data;
          console.log(data);
          // this.movieTitle = data["title"];
          // this.movieSynopsis = data["synopsis"];
          // this.movieCategory = data["category"]["name"];
          this.searchResult = data["hydra:member"];
          this.numberResult = data["hydra:totalItems"];
        });
      },
    },
    // mounted() {
    //   axios({
    //     method: "POST",
    //     url: "/admin",
    //     data: {
    //       cmd: "isConnected",
    //     },
    //   }).then(
    //     (response) => {
    //       this.admin = response.data;
    //     },
    //     (error) => {
    //       console.log(error);
    //     }
    //   );
    // },
  };
</script>
