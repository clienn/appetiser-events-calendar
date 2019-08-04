<template>
    <!--<li v-bind:class="{'has-event': event.id & 1}"><div>{{ event.days }} day</div><div>{{ event.description }}</div></li>-->
    <li class="no-select" v-bind:class="{'has-event': day.event != ''}">
        <div>{{ day.day }} {{ this.dayNames[day.dayName] }}</div>
        <div>{{ day.event }}</div>
    </li>
</template>

<script>
export default {
    name: 'EventItem',
    props: ["event", "day"],
    data() {
        return {
            dayNames: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
        }
    }
}
</script>

<style scoped>
ul.calendar-list li {
	border-top: 1px solid #dee2e6;
    color: #1a483a;
    position:relative;
}

ul.calendar-list li.active {
    color: #1a483a;
    background: #71a0811f;
}

ul.calendar-list li div {
    padding: 0.75rem;
    -webkit-columns: 100px 2;
    -moz-columns: 100px 2;
    columns: 100px 2;
    display: inline-block;
    user-select:none;
}

</style>

