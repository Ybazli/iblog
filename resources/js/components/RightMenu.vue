<template>

    <div class="sidebar bg-white shadow" v-show="status">
        <div class="mt-10 ml-16">
            <a href="#" v-on:click="status=false">
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20" class="mx-10"
                     style="width: 14px; margin-bottom: 100px">
                    <path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/>
                </svg>
            </a>
        </div>
        <ul class="text-center mt-32 list-reset">

            <li class="mb-8">
                <a href="#"
                   class="text-xl hover:underline no-underline text-grey-dark ">
                    Profile
                </a>
            </li>
            <li class="mb-8">
                <a href="#"
                   class="text-xl hover:underline no-underline text-grey-dark ">
                    Profile
                </a>
            </li>
            <li class="mb-8">
                <a href="#"
                   class="text-xl hover:underline no-underline text-grey-dark ">
                    Profile
                </a>
            </li>

        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                status: true
            }

        },
        mounted() {
            console.log('im loaded');
        },
        computed: {
            showSidebar() {
                return this.status = true;
            },
            hideSidebar() {
                return this.status = false;
            }

        }
    }
</script>

<style>
    .sidebar {
        position: fixed;
        right: 0;
        top: 0;
        height: 100%;
        width: 250px;

    }
</style>