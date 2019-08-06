<template>
    <div class="potlet">
        <div class="d-block potlet-header">
            <h3>Calendar</h3>					
        </div>
        <div class="row box-shadow-container">
        
            <div class="col-md-3">
                <EventsForm v-on:add-event="addEvent"/>
            </div>

            
            <div class="col-md-9" >
                <div class="scrollable">
                    <h2 class="no-select">{{ this.monthNames[this.currDate.getMonth()] }} {{ this.currDate.getFullYear() }}</h2>
                    <!--<Events v-bind:events="events"/>-->
                    <Events v-bind:days="days"/>
                </div>
                
            </div><!--box-shadow-container -->
        </div><!-- Portlet -->
    </div>
</template>

<script>
import EventsForm from './EventsForm.vue';
import Events from './Events.vue';
import { uuid } from 'vue-uuid';

export default {
    name: 'app',
    components: {
        Events,
        EventsForm
    },
    data() {
        return {
            events: [],
            ranges: {
                d1: '',
                d2: ''
            },
            days: [],
            currDate: new Date(),
            monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            minDate: new Date(),
            maxDate: new Date()
        }
    },
    methods: {
        addEvent(newEvent) {
            const { description, days, start_date, end_date } = newEvent;

            window.axios.get('./events/create', {
                params: {
                    description, days, start_date, end_date
                }
            })
                .then(({ data }) => {
                    console.log(data);
                    this.events = [...this.events, data];
                    this.init();
                });
        },
        read() {
            window.axios.get('./events')
                .then(({ data }) => {
                    //console.log(data);
                    this.events = data;
                    console.log(this.events);
                    this.init();
                });
        },
        inDates(checkDate, from, to) {
            return checkDate >= from && checkDate <= to;
        },
        populateCalendar() {
            let d = new Date();
            let str = d.getFullYear() + '-' + (d.getMonth() + 1) + '-1';
            str = str.replace(/\b(\d)\b/g, '0$1');
            
            this.currDate = new Date(str);
            this.minDate = new Date(str);
            this.maxDate = new Date(str);

            console.log('pop', str, 'day', this.currDate.getDay());

            for (let i = 0; i < 12; ++i) {
                this.days.push({
                    id: uuid.v4(),
                    day: this.currDate.getDate(),
                    dayName: this.currDate.getDay(),
                    month: this.currDate.getMonth(),
                    year: this.currDate.getFullYear(),
                    event: ''
                });

                this.currDate.setDate(this.currDate.getDate() + 1);
            }
        },
        init() {
            for (let key in this.days) {
                let str = this.days[key].year + '-' +(this.days[key].month + 1) + '-' + this.days[key].day;
                str = str.replace(/\b(\d)\b/g, '0$1');
                let checkDate = new Date(str);
                
                this.checkDayEvent(checkDate, this.days[key]);
            }
        },
        checkDayEvent(checkDate, currDay) {
            let day = checkDate.getDay();
            let hx = 1 << day;
            let hex = parseInt('7f', 16);
            let flag = false;
            let eventName = '';

            for (let k in this.events) {
                if (this.events[k].id < 24) continue;
                let r = this.inDates(checkDate, new Date(this.events[k].start_date), new Date(this.events[k].end_date));
                
                if (r) {
                    hex = parseInt(this.events[k].days, 16);
                    flag = true;
                    eventName = this.events[k].description;
                }
            }

            hx &= hex;

            if (flag && hx > 0) {
                currDay.event = eventName;
            } else {
                currDay.event = '';
            }
        }
    },
    created() {
        this.read();
   
        let obj = this;
        this.populateCalendar();
        
        

        $(document).ready(function() {
            var n = new Noty({
                text: 'NOTY - a jquery notification library!',
                animation: {
                    open: 'animated bounceInLeft', // Animate.css class names
                    close: 'animated bounceOutLeft', // Animate.css class names
                    easing: 'swing', // unavailable - no need
                    speed: 500 // unavailable - no need
                }
            });

            let isDown = false;
            let sx = 0;
            let sy = 0;
            let posTop = 0;
            let height = 0;
            let lo = 0;
            let hival = 0;
            

            $('ul.calendar-list').mousedown(function(e) {
                sx = e.clientX;
                sy = e.clientY;
                isDown = true;

                height = $('li', this).height();
            });

            $('ul.calendar-list').mousemove(function(e) {
                if (isDown) {
                    let dx = e.clientX;
                    let dy = e.clientY;
                    let y = (dy - sy);
                    posTop += y;

                    let top = $(this).position().top;

                    $('li', this).css({
                        top: (top + posTop) + 'px'
                    });

                    if (posTop < hival) {
                        hival -= height;
                        let flag = false;

                        if (hival == -88) {
                            hival = 0;
                            posTop = 0;
                            flag = true;
                        }

                        obj.currDate.setDate(obj.currDate.getDate() + 1);
                        obj.minDate.setDate(obj.minDate.getDate() + 1);

                        let tmp = [...obj.days, {
                            id: uuid.v4(),
                            day: obj.currDate.getDate(),
                            dayName: obj.currDate.getDay(),
                            month: obj.currDate.getMonth(),
                            year: obj.currDate.getFullYear(),
                            event: ''
                        }];

                        tmp.shift();
                        obj.days = [...tmp];
                        obj.checkDayEvent(obj.currDate, obj.days.slice(-1)[0]);

                        if (flag) {
                            $('li', this).css({
                                top: (top + posTop) + 'px'
                            });

                            flag = false;
                        }
                    } else if (posTop > 0 && posTop > lo) {
                        lo += height;
                        let flag = false;

                        if (lo == 88) {
                            lo = 0;
                            posTop = 0;
                            flag = true;
                        }

                        obj.minDate.setDate(obj.minDate.getDate() - 1);
                        obj.currDate.setDate(obj.currDate.getDate() - 1);

                        let tmp = [{
                            id: uuid.v4(),
                            day: obj.minDate.getDate(),
                            dayName: obj.minDate.getDay(),
                            month: obj.minDate.getMonth(),
                            year: obj.minDate.getFullYear(),
                            event: ''
                        }, ...obj.days];

                        tmp.pop();
                        obj.days = [...tmp];
                        obj.checkDayEvent(obj.minDate, obj.days[0]);

                        if (flag) {
                            $('li', this).css({
                                top: (top + posTop) + 'px'
                            });

                            flag = false;
                        }
                    }

                    sy = dy;
                }
            });

            $('ul.calendar-list').mouseup(function(e) {
                isDown = false;
            }); 
            
            $('ul.calendar-list').mouseleave(function(e) {
                isDown = false;
            });

            $('.datepicker').datepicker({
                dateFormat: "yy-mm-dd",
                type: "text"
            });

        });
    }
}
</script>

<style scoped>

</style>




