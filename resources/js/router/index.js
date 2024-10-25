import   { createRouter, createWebHistory  } from "vue-router";

import homePageIndex from '../components/pages/home/index.vue'
import notFound from '../components/notFound.vue'

const routes = [
    //pages
    {
        path: '/',
        component: homePageIndex,
    },
    // noFound
    {
        path: '/:pathMatch(.*)*',
        component: notFound,
    }
]

const router = createRouter({ 
    history: createWebHistory(),
    routes, 
});

export default router