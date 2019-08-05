<template>
    <form @submit="addEvent" >
        <div class="form-group">
            <label for="event">Event</label>
            <input type="text" class="form-control" v-model="description" name="description" placeholder="My Event" required>
        </div>

        <div class="form-group row">
            <div class="col-sm-6">
                <label for="start_date">From</label>
                <input type="text" id="start_date" class="form-control datepicker" name="start_date" autocomplete="off" required>
            </div>
            <div class="col-sm-6">
                <label for="end_date">to</label>
                <input type="text" id="end_date" class="form-control datepicker" name="end_date" autocomplete="off"  required>
            </div>
        </div>

        <div class="form-group">
            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" id="mon" value="1" name="days" v-model="days">
                <label class="form-check-label" for="mon">Mon</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" id="tue" value="2" name="days" v-model="days">
                <label class="form-check-label" for="tue">Tue</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" id="wed" value="3" name="days" v-model="days">
                <label class="form-check-label" for="wed">Wed</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" id="thur" value="4" name="days" v-model="days">
                <label class="form-check-label" for="thur">Thur</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" id="fri" value="5" name="days" v-model="days">
                <label class="form-check-label" for="fri">Fri</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" id="Sat" value="6" name="days" v-model="days">
                <label class="form-check-label" for="sat">Sat</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" id="sun" value="0" name="days" v-model="days">
                <label class="form-check-label" for="sun">Sun</label>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</template>

<script>
export default {
    name:"events-form",
    data() {
        return {
            description: '',
            days: [],
            start_date: '',
            end_date: ''
        }
    },
    methods: {
        addEvent(e) {
            e.preventDefault();
            alert($('#start_date').val());
            let n = 0;

            for (let key in this.days) {
                n |= 1 << this.days[key];
            }

            let hexstr = n.toString(16).replace(/\b(\w)\b/, '0$1');

            const newEvent = {
                description: this.description,
                days: hexstr,
                start_date: $('#start_date').val(),
                end_date: $('#end_date').val(),
            };

            this.$emit('add-event', newEvent);
        }
    },
    created() {
        // placeholder
        
    }
}
</script>

<style scoped>

</style>
