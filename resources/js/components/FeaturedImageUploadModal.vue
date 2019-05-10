<template>
    <div>
        <input type="hidden" name="image" :value="image">

        <modal name="featuredImage"  height="auto">

            <div class="p-5">
                <h3 class="text-grey-dark my-5">Select Featured Image</h3>
                <label for="image" class="block content-center" style="text-align:center">
                    <img src="/images/assets/upload-icon.png" alt="" width="150px">
                    <br>
                    Click to select file
                </label>
                <input type="file"
                       name=""
                       id="image"
                       class="bg-white w-full p-5 mt-5 hidden font-sans">

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
        components:{
            VModel
        },
        data(){
            return {
                image:''
            }
        },
        methods:{
            show(){
                this.$modal.show('featuredImage');
            },
            hide(){
                this.$modal.hide('featuredImage');
            }
        }
    }
</script>

<style scoped>

</style>