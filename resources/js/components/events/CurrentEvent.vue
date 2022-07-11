<template>
   <div>
        <h1 class="text-white">{{ event.title }}</h1>
        <h3 class="text-white"> {{ event.description }} </h3>
    </div>
</template>

<script>
export default {

    data() {
        return {
            event: [],
        }
    },

    mounted() {
        this.getCurrentEvent()
    },

    methods: {
        getCurrentEvent() {
            axios.get(`/api/current-event`)
            .then(response => {
                this.event = response.data
                console.log('check current event: ', this.event)
            })
        }
    }
}
</script>