import { createWebHistory, createRouter } from "vue-router";

const routes = [
    {
        path: "/",
        alias: "/home",
        name: "tasks",
        component: () => import("./components/TasksList")
    },
    {
        path: "/http://127.0.0.1:8000/api/tasks/:id",
        name: "task-details",
        component: () => import("./components/task")
    },
    {
        path: "/add",
        name: "add",
        component: () => import("./components/Addtask")
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
