<template>
	<v-container class="center">
		<v-row>
			<!-- <v-spacer class="hidden-sm-and-down" /> -->
			<v-col>
				<p class="text-h6 text-center">
					Get the name of your favorite movie in every language
				</p>
			</v-col>
			<!-- <v-spacer class="hidden-sm-and-down" /> -->
			<!-- <v-col>
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
      </v-col> -->
		</v-row>
		<v-row>
			<v-col cols="6">
				<p class="text-center text-h5">Random Movie</p>
				<v-row justify="center" class="py-1">
					<v-btn
						@click="getRandomMovie"
						:loading="loading"
						color="green lighten-1"
					>
						Randomize
					</v-btn>
				</v-row>
				<v-row v-if="randomMovie !== null" justify="center">
					<router-link
						:to="{
							name: 'MovieDetail',
							params: { slug: randomMovie.slug },
						}"
					>
						<v-img
							max-height="500"
							max-width="300"
							:src="
								require('../../src/images/' +
									randomMovie.poster)
							"
						/>
					</router-link>
				</v-row>
			</v-col>
			<v-col cols="6">
				<p class="text-center text-h5">Search by language</p>
				<v-row>
					<v-col>
						<v-row justify="center">
							<v-form
								ref="searchForm"
								v-model="valid"
								lazy-validation
							>
								<v-col>
									<v-text-field
										color="green lighten-1"
										v-model="title"
										label="Title of the movie"
										required
										@keypress.enter="findMovie"
										:rules="titleRules"
									></v-text-field>
								</v-col>
								<v-col>
									<v-select
										color="green lighten-1"
										v-model="titleLanguage"
										label="Language of the title"
										:menu-props="{
											top: true,
											offsetY: true,
										}"
										:items="languages"
										required
										:rules="languageRules"
									></v-select>
								</v-col>
							</v-form>
						</v-row>

						<v-row justify="center">
							<v-btn
								:disabled="!valid"
								@click="findMovie"
								color="green lighten-1"
							>
								search !
							</v-btn>
						</v-row>
					</v-col>
				</v-row>
				<v-row>
					<v-col v-if="searchResult !== ''">
						<v-card class="px-3">
							<v-card-title>
								There is {{ numberResult }} result
								<span v-if="numberResult >= 2">s</span>
							</v-card-title>
							<v-card-text
								v-for="result in searchResult"
								:key="result.id"
							>
								<span>
									Title: {{ result.title }} <br />
									Original Title:
									{{ result.movie.originalTitle }}
									<br />
									Synopsis:
									{{ result.movie.synopsis }}
									<router-link
										:to="{
											name: 'MovieDetail',
											params: { slug: result.movie.slug },
										}"
									>
										Details
									</router-link>
								</span>
							</v-card-text>
						</v-card>
					</v-col>
				</v-row>
			</v-col>
		</v-row>
	</v-container>
</template>

<script>
export default {
	name: "Home",
	props: {},
	data: () => ({
		valid: false,
		randomMovie: null,
		loading: false,
		title: "",
		titleLanguage: "",
		searchResult: "",
		numberResult: "",
		admin: false,
		username: "",
		password: "",
		JWToken: "",
		languages: [
			{ text: "en", value: "en" },
			{ text: "fr", value: "fr" },
			{ text: "de", value: "de" },
			{ text: "it", value: "it" },
			{ text: "ja", value: "ja" },
			{ text: "ru", value: "ru" },
			{ text: "zh", value: "zh" },
		],
		titleRules: [
			(v) => !!v || "Title is required",
			(v) =>
				(v && v.length >= 4) || "Title must be more than 4 characters",
		],
		languageRules: [(v) => !!v || "Language is required"],
	}),
	methods: {
		getRandomMovie() {
			this.loading = true;
			this.$axios({
				method: "GET",
				url: "/api/movies/randomize",
				params: {
					number: 1,
				},
			}).then((response) => {
				this.randomMovie = response.data["hydra:member"][0];
				this.loading = false;
			});
		},
		findMovie() {
			if (this.$refs.searchForm.validate()) {
				this.$axios({
					method: "GET",
					url: "/api/" + this.titleLanguage + "_translations",
					params: {
						title: this.title,
					},
				}).then((response) => {
					this.searchResult = response.data["hydra:member"];
					this.numberResult = response.data["hydra:totalItems"];
				});
			}
		},
		resetSearch() {
			this.title = "";
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
		// this.JWToken = this.$cookies.get("JWToken");
	},
};
</script>
