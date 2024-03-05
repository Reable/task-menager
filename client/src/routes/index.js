import {createRouter, createWebHistory} from "vue-router";

// Pages
import Auth from "../views/Auth.vue";
import Office from "../views/Office.vue";

const routes = [
    { path: '/', component: Auth },
    { path: '/office', component: Office },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;