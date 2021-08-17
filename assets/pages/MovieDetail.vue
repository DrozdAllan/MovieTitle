<template>
  <v-container>
    <v-card v-if="Movie">
      <v-card-title>
        {{ Movie.originalTitle }}
      </v-card-title>
      <v-card-text>
        Synopsis: {{ Movie.synopsis }}
        <!-- <router-link
          :to="{ name: 'CategoryDetail', params: { id: Movie.category.id } }"
          >Movies of the same genre</router-link
        > -->
        <v-simple-table>
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">
                  Language
                </th>
                <th class="text-left">
                  Title
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>En</td>
                <td>{{ Movie.enTranslation.title }}</td>
              </tr>
              <tr>
                <td>Fr</td>
                <td>{{ Movie.frTranslation.title }}</td>
              </tr>
              <tr>
                <td>De</td>
                <td>{{ Movie.deTranslation.title }}</td>
              </tr>
              <tr>
                <td>Es</td>
                <td>{{ Movie.esTranslation.title }}</td>
              </tr>
              <tr>
                <td>Zh</td>
                <td>{{ Movie.zhTranslation.title }}</td>
              </tr>
              <tr>
                <td>It</td>
                <td>{{ Movie.itTranslation.title }}</td>
              </tr>
              <tr>
                <td>Ja</td>
                <td>{{ Movie.jaTranslation.title }}</td>
              </tr>
              <tr>
                <td>Ru</td>
                <td>{{ Movie.ruTranslation.title }}</td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
      </v-card-text>
    </v-card>

    <v-skeleton-loader v-else v-bind="attrs" type="article"></v-skeleton-loader>
  </v-container>
</template>

<script>
  export default {
    name: "MovieDetail",
    data() {
      return {
        attrs: {
          class: "mb-6",
          elevation: 2,
        },
        Movie: null,
        review: false,
      };
    },
    methods: {
      rate() {
        const JWT = this.$cookies.get("JWToken");
        if (JWT === null) {
          window.alert("You must be logged in");
        } else {
          this.review = true;
        }
      },
    },
    mounted() {
      this.$axios({
        method: "GET",
        url: "/api/movies/" + this.$route.params.slug,
      }).then((response) => {
        this.Movie = response.data;
      });
    },
  };
</script>

<style></style>
