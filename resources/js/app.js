import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import "bootstrap";

// import component
import Dashboard from "./components/dashboard.vue";
import App from "./components/App.vue";
import gradeIndex from "./components/grade/gradeIndex.vue";
import grade from "./components/grade/grade.vue";
import gradeAdd from "./components/grade/gradeAdd.vue";

// FIL MURID
import muridIndex from "./components/murid/muridIndex.vue";
import murid from "./components/murid/murid.vue";
import muridAdd from "./components/murid/muridAdd.vue";
const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: "/", component: Dashboard },
        { path: "/grades", component: gradeIndex },
        { path: "/grades/create", component: gradeAdd },
        { path: "/grades/:id", component: grade },
        { path: "/grades/:id/edit", component: gradeAdd },

        // FILE MURID
        { path: "/murids", component: muridIndex },
        { path: "/murids/create", component: muridAdd },
        { path: "/murids/:id", component: murid },
        { path: "/murids/:id/edit", component: muridAdd },
    ],
});

const app = createApp(App);
app.use(router);
app.mount("#app");
