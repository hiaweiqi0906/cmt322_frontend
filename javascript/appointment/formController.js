// To initialize the attendee select options
const initAttendeesOptions = (id, userList) => {
  const selectElement = document.getElementById(id);

  userList.forEach(attendee => {
    // Add the options to the select
    const option = new Option(attendee, attendee);
    selectElement.add(option);
  })

  // Create the select component using dselect
  dselect(selectElement, {
    search: true,
    maxHeight: '150px'
  })

}


// To set the date picker's value
const setDate = (id, value) => {
  $('#' + id).datepicker('setDate', value);
}


// To disable the date before the value given
const setStartDate = (id, value) => {
  $('#' + id).datepicker('setStartDate', value);
}


// To initialize the date picker with some settings, then set the default value
const initDatePicker = (id, value = moment()) => {
  value = value.format('YYYY-MM-DD');

  $('#' + id).datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true,
    startDate: value
  })

  setDate(id, value);
}


// Create end date respond to the start date, to ensure the end date is not before the start date
const activateRespondEndDate = (start_date_id, end_date_id) => {

  // Event listener: When the start date change, check and change the end date
  $('#' + start_date_id).datepicker().on('changeDate', function (e) {
    const startDateValue = e.format();

    var endDateValue = $('#' + end_date_id).datepicker('getDate');
    endDateValue = moment(endDateValue).format('YYYY-MM-DD')

    // If the end date is before the start date, set the end date same as the start date and update the disable date
    if(moment(endDateValue).isBefore(startDateValue)){
      setDate(end_date_id, startDateValue);
      setStartDate(end_date_id, startDateValue);
    }
    else{
      setStartDate(end_date_id, startDateValue);  // Else, just update the disabled date
    }
  });
}


// To get the current time and round to 30 minutes, for example, 3:15 PM, it return the value 3:30 PM
const getCurrentForStartTime = () => {
  // Get the current date and time
  const currentDate = new Date();
  
  // Extract current hour and minute
  let currentHour = currentDate.getHours();
  let currentMinute = currentDate.getMinutes();

  // Adjust minute to the nearest 30
  if (currentMinute >= 1 && currentMinute <= 29) {
    currentMinute = 30;
  } else if (currentMinute >= 31 && currentMinute <= 59) {
    currentMinute = 0;

    // Increment hour by 1
    currentHour += 1;
  }

  // To identify the time is AM or PM
  const period = currentHour < 12 ? 'AM' : 'PM';

  // Ensure the hour stays within the 12-hour format
  currentHour = currentHour % 12 || 12;

  const value = currentHour + ':' + (currentMinute === 0 ? '00' : currentMinute) + ' ' + period;
  return value;
}


// To initialize the start time options
const initStartTime = (id, isNextDay) => {
  const startTimeSelect = document.getElementById(id);
  let selectValue;

  // If next day, the default start time value is 8:00 AM
  if(isNextDay){
    selectValue = '8:00 AM';
  }
  // Else, based on the current time, and make nearest time if necessary
  else{
    selectValue = getCurrentForStartTime();
  }
  

  // Generate a range of option from 8 AM to 5:30 PM, step is 30 minutes
  for (let hours = 8; hours <= 17; hours++) {
    for (let minutes = 0; minutes < 60; minutes += 30) {
        const period = hours < 12 ? 'AM' : 'PM';
        const hour12 = hours % 12 || 12; // Convert 12 hours format
        const time = hour12 + ':' + (minutes === 0 ? '00' : minutes) + ' ' + period;
        const option = document.createElement('option');
        option.value = time;
        option.text = time.replace(' ', '\u00A0'); // Replace space with non-breaking space to prevent unexpected behaviour

        if(time === selectValue){
          option.selected = true;
        }

        startTimeSelect.add(option);
    }
  }

  // Create the select component using dselect
  dselect(startTimeSelect, {
    maxHeight: '150px'
  })

}


// To add 30 minutes for the time value
const add30Minutes = (value) => {
  
  // Parse the input time string using Moment.js
  const inputTime = moment(value, 'h:mm A');

  // Add 30 minutes
  const resultTime = inputTime.add(30, 'minutes');

  // Format and return the result
  return resultTime.format('h:mm A');

}


