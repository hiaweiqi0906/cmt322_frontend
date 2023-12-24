// To determine whether to dislpay the charts
const displayCharts = (isAdmin) => {

  // If the user is not an admin, hide the charts
  if(!isAdmin){
    document.getElementById('chart-container').style.display = 'none';
  }

}


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
    colors: ['#1C277E', '#3480DF'],
    plotOptions: {
      pie: {
        donut: {
          labels: {           // To show the total number of appointments in the center of the pie chart
            show: true,
            name: {
              show: true
            },
            value: {
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

  // Get the start date of the current week (Sunday)
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
    colors: ['#14529E'],
    dataLabels: {
      enabled: false    // Disable the label for each data's value
    },
    markers: {          // Show the markers for each data
      size: 6
    },
    stroke: {           // The line style
      curve: 'straight'
    },
    tooltip: {
      y: {
        formatter: function (value) {        // To ensure the value is integer
          return value;
        }
      }
    },
    xaxis: {
      categories: weekDates,       // x-axis
      labels: {
        formatter: function (value) {
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