<template>
    <div>
        <ul class="calendar-list">
            <EventItem v-bind:key="day.id" v-for="day in days" v-bind:day="day" />
        </ul>
        <!--<table class="table content-scroll">
            <tbody>
            <tbody>
                <tr v-bind:key="n" v-for="n in ranges">
                    <td>{{ n }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>-->
    </div>
</template>

<script>
import EventItem from './EventItem.vue';

export default {
    name: 'Events',
    components: {
        EventItem
    },
    props: ["events", "days"],
    methods: {
        addNewEvent() {
            let tmp = {
                description: 'test 1',
                days: 'test 1',
                start_date: 'test 1',
                end_date: 'test 1',
            };
            this.events = [tmp];
        }
    },
    created() {
        //this.range = d.getDate();
        
    }
}
</script>

<style scoped>
ul.calendar-list {
    list-style-type: none;
    padding: 0;
    margin:0;
}


</style>

