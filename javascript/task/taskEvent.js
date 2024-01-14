// Send axios request when the page is loaded, and do initialization for the form
document.addEventListener('DOMContentLoaded', function () {

    // To check the user's role, then decide want to display or hide the charts
    axios.get('/api/tasks/isAdmin')
      .then((response) => {
        const isAdmin = response.data;
  
        taskChart_displayCharts(isAdmin);  // To show or hide the charts
  
      }).catch((err) => {
        console.log('Error when checking is admin: ', err);
    });
    
    // To get the tasks, display them in charts and calendar
    axios.get('/api/tasks')
      .then((response) => {
        let { username, isAdmin, tasks } = response.data;
  isAdmin=true;
        // If the user is admin, then create the charts and calendar
        if(isAdmin){
          taskChart_createPieChart('task-admin-pieChart', tasks);                    // Create pie chart
          taskChart_createAreaChart('task-admin-areaChart', tasks);                  // Create area chart
          taskCalendar_createCalendar('task-admin-calendar', tasks, username, isAdmin);  // Create calendar
        }
        // Else, only create the calendar
        else{
          taskCalendar_createCalendar('task-admin-calendar', tasks, username, isAdmin);  // Create calendar
        }
  
        endLoader();
  
      }).catch((err) => {
        console.log('Error when first initializing data: ', err);
    });
  
  
    // To send get request to get the attendee options list from server except the user himself/herself
    axios.get('/api/tasks/userlist')
      .then((response) => {
        const userList = response.data;
  
        taskForm_initAttendeesOptions('task-multiForm-attendeesSelect', userList); // Initialize select options
        
      })
      .catch((err) => {
        console.log('Error fetching user list: ', err)
    });
  
    
    // Initialize the Bootstrap tooltip before using it
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
  
    // Initialize all the default value for the form
    taskForm_initDateAndTime('task-multiForm-startDate', 'task-multiForm-startTime', 'task-multiForm-endDate', 'task-multiForm-endTime', true);
  
    // Add event listener to the end date so it can respond to the start date
    taskForm_activateRespondEndDate('task-multiForm-startDate', 'task-multiForm-endDate');
  
    // Add event listener to the end time so it can respond to the start time
    taskForm_activateRespondEndTime('task-multiForm-startTime', 'task-multiForm-endTime');
  })


  