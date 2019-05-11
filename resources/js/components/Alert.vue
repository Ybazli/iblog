<script>
    export default {
        name: "Alert.vue",
        props:['message' , 'type' , 'timeout'],
        mounted() {
            new Noty({
                type : this.type,
                text: this.message,
                theme: 'sunset',
                layout: 'bottomLeft',
                timeout: this.timeout  ? this.timeout : false

            }).show();
        }
    }
</script>