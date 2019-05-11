<template>
    <div>
        <input type="hidden" name="image" :value="filePath">

        <modal name="featuredImage"
               @before-close="this.beforeClose"
               height="auto">

            <div class="p-5">

                <h3 class="text-grey-dark my-5">Select Featured
                    Image</h3>

                <label for="image" class="block content-center"
                       style="text-align:center">
                    <img :src="image"
                         alt=""
                         width="300px">
                    <br>
                    <span v-if="">Click to select file</span>
                </label>

                <input type="file"
                       name="image"
                       id="image"
                       @change="onChange"
                       ref="imageFile"
                       accept="image/*"
                       class="hidden">

                <div class="mt-16">

                    <button @click="this.hide"
                            type="button"
                            class="py-3 px-6 bg-indigo-light text-white rounded">
                        Upload
                    </button>

                </div>

            </div>

        </modal>

    </div>
</template>

<script>
    import VModel from 'vue-js-modal';

    export default {
        name: "FeaturedImageUploadModal.vue",
        components: {
            VModel
        },
        data() {
            return {
                image: '/images/assets/upload-icon.png',
                uploadPath: '/blog/posts/create/image-upload',
                filePath: '',
                file: ''
            }
        },
        methods: {
            show() {
                this.$modal.show('featuredImage');
            },
            hide() {
                this.$modal.hide('featuredImage');
            },
            onChange(e) {

                let file = e.target.files[0];
                this.file = file;
                let reader = new FileReader();
                reader.readAsDataURL(file);

                reader.onload = e => {
                    let src = e.target.result;
                    this.image = src;
                };


            },

            beforeClose() {
                this.uploadImage(this.file);
            },

            uploadImage(file) {
                let data = new FormData();
                data.append('image', file);

                axios.post(this.uploadPath, data)

                    .then((e) =>
                        this.filePath = e.data
                    )

                    .catch((xhr) => console.log(xhr));

            }
        }
    }
</script>

<style scoped>

</style>