// To initialize the end time options based on the selected start time option
const initEndTime = (startTimeID, endTimeID) => {
  const startTimeSelect = document.getElementById(startTimeID);
  const endTimeSelect = document.getElementById(endTimeID);

  const startTimeValue = startTimeSelect.value;       // Get the start time value
  const endTimeValue = add30Minutes(startTimeValue);  // Get the end time value, later selected

  endTimeSelect.innerHTML = ''; // Clear all existing options

  let optionFlag = false;   // To indicate the options can be added to the select element

  for (let hours = 8; hours <= 17; hours++) {
    for (let minutes = 0; minutes < 60; minutes += 30) {
        const period = hours < 12 ? 'AM' : 'PM';
        const hour12 = hours % 12 || 12; // Convert 0 to 12
        const time = hour12 + ':' + (minutes === 0 ? '00' : minutes) + ' ' + period;

        if(time === startTimeValue){
          optionFlag = true;
        }
        
        if(optionFlag){
          const option = document.createElement('option');
          option.value = time;
          option.textContent = time.replace(' ', '\u00A0'); // Replace space with non-breaking space to prevent unexpected behaviour

          if(time === endTimeValue){
            option.selected = true;
          }

          endTimeSelect.add(option);
        }
        
    }
  }

  // Create the select component using dselect
  dselect(endTimeSelect, {
    maxHeight: '150px'
  })
}


// Activate end time responding to the start time
const activateRespondEndTime = (startTimeID, endTimeID) => {
  document.getElementById(startTimeID).addEventListener('change', () => {
    initEndTime(startTimeID, endTimeID);
  });
}


// To initialize all the date and time
const initDateAndTime = (startDateID, startTimeID, endDateID, endTimeID) => {

  // Get the current time in the format HH:mm A (12-hour format)
  const currentTime = moment().format('h:mm A');

  // Define the cutoff time as 5:30 PM
  const cutoffTime = '5:30 PM';

  // Compare the current time with the cutoff time
  const isAfterCutoff = moment(currentTime, 'h:mm A').isAfter(moment(cutoffTime, 'h:mm A'));

  // If is exceed the cutoff time, then set the start date to next day
  if(isAfterCutoff){
    // Get the tomorrow date, and initialize the start date and end date value, and activate responding end date
    const tomorrowDay = moment().add(1, 'days');
    initDatePicker(startDateID, tomorrowDay);
    initDatePicker(endDateID, tomorrowDay);

    initStartTime(startTimeID, true);
    initEndTime(startTimeID, endTimeID);
  }
  // Else, current date
  else{
    // Default value is current date when initializing the date pickers, also activate the responding end date
    initDatePicker(startDateID);
    initDatePicker(endDateID);

    initStartTime(startTimeID, false);
    initEndTime(startTimeID, endTimeID);
  }
}


// To show or hide the time pickers
const timePickerSwitch = (isChecked, startTimeDiv, endTimeDiv) => {
  // If the switch is on, hide the time pickers
  if(isChecked){
    document.getElementById(startTimeDiv).style.display = 'none';
    document.getElementById(endTimeDiv).style.display = 'none';
  }
  // Else, show the time pickers
  else{
    document.getElementById(startTimeDiv).style.display = 'block';
    document.getElementById(endTimeDiv).style.display = 'block';
  }
}


// To check the title input
const checkTitle = (titleElement) => {

  // Get the value and trim it (remove the spaces in front and behind the text)
  const titleValue = titleElement.value.trim();

  // If no value, set is-invalid and remove the is-valid class
  if(titleValue === ''){
    titleElement.classList.remove('is-valid');
    titleElement.classList.add('is-invalid');
  }
  // Else set is-valid and remove the is-invalid class
  else{
    titleElement.classList.remove('is-invalid');
    titleElement.classList.add('is-valid');
  }

}


