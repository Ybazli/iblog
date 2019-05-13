<template>
    <div class="dropdown relative"
         aria-haspopup="true"
         aria-expanded="true">

        <div @click="show = !show">
            <slot name="trigger"></slot>
        </div>

        <div class="dropdown-menu absolute pin-r mt-3 bg-white p-5 shadow rounded" v-show="show">
            <slot></slot>
        </div>

    </div>
</template>

<script>
    export default {
        name: "Dropdown.vue",
        data(){
            return{
                show: false
            }
        },
        watch:{
            show(show){
                if(show){
                    document.addEventListener('click' , this.close);
                }
            }
        },
        methods:{
            close(event){
                if(! event.target.closest('.dropdown')){
                    this.show = false;
                    document.removeEventListener('click' , this.close);
                }
            }
        }
    }
</script>

<style scoped>

</style>