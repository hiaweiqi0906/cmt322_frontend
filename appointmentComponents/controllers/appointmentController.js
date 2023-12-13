
// To create a pie chart
const createPieChart = (id) => {
    var options = {
        chart: {
            type: 'donut',
            height: '90%',
        },
        plotOptions: {
            pie:{
                donut:{
                    labels: {
                        show: true,
                        name:{
                            show: true
                        },
                        value:{
                            show: true
                        },
                        total: {
                            show: true,
                            label: 'Total Appointments'
                        }
                    }
                }
            }
        },
        series: [44, 55, 13, 33],
        labels: ['Apple', 'Mango', 'Orange', 'Watermelon']
    }
    
    var chart = new ApexCharts(document.getElementById(id), options);
    
    chart.render();
}

// To create an area chart
const createAreaChart = (id) => {
    options = {
        series: [{
            data: [3,1,2,6,5]
        }],
        chart: {
            type: 'area',
            height: '90%',
            zoom: {
            enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        labels: ['2023-12-12', '2023-12-13', '2023-12-14', '2023-12-15', '2023-12-16'],
        xaxis: {
            type: 'datetime',
        },
        legend: {
            horizontalAlign: 'left'
        }
    };
    
    var chart = new ApexCharts(document.getElementById(id), options);
    chart.render();
}

// To create a calendar
const createCalendar = (id) => {
    var calendarEl = document.getElementById(id);

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        aspectRatio: 1.5,
        timeZone: 'UTC',
        eventClick: function(info) {
            alert('Event: ' + info.event.title);
        
            // change the border color just for fun
            info.el.style.borderColor = 'red';
        },
        eventTimeFormat: {
            hour: 'numeric',
            minute: '2-digit',
            meridiem: 'short'
          },
        events: [
            {
              title: 'Event 1',
              start: '2023-12-01T12:30',
              end: '2023-12-01T15:30',
              color: 'red'
            },
            {
                title: 'Event 3',
                start: '2023-12-01'
            },
            {
                title: 'Event 4',
                start: '2023-12-01'
            },
            {
                title: 'Event 5',
                start: '2023-12-01'
            },
            {
                title: 'Event 6',
                start: '2023-12-01'
            },
            {
              title: 'Event 2',
              start: '2023-12-05',
              end: '2023-12-07'
            },
            // Add more events as needed
          ]
      });

    calendar.render();
}