// To check the attendees select input
const checkAttendees = (attendeesElement) => {
  const attendeesList = [];

  // Check each of the options, add the selected option to the array
  for (var i = 0; i < attendeesElement.options.length; i++) {
      if (attendeesElement.options[i].selected) {
        attendeesList.push(attendeesElement.options[i].value);
      }
  }

  // If the array does not have any option, then set is-invalid and remove is-valid class
  if(attendeesList.length == 0){
    attendeesElement.classList.remove('is-valid');
    attendeesElement.classList.add('is-invalid');
  }
  // Else, set is-valid and remove is-invalid class
  else{
    attendeesElement.classList.remove('is-invalid');
    attendeesElement.classList.add('is-valid');
  }

}


// To check the location input
const checkLocation = (locationElement) => {
  // Get the value and trim it (remove the spaces in front and behind the text)
  const locationValue = locationElement.value.trim();

  // If no value, set is-invalid and remove the is-valid class
  if(locationValue === ''){
    locationElement.classList.remove('is-valid');
    locationElement.classList.add('is-invalid');
  }
  // Else set is-valid and remove the is-invalid class
  else{
    locationElement.classList.remove('is-invalid');
    locationElement.classList.add('is-valid');
  }
}


// To check the details textarea input
checkDetails = (detailsElement) => {
  // Get the value and trim it (remove the spaces in front and behind the text)
  const detailsValue = detailsElement.value.trim();

  // If no value, set is-invalid and remove the is-valid class
  if(detailsValue === ''){
    detailsElement.classList.remove('is-valid');
    detailsElement.classList.add('is-invalid');
  }
  // Else set is-valid and remove the is-invalid class
  else{
    detailsElement.classList.remove('is-invalid');
    detailsElement.classList.add('is-valid');
  }
}


// To validate each of the form element, then submit the form
// Note: start date, start time, end date, end time and all-day switch don't need to check validity
const submitAppointmentForm = (titleID, attendeeSelectID, locationID, detailsID, 
  startDateID, startTimeID, endDateID, endTimeID, allDaySwitchID) => {

  const titleElement = document.getElementById(titleID);
  const titleIsValid = titleElement.classList.contains('is-valid');

  const attendeeSelectElement = document.getElementById(attendeeSelectID);
  const attendeeSelectIsValid = attendeeSelectElement.classList.contains('is-valid');

  const locationElement = document.getElementById(locationID);
  const locationIsValid = locationElement.classList.contains('is-valid');

  const detailsElement = document.getElementById(detailsID);
  const detailsIsValid = detailsElement.classList.contains('is-valid');

  const startDateElement = $('#' + startDateID)
  const startTimeElement = document.getElementById(startTimeID);
  const endDateElement = $('#' + endDateID)
  const endTimeElement = document.getElementById(endTimeID);
  const allDaySwitchElement = document.getElementById(allDaySwitchID); 

  // If the inputs are valid, then extract the data and send to backend
  if(titleIsValid && attendeeSelectIsValid && locationIsValid && detailsIsValid){
    const switchIsChecked = allDaySwitchElement.checked;

    const title = titleElement.value.trim();
    const attendees = [];
    const location = locationElement.value.trim();
    const dateStart = moment(startDateElement.datepicker('getDate')).format('YYYY-MM-DD');
    const timeStart = switchIsChecked? '' : startTimeElement.value;
    const dateEnd = moment(endDateElement.datepicker('getDate')).format('YYYY-MM-DD');
    const timeEnd = switchIsChecked? '' : endTimeElement.value;
    const details = detailsElement.value.trim();
    const status = 'scheduled';

    for (var i = 0; i < attendeeSelectElement.options.length; i++) {
      if (attendeeSelectElement.options[i].selected) {
        attendees.push({
          name: attendeeSelectElement.options[i].value,
          response: 'pending'
        });
      }
    }

    appointment = {
      creator: '',
      title: title,
      attendees: attendees,
      location: location,
      dateStart: dateStart,
      timeStart: timeStart,
      dateEnd: dateEnd,
      timeEnd: timeEnd,
      details: details,
      status: status
    }

    axios.post('http://localhost:6500/api/appointments', appointment)
    .then((response) => {
      console.log(response.data);
    }).catch((err) => {
      console.log('Error when initializing data', err);
  });
  }
  // Check the validity of inputs
  else{
    checkTitle(titleElement);
    checkAttendees(attendeeSelectElement);
    checkLocation(locationElement);
    checkDetails(detailsElement);
  }
    
}
