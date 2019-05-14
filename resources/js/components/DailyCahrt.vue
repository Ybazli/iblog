<template>
    <div class="w-1/3">
        <div class="relative bg-white rounded shadow mb-4 mr-4 p-5" id="d-chart">
            <h3 class="text-xs text-grey-light">Visitors on this Day</h3>
        </div>
    </div>
</template>

<script>
    import ApexCharts from 'apexcharts/dist/apexcharts.common.js';
    export default {
        name: "DailyCahrt.vue",
        data(){
            return{
                data : [0 , 1 , 3 , 0 , 5 , 1 , 10 , 9 , 22]
            }

        },

        mounted() {
            this.chartCreate();
        },
        methods:{
            chartCreate(){
                let options = {
                    chart: {
                        sparkline: {
                            enabled: true
                        },
                    },
                    colors: ['#3f51b5'],
                    stroke: {
                        curve: 'straight'
                    },
                    fill: {
                        opacity: 0.6
                    },
                    theme: {
                        material: {
                            enabled: true,
                            color: '#a02be9',
                            shadeTo: 'light',
                            shadeIntensity: 0.65
                        }
                    },
                    series: [{
                        name: 'Monthly',
                        data: this.data
                    }],

                }
                let chart = new ApexCharts(document.querySelector('#d-chart'), options);
                chart.render();
            }
        }
    }
</script>

<style scoped>

</style>