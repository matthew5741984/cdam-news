import Vue from 'vue'
import VueGoodTablePlugin from 'vue-good-table';
import 'vue-good-table/dist/vue-good-table.css'

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueGoodTablePlugin);

Vue.component('jumbotron-view', require('./Partials/jumbotron-view.vue').default);
Vue.component('realtime-dashboard', require('./RealtimeDashboard/Main.vue').default);
Vue.component('search-engine', require('./SearchEngine/Main.vue').default);

const app = new Vue({
    el: '#app',
});
