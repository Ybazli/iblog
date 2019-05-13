<template>
    <div>
        <input type="hidden" name="meta" :value="meta">

        <modal name="metaTagsModal"
               height="auto">

            <div class="p-5">
                <h3 class="text-grey-dark my-5">Meta Tags</h3>

                <div class="my-5">
                    <input type="text"
                           name="title"
                           v-model="title"
                           class="w-full py-5 pl-5 rounded font-mono text-xs bg-grey-lightest"
                           placeholder="Meta Title">
                </div>

                <div class="my-5">
                    <input type="text"
                           name="description"
                           v-model="description"
                           class="w-full py-5 pl-5 rounded font-mono text-xs bg-grey-lightest"
                           placeholder="Meta Description">
                </div>

                <div class="my-5">
                    <input type="text"
                           name="author"
                           v-model="author"
                           class="w-full py-5 pl-5 rounded font-mono text-xs bg-grey-lightest"
                           placeholder="Meta Author">
                </div>

                <div class="my-5">
                    <input type="text"
                           name="keywords"
                           v-model="keywords"
                           class="w-full py-5 pl-5 rounded font-mono text-xs bg-grey-lightest"
                           placeholder="Meta Keywords">
                </div>

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
    export default {
        name: "MetaTagsModal.vue",
        props:[
            'data'
        ],
        data(){
            return {
                meta:'',
                title:'',
                description:'',
                author:'',
                keywords:''
            }
        },
        methods:{
            show(){
                this.$modal.show('metaTagsModal');
            },
            hide(){
                this.generateMetaJson();
                this.$modal.hide('metaTagsModal');
            },
            generateMetaJson(){
                let jsonData = [{
                    "title" : this.title,
                    "description" : this.description,
                    "author" : this.author,
                    "keywords" : this.keywords
                }];
                this.meta = JSON.stringify(jsonData[0]);
            }
        },
        mounted() {
            if(this.data && this.data.length){
                let data = JSON.parse(this.data);
                this.meta = data;
                this.title = data.title;
                this.description = data.description;
                this.author = data.author;
                this.keywords = data.keywords;
            }
        }
    }

</script>
