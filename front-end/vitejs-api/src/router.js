import { createRouter, createWebHistory } from 'vue-router';
import Home from './components/Home.vue';
import EventList from './components/EventList.vue';
import TagList from './components/TagList.vue';

const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/events',
        component: EventList
    },
    {
        path: '/tags',
        component: TagList
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
