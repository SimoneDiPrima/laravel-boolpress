import Vue from 'vue'
import VueRouter from 'vue-router'

import HomePage from "./pages/HomePage.vue";
import ContactsPage from "./pages/ContactsPage.vue";
import NotFoundPage from "./pages/NotFoundPage.vue";
import PostDetailPage from "./pages/PostDetailPage.vue";

Vue.use(VueRouter)

// definisco le rotte e inizializzo una nuova istanza di router

const routes = new VueRouter({
    mode:'history',
    linkExactActiveClass:'active',
    routes:[
        {path:'/',component: HomePage, name:'home'},
        {path:'/contacts',component: ContactsPage , name:'contacts'},
        {path:'*',component: NotFoundPage , name:'not_found'},//metterla sempre in fondo!!altrimenti nn fa vedere altre rotte tranne lei
        {path:'/posts/:id',component: PostDetailPage , name:'post-detail'},
    ]
})
export default routes;