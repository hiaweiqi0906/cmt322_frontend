
// To create a pie chart
const createPieChart = (id, appointments) => {

    // To get the number of scheduled appointments and cancelled appointments
    const scheduledAppointments = appointments.filter(appointment => appointment.status === 'scheduled').length;
    const cancelledAppointments = appointments.length - scheduledAppointments;

    // Pie chart settings
    var options = {
        chart: {
            type: 'donut',      // Use donut chart
            height: '90%',      // The height of the chart
        },
        plotOptions: {
            pie:{
                donut:{
                    labels: {           // To show the total number of appointments in the center of the pie chart
                        show: true,
                        name:{
                            show: true
                        },
                        value:{
                            show: true
                        },
                        total: {
                            show: true,
                            fontSize: '14px',
                            label: 'Total Appointments'
                        }
                    },
                },
            },
        },
        labels: ['Scheduled Appointments', 'Cancelled Appointments'],   // Category label
        series: [scheduledAppointments, cancelledAppointments]          // The value for each category
    }
    
    var chart = new ApexCharts(document.getElementById(id), options);   // Apply the chart to the id
    
    chart.render();     // Render the chart
}

// To create an array of current week dates
const createWeekDates = () => {
    
    const today = moment();

    // Calculate the start date of the current week (Sunday)
    const sundayOfThisWeek = today.clone().startOf('week');

    // Generate an array to store the dates for each day of the week
    const weekDates = [];

    // Add to the array with dates for each day of the week
    for (let i = 0; i < 7; i++) {
        const currentDate = sundayOfThisWeek.clone().add(i, 'days');
        const formattedDate = currentDate.format('YYYY-MM-DD');
        weekDates.push(formattedDate);
    }
    
    return weekDates;
}

// To create an area chart
const createAreaChart = (id, appointments) => {

    // To get the scheduled appointments
    const scheduledAppointments = appointments.filter(appointment => appointment.status === 'scheduled');
    
    // Get the week dates
    const weekDates = createWeekDates();

    // Hold the number of appointments for each day of the week
    const appointmentsByWeekDates = [];

    // To get the number of appointments for each day of the week
    weekDates.forEach(date => {
        const numberOfAppointments = scheduledAppointments.filter(appointment => appointment.dateStart === date).length;
        appointmentsByWeekDates.push(numberOfAppointments);
    });

    // Area chart settings
    options = {
        chart: {
            type: 'area',   // USe Area chart
            height: '90%',  // The height of the chart
            zoom: {         
            enabled: false  // Disable the zoom functionality
            }
        },
        dataLabels: {   
            enabled: false  // Disable the label for each data's value
        },
        markers: {          // Show the markers for each data
            size: 6
        },
        stroke: {           // The line style
            curve: 'straight'
        },
        tooltip: {
            y: {
                formatter: function(value) {        // To ensure the value is integer
                    return value;
                }
            }
        },
        xaxis: {
            categories: weekDates,       // x-axis
            labels: {
                formatter: function(value) {
                    return moment(value).format("DD MMM");   // Change the format, example 12 Dec
                }
            }
        },
        series: [{
            name: 'Appointments',
            data: appointmentsByWeekDates  // y-axis
        }],
        
    };
    
    var chart = new ApexCharts(document.getElementById(id), options);   // Apply the chart to the id

    chart.render();     // Render the chart
}

// To format the time
// For example 2023-12-12 4 PM to 2023-12-12T16:00 (used for calendar)
const formatTime = (date, time) => {

    if(time){
        const dateAndTime = `${date} ${time}`;
        return moment(dateAndTime, 'YYYY-MM-DD h:mm A').format('YYYY-MM-DDTHH:mm');
    }
    else
        return date;
}

// To compare the end date and time is before current date and time
const compareBeforeCurrentTime = (endTime) => {
    const currentTime = moment();   // Get the current date and time

    // Special case for all day event time, if it don't have time and compare to current time, it return true although they are current day
    if(!endTime.includes('T'))  
        endTime = endTime + 'T24:00'

    return moment(endTime).isBefore(currentTime);
}

// To create a calendar
const createCalendar = (id, appointments, username, needFilter) => {

    // If the appointments haven't filter for the user, do filtering based on the username and appointment's status
    // Note: there are two cases, one case is request for all data for admin page, then need to filter here,
    //       another case is request for specific user's appointment (already filter in backend side), 
    //       don't need to filter here
    if(needFilter){
        appointments = appointments.filter(appointment =>
            (appointment.creator === username ||    // If the user is creator or attendee of an appointment
            appointment.attendees.some(attendee => attendee.name === username)) &&
            appointment.status === 'scheduled'      // If the appointment is scheduled (not cancelled)
        )
    }  

    // To hold the event for the user
    const events = appointments.map(appointment => {                  // Extract the data needed for an event object
            const isCreator = appointment.creator === username;
            
            const end = formatTime(appointment.dateEnd, appointment.timeEnd);
            const isBeforeCurrentTime = compareBeforeCurrentTime(end);  // To check the event is over

            let backgroundColor, textColor, borderColor, classNames;

            if(isCreator){      // If the user is creator
                if(isBeforeCurrentTime){    // If the event is over, change to light green color
                    backgroundColor = '#00CC0033';
                    borderColor = '#00CC0066';
                    textColor = '#00000066'
                    classNames = ['fc-event-transparent']
                }
                else{
                    backgroundColor = '#0C0';
                    borderColor = '#00CC00B3'
                }
            }
            else{
                // To get the user's response
                const userResponse = appointment.attendees.find(attendee => attendee.name === username).response;

                switch(userResponse){       // Based on the user's response, set the color for the event
                    case 'accepted':
                        if(isBeforeCurrentTime){
                            backgroundColor = '#00CC0033';
                            borderColor = '#00CC0066';
                            textColor = '#00000066'
                            classNames = ['fc-event-transparent']
                        }
                        else{
                            backgroundColor = '#0C0';
                            borderColor = '#00CC00B3'
                        }
                        break;
                    case 'pending':
                        if(isBeforeCurrentTime){
                            backgroundColor = '#FFA3284D';
                            borderColor = '#FFA32880';
                            textColor = '#00000066'
                            classNames = ['fc-event-transparent']
                        }
                        else{
                            backgroundColor = '#FFA328';
                            borderColor = '#FFA328B3'
                        }
                        break;
                    case 'declined': 
                        if(isBeforeCurrentTime){
                            backgroundColor = '#FF22164D';
                            borderColor = '#FF221666';
                            textColor = '#00000066'
                            classNames = ['fc-event-transparent']
                        }
                        else{
                            backgroundColor = '#FF2216';
                            borderColor = '#FF2216B3'
                        }
                        break;
                }
            }

            return {        // return each event, as a result it is an array of events
                title: appointment.title,
                start: formatTime(appointment.dateStart, appointment.timeStart),
                end: end,
                id: appointment.id,
                backgroundColor: backgroundColor,
                textColor: textColor,
                borderColor: borderColor,
                classNames: classNames,
                appointment: appointment
            }
        });

    console.log(events);

    var calendarEl = document.getElementById(id);

    var calendar = new FullCalendar.Calendar(calendarEl, {
        themeSystem: 'bootstrap5',      // To make the calendar suit to the Boostrap theme
        initialView: 'timeGridWeek',    // The initial view for the calendar
        headerToolbar: {                // The header toolbar above the calendar
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridWeek,listMonth' // The options for the calendar's views
        },
        hiddenDays: [0, 6],                 // To make the calendar only show Monday to Friday in time grid week
        slotMinTime: '08:00:00',            // To start the time from 8 am
        aspectRatio: 1.5,                   // The ratio of width to height
        timeZone: 'UTC',

        // The events to be shown on the calendar
        events: events,

        eventClick: function(info) {
            console.log(info.event.extendedProps.appointment);
        },
      });

    calendar.render();
}
