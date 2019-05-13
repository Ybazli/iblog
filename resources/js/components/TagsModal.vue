<template>
    <div>

        <input type="hidden" name="tags" :value='this.tagId'>

        <modal name="tagsModal"
               height="auto">

            <div class="p-5">
                <h3 class="text-grey-dark my-5">Select Tags</h3>

                <multiselect v-model="value" :options="options"
                             @select="pushId"
                             @tag="addTag"
                             @remove="removeId"
                             :multiple="true"
                             :taggable="true"
                             class="mt-10"
                             track-by="id"
                             label="name"></multiselect>

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
                tagId:[],
                value: [],
                options: JSON.parse(this.tags)
            }
        },
        props:[
            'tags',
            'data'
        ],
        components:{
            VModal , Multiselect
        },
        mounted(){
            if(this.data && this.data.length){
                this.value = JSON.parse(this.data);
                this.value.forEach((item)=>{
                   this.tagId.push(item.id);
                });

            }
        },
        methods: {
            show () {
                this.$modal.show('tagsModal');
            },
            hide () {
                this.$modal.hide('tagsModal');
            },
            pushId(selectedOption){
                this.tagId.push(selectedOption.id);
            },
            removeId(selectedOption){
                this.tagId = this.arrayRemove(this.tagId , selectedOption.id);
            },
            arrayRemove(arr, value) {
                return arr.filter(function(ele){
                    return ele != value;
                });
            },
            addTag (newTag) {
                const tag = {
                    name: newTag,
                    id: newTag
                }
                this.options.push(tag);
                this.value.push(tag);
                this.tagId.push(tag.id);
            }
        }
    }
</script>

<style scoped>

</style>