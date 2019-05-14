<template>

    <div class="" :class="cardClass">

        <div class="relative bg-white rounded shadow mb-4 mr-4 p-5"
             :id="id">
            <h3 class="text-xs text-grey-light">
                {{ title }}
                <span v-if="total"> / {{ total }}</span>
            </h3>

        </div>

    </div>

</template>

<script>
    //import apex chart globally
    import ApexCharts from 'apexcharts/dist/apexcharts.common.js';

    export default {
        name: "Chart.vue",
        props: [
            'cardClass',
            'name',
            'title',
            'total',
            'route',
            'id',
            'color',
            'height'
        ],
        data() {
            return {
                data: [0, 1, 3, 0, 5, 1, 10, 9, 22]
            }
        },
        mounted() {
            this.createChart();
        },
        methods: {
            createChart() {

                let options = this.chartOptions();
                let chart = new ApexCharts(document.querySelector('#' + this.id), options);
                chart.render()

            },
            chartOptions() {
                return {
                    chart: {
                        sparkline: {
                            enabled: true
                        },
                    },
                    colors: [this.color],
                    stroke: {
                        curve: 'straight'
                    },
                    fill: {
                        opacity: 0.6
                    },
                    theme: {
                        material: {
                            enabled: true,
                            color: this.color,
                            shadeTo: 'light',
                            shadeIntensity: 0.65
                        }
                    },
                    series: [{
                        name: this.name,
                        data: this.data
                    }],
                }
            }
        }
    }
</script>

<style scoped>

</style>