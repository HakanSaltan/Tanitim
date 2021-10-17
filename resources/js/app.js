

window.Vue = require('vue')
window.axios = require('axios')

import Vue from "vue"
import VModal from 'vue-js-modal'


Vue.use(VModal, {  dynamicDefault: { draggable: true, resizable: true } })

Vue.component('sayfalar',require("./components/sayfalar.vue").default);

const vueApp = new Vue({
    el:'#app'
})

