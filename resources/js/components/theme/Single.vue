<template>
    <div class="my-10">

        <h2 class="text-3xl leading-normal text-grey-darkest">
            {{ article.title }}
        </h2>
        <div class="text-grey-dark italic text-xs mt-2">
            {{ articleDate(article.created_at) }}
        </div>
        <div class="text-grey-dark text-xs mt-2" v-if="article.category">
            Published at: 
            <a href="#" class="no-underline text-teal">
                 {{ category(article.category) }}
            </a>
        </div>
        <div v-html="article.body" class="my-5 leading-normal text-grey-darkest">
        </div>
        <div class="text-center text-xs my-5" v-if="article.tags">
            Tags: 
            <span v-for="tag in article.tags">
                <router-link :to="taglink(tag.slug)"
                class="no-underline text-teal border-1 rounded p-2 border-teal hover:bg-teal hover:text-white mx-2">
                    {{ tag.name }}
                </router-link>
            </span>

        </div>
        <div class="border-t-1 border-grey-lighter">
            <bio></bio>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    moment().format();

    export default {
    	data(){
    		return{
    			slug: this.$route.params.slug,
                article :{}
    		}
    	},
    	created(){
            axios.get('https://iblog.test/api/articles/'+this.slug).then((response)=>{
                this.article = response.data;
            })
    	},
        methods:{
            articleDate(created_at){
                return moment(created_at, "YYYYMMDD").format("YYYY/MM/DD");
            },

            category(category){
                return category.name;
            },
            taglink(slug){
                return '/tags/'+slug;
            }
        }
    }
</script>

