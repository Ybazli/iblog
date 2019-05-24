<template>
	<div class="mt-10">
        <h4 class="text-5xl text-grey-darkest montserrat">Yashar Bazli</h4>
        <bio></bio>
	    <!-- <div v-for="article in articles" 
	    	class="my-5 border-b-1 border-grey-lighter pb-4 ">
	    	<h2 class="text-xl">
            <router-link 
				class="text-grey-darker no-underline hover:text-teal-light"
				:to="articleSlug(article.slug)" >
                {{ article.title }}
            </router-link>
	    	</h2>
	    	<div class="text-grey-dark italic text-xs mt-2">
	    		{{ articleDate(article.created_at) }}
	    	</div>
            <div class="mt-5 text-xs">
                <router-link 
                    class="text-teal no-underline hover:text-teal-light"
                    :to="articleSlug(article.slug)" >
                        Read More →
                </router-link>
            </div>
	    	
	    </div> -->
        <div class="flex justify-between mb-5 border-b-1 border-grey-lighter pb-5 text-xs">
            <button 
				class="border-1 text-grey-dark p-2 rounded hover:border-teal hover:text-teal">
				Previos Page
			</button>
            <button 
				class="border-1 text-grey-dark p-2 rounded hover:border-teal hover:text-teal">
				Next Page
			</button>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
moment().format();
    export default {
    	data(){
    		return{
    			articles:[]
    		}
    	},
    	mounted(){
    		axios.get('/articles').then((response) =>{
				console.log(JSON.parse(response.data));
			});
    	},
    	methods:{
    		articleDate(created_at){
    			return moment(created_at, "YYYYMMDD").format("YYYY/MM/DD");
    		},
    		articleSlug(slug){
    			return '/'+slug;
    		}

    	}
    }
</script>
