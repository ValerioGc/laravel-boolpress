import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import HomePage from './pages/HomePage.vue';
import PostsPage from './pages/PostsPage.vue';
import ContactPage from './pages/ContactPage.vue';
import AboutPage from './pages/AboutPage.vue';
import Error404 from './pages/Error404.vue';


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage
        },
        {
            path: '/blog',
            name: 'blog',
            component: PostsPage
        },

        {
            path: '/contact',
            name: 'contact',
            component: ContactPage
        },
        {
            path: '/about-us',
            name: 'about-us',
            component: AboutPage
        },
        {
            path: '/*',
            name: 'not-found',
            component: Error404
        }
    ]
});

export default router;
