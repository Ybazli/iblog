<template>
    <div>
        <input type="hidden" name="category_id" :value="this.value!= null ? this.value.id : null">
        <modal name="categoryModal">
            <div class="p-5">
                <h3 class="text-grey-dark my-5">Select Category</h3>
                <multiselect v-model="value" :options="options"
                             track-by="id" label="name"></multiselect>
                <div class="mt-24">
                    <button @click="this.hide"
                            type="button"
                            class="py-3 px-6 bg-indigo-light text-white rounded">
                        Select
                    </button>
                </div>
            </div>
        </modal>
    </div>
</template>

<script>
    import VModal from 'vue-js-modal';
    import Multiselect from 'vue-multiselect';
    Vue.use(VModal);
    export default {
        data(){
          return {
              value: [],
              options: JSON.parse(this.cats)
            }
        },
        props:[
            'cats' ,
            'data'
        ],
        components:{
            VModal , Multiselect
        },
        methods: {
            show () {
                this.$modal.show('categoryModal');
            },
            hide () {
                this.$modal.hide('categoryModal');
            }
        },
        mounted() {
            if(this.data && this.data.length){
                this.value = JSON.parse(this.data);
            }
        }
    }
</script>

<style scoped>

</style>