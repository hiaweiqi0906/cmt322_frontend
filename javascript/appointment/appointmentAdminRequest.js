
username = "Pikachu";

// Get all data from database once the page is loaded, 
// the data used for creating the charts, admin's personal calendar and initialize the select options
document.addEventListener('DOMContentLoaded', function () {

  initSelect('attendees-select', username); // Initialize select options

  axios.get('http://localhost:9000/appointments/admin/' + username)
    .then((response) => {
      return response.data;
    })
    .then((data) => {   // Once data is available
      createPieChart('pie-chart', data);    // Create pie chart
      createAreaChart('area-chart', data);  // Create area chart
      createCalendar('calendar-admin', data, username, true);   // Create calendar
    })
    .catch((err) => {
      console.error('Error when initializing admin page', err)
    });

})