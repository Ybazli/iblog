<template>
    <div class="dropdown">
        <div @click="show = !show">
            <slot name="trigger"></slot>
        </div>
        <div class="dropdown-menu" v-show="show">
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
        }
    }
</script>

<style scoped>

</style>