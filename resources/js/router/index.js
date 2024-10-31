import   { createRouter, createWebHistory  } from "vue-router";

import homePageIndex from '../components/pages/home/index.vue'
import notFound from '../components/notFound.vue'
import login from '../components/pages/auth/login.vue'
import register from '../components/pages/auth/register.vue'

import student from '../components/pages/dashboard/student.vue'
import instructor from '../components/pages/dashboard/instructor.vue'
import courseIndex from '../components/pages/course/index.vue'
import studentEnrolled from '../components/pages/course/enrolled.vue'
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
    { path: '/student/dashboard', component:student  },
    { path: '/instructor/dashboard', component:instructor  },
    { path: '/course/:id', component:courseIndex  },
    { path: '/student/enrolled', component:studentEnrolled  },

]

const router = createRouter({ 
    history: createWebHistory(),
    routes, 
});

export default router