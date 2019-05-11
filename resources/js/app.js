/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

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

Vue.component('right-menu', require('./components/RightMenu.vue').default);
Vue.component('category-modal' , require('./components/CategoryModal.vue').default);
Vue.component('tags-modal' , require('./components/TagsModal.vue').default);

Vue.component('mini-text-editor' , require('./components/MiniTextEditor.vue').default);
Vue.component('featured-image-upload-modal' , require('./components/FeaturedImageUploadModal.vue').default);
Vue.component('meta-tags-modal' , require('./components/MetaTagsModal.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
