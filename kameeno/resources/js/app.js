/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//https://awesome-vue.js.org
//https://bootstrap-vue.js.org

require('./bootstrap');
import Vue from 'vue';

//bustrapVue
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

//sweetalert
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

//File agent
import VueFileAgent from 'vue-file-agent';
import VueFileAgentStyles from 'vue-file-agent/dist/vue-file-agent.css';
Vue.use(VueFileAgent);

//CKEditor
import CKEditor from 'ckeditor4-vue';
Vue.use(CKEditor);

//swal("Hello world!");
window.Vue = require('vue');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('form-register-unt-paciente', require('./components/FormRegisterUNTPaciente.vue').default);
Vue.component('form-wizard-unt-paciente', require('./components/FormWizardUntPacientes.vue').default);

Vue.component('contenido', require('./components/Contenido.vue').default);
Vue.component('contenido-registrar', require('./components/Contenido_Registrar.vue').default);
Vue.component('contenido-listar', require('./components/Contenido_Listar.vue').default);
Vue.component('contenido-editar', require('./components/Contenido_Editar.vue').default);
Vue.component('unt-listar', require('./components/unt_Listar.vue').default);
Vue.component('unt-perfiles', require('./components/unt_perfiles.vue').default);
Vue.component('cuestionario-listar', require('./components/Cuestionario_Listar.vue').default);
Vue.component('cuestionario-registrar', require('./components/Cuestionario_Registrar.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app_vue'
});
