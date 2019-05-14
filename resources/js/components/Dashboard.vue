<template>
    <div class="flex flex-wrap">
        <chart title="Daily Visitor" card-class="w-1/3" name="Daily" id="daily" color="#cdcdcd" ></chart>
        <chart title="Daily Visitor" card-class="w-1/3" name="Daily" id="monthly" color="#cdcdcd" ></chart>
        <chart title="Daily Visitor" card-class="w-1/3" name="Daily" id="yearly" color="#cdcdcd" ></chart>
    </div>
</template>

<script>

    import Chart from './Chart';

    export default {
        name: "Dashboard.vue",
        components:{
            Chart
        }

    }
</script>

<style scoped>

</style>