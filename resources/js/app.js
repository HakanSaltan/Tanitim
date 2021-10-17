

window.Vue = require('vue')
window.axios = require('axios')

import Vue from "vue"
import VModal from 'vue-js-modal'
import Swal from 'sweetalert2'
import tinymce from 'vue-tinymce-editor'

Vue.use(VModal, {  dynamicDefault: { draggable: true, resizable: true } })

Vue.component('tinymce', tinymce)
Vue.component('sayfalar',require("./components/sayfalar.vue").default);

const vueApp = new Vue({
    el:'#app'
})

