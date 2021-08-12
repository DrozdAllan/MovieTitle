<template>
  <v-container>
    <v-row>
      <v-spacer />
      <v-col>
        <p class="text-h4 text-center">Welcome to Rate My Movies !</p>
        <p class="text-h5 text-center">Feel free to do so</p>
      </v-col>
      <v-col>
        <v-menu
          v-if="JWToken === null"
          :close-on-content-click="false"
          bottom
          offset-y
          nudge-bottom="5"
          rounded="lg"
        >
          <template v-slot:activator="{ on, attrs }">
            <v-btn color="primary" dark v-bind="attrs" v-on="on">
              Login
            </v-btn>
          </template>

          <v-card>
            <v-container>
              <v-col cols="12">
                <v-text-field
                  :counter="10"
                  label="Username"
                  v-model="username"
                ></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-text-field
                  :counter="10"
                  label="Password"
                  v-model="password"
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-btn @click="login">Login</v-btn>
                <router-link to="register" class="text-caption"
                  >Not registered yet ?</router-link
                >
              </v-col>
            </v-container>
          </v-card>
        </v-menu>


        <v-btn link to="account" v-else>Account</v-btn>

      </v-col>
    </v-row>
    <p>Movies of the week</p>
    <v-row>
      <v-img
        max-height="300"
        max-width="200"
        src="https://picsum.photos/200/300"
      ></v-img>
      <v-img
        max-height="300"
        max-width="200"
        src="https://picsum.photos/200/300"
      ></v-img>
      <v-img
        max-height="300"
        max-width="200"
        src="https://picsum.photos/200/300"
      ></v-img>
      <v-img
        max-height="300"
        max-width="200"
        src="https://picsum.photos/200/300"
      ></v-img>
      <v-img
        max-height="300"
        max-width="200"
        src="https://picsum.photos/200/300"
      ></v-img>
      <v-img
        max-height="300"
        max-width="200"
        src="https://picsum.photos/200/300"
      ></v-img>
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
          <v-card-title>
            There is {{ numberResult }} result<span v-if="numberResult >= 2"
              >s</span
            ></v-card-title
          >
          <v-card-text v-for="result in searchResult" :key="result.id">
            Name: {{ result.title }} Synopsis: {{ result.synopsis }}
            <router-link
              :to="{ name: 'MovieDetail', params: { id: result.id } }"
              >Details</router-link
            >
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
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
      username: "",
      password: "",
      JWToken: "",
    }),
    methods: {
      findMovie() {
        const parameters = {};
        if (this.movieSynopsis !== "") {
          parameters.synopsis = this.movieSynopsis;
        } else if (this.movieTitle !== "") {
          parameters.title = this.movieTitle;
        }
        this.$axios({
          method: "GET",
          url: "/api/movies",
          params: parameters,
        }).then((response) => {
          const data = response.data;
          console.log(data);
          this.searchResult = data["hydra:member"];
          this.numberResult = data["hydra:totalItems"];
        });
      },
      login() {
        this.$axios({
          method: "POST",
          url: "/login",
          data: {
            username: this.username,
            password: this.password,
          },
        })
          .then((response) => {
            this.$cookies.set("JWToken", response.data.token, 0);
            window.alert("Logged in !");
            location.reload();
          })
          .catch((error) => {
            if (error.response.status === 401) {
              window.alert("bad credentials");
            }
          });
      },
    },
    mounted() {
      this.JWToken = this.$cookies.get("JWToken");
    }
  };
</script>
