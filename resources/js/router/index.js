import   { createRouter, createWebHistory  } from "vue-router";

import homePageIndex from '../components/pages/home/index.vue'
import notFound from '../components/notFound.vue'
import login from '../components/pages/auth/login.vue'
import register from '../components/pages/auth/register.vue'

import student from '../components/pages/dashboard/student.vue'
import instructor from '../components/pages/dashboard/instructor.vue'
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
    },
    { path: '/login', component:login  },
    { path: '/register', component:register  },
    { path: '/student_dashboard', component:student  },
    { path: '/instructor_dashboard', component:instructor  },

]

const router = createRouter({ 
    history: createWebHistory(),
    routes, 
});

export default router