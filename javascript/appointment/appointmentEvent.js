// Send axios request when the page is loaded, and do initialization for the form
document.addEventListener('DOMContentLoaded', function () {

  // To get the appointments, display them in charts and calendar
  axios.get('http://localhost:6500/api/appointments')
    .then((response) => {
      const { username, isAdmin, appointments } = response.data;

      createPieChart('pie-chart', appointments);                    // Create pie chart
      createAreaChart('area-chart', appointments);                  // Create area chart
      createCalendar('calendar', appointments, username, isAdmin);  // Create calendar

    }).catch((err) => {
      console.log('Error when initializing data', err);
  });
  

  // To check the user's role, then decide want to display or hide the charts
  axios.get('http://localhost:6500/api/appointments/isAdmin')
    .then((response) => {
      const isAdmin = response.data;

      displayCharts(isAdmin);  // To show or hide the charts

    }).catch((err) => {
      console.log('Error when checking is admin', err);
  });


  // To send get request to get the attendee options list from server except the user himself/herself
  axios.get('http://localhost:6500/api/appointments/userlist')
    .then((response) => {
      const userList = response.data;

      initAttendeesOptions('attendees-select', userList); // Initialize select options
      
    })
    .catch((err) => {
      console.log('Error fetching user list', err)
  });

  
  // Initialize the Bootstrap tooltip before using it
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

  // Initialize all the default value for the form
  initDateAndTime('start-date', 'start-time', 'end-date', 'end-time');

  // Add event listener to the end date so it can respond to the start date
  activateRespondEndDate('start-date', 'end-date');

  // Add event listener to the end time so it can respond to the start time
  activateRespondEndTime('start-time', 'end-time');
})


// To control the displaying of the time pickers based on the switch
document.getElementById('all-day').addEventListener('change', (event) => {
  timePickerSwitch(event.target.checked, 'start-time-div', 'end-time-div');
});


// Add event listener to the button of the form 
//(It will have many different types of events based on the type of the form)
document.getElementById('form-event-button').addEventListener('click', () => {
  formType = document.getElementById('modal-title').innerText

  switch(formType){

    case 'New Appointment':
      submitAppointmentForm('title', 'attendees-select', 'location', 'details', 
      'start-date', 'start-time', 'end-date', 'end-time', 'all-day');
      break;
    
    default:
      console.error('No case matching to the form type');

  }
})

// Add a real-time validation event for the title input
document.getElementById('title').addEventListener('input', () => {
  titleElement = document.getElementById('title');
  checkTitle(titleElement);
})


// Add a real-time validation event for the attendees select input
document.getElementById('attendees-select').addEventListener('change', () => {
  attendeeSelectElement = document.getElementById('attendees-select');
  checkAttendees(attendeeSelectElement);
})

// Add a real-time validation event for the location input
document.getElementById('location').addEventListener('input', () => {
  locationElement = document.getElementById('location');
  checkLocation(locationElement);
})


// Add a real-time validation event for the details textarea input
document.getElementById('details').addEventListener('input', () => {
  detailsElement = document.getElementById('details');
  checkDetails(detailsElement);
})

