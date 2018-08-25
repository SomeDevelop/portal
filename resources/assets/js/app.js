require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import {routes} from './routes';
import StoreData from './store';
import MainApp from './components/MainApp.vue';

Vue.use(VueRouter);
Vue.use(Vuex);

const store = new Vuex.Store(StoreData);

const router = new VueRouter({
    routes,
    mode: 'history'
});

// initialize(store, router);
Vue.use(require('vue-chat-scroll'));



Vue.component('chat-component', require('./components/ChatComponent.vue'));

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        MainApp
    }
});
