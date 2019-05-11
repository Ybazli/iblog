

require('./bootstrap');

window.Vue = require('vue');

Vue.component('right-menu', require('./components/RightMenu.vue').default);
Vue.component('category-modal' , require('./components/CategoryModal.vue').default);
Vue.component('tags-modal' , require('./components/TagsModal.vue').default);

Vue.component('mini-text-editor' , require('./components/MiniTextEditor.vue').default);
Vue.component('featured-image-upload-modal' , require('./components/FeaturedImageUploadModal.vue').default);
Vue.component('meta-tags-modal' , require('./components/MetaTagsModal.vue').default);
Vue.component('alert' , require('./components/Alert.vue').default);

const app = new Vue({
    el: '#app',
});
