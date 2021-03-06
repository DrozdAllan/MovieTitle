/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.css";

import Vue from "vue";
import VueCookies from "vue-cookies";
import VueRouter from "vue-router";
import vuetify from "./plugins/vuetify";
import axios from "axios";
import Home from "./pages/Home";
// import Register from "./pages/Register";
// import Account from "./pages/Account";
import MovieDetail from "./pages/MovieDetail";
import CategoryDetail from "./pages/CategoryDetail";

const routes = [
	{ path: "/", component: Home, name: "Home" },
	// { path: "/register", component: Register, name: "Register" },
	// { path: "/account", component: Account, name: "Account" },
	{ path: "/movie/:slug", component: MovieDetail, name: "MovieDetail" },
	{
		path: "/category/:id",
		component: CategoryDetail,
		name: "CategoryDetail",
	},
	// { path: "/api/docs", redirect: "/api/docs" },
	{ path: "*", redirect: "/" },
];

const router = new VueRouter({
	mode: "history",
	base: "/",
	routes,
	scrollBehavior(to, from, savedPosition) {
		return { x: 0, y: 0 };
	},
});

Vue.use(VueRouter);
Vue.use(VueCookies);

Vue.prototype.$axios = axios;

new Vue({
	router,
	vuetify,
}).$mount("#app");
