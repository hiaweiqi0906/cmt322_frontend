<!-- Modal -->
<div class='modal fade' id='appointmentModal' data-bs-backdrop="static" data-bs-keyboard="false" tabindex='-1' aria-labelledby='appointmentModalLabel' aria-hidden='true'>

  <!-- Locate large modal at center and scrollable -->
  <div class='modal-dialog modal-lg'>

    <!-- Content for the modal -->
    <div class='modal-content'>

      <!-- Header of the modal -->
      <div class='modal-header'>
        <h1 class='modal-title fs-5' id='modal-title'>New Appointment</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>

      <!-- Body content of the modal -->
      <div class='modal-body'>

        <form id='appointment-form'>

          <!-- The title input section -->
          <div class='row mb-3'>
            <label for='title' class='col-sm-2 col-form-label'>Title</label>

            <div class='col-sm-8'>
              <input type='text' class='form-control' id='title' name='title' placeholder='Add title' required>

              <div class="invalid-feedback">
                Please provide a valid title.
              </div>
            </div>
          </div>

          <!-- The attendees select options -->
          <div class='row mb-3'>
            <label for='attendees-select' class='col-sm-2 col-form-label'>Attendees</label>

            <div class='col-sm-8'>
              <select class='form-select' id='attendees-select' name='attendees-select' multiple required>
                <option value="">Add attendees</option>
              </select>

              <div class="invalid-feedback">
                Please select at least one attendee.
              </div>
            </div>

            <div class='col-sm-8' id='attendee-display-select' style='display:none'>
              <select class='form-select' id='attendees-display' disabled>
              </select>
            </div>

          </div>

          <!-- The start date and time input,  and one hidden disabled start time display (used for showing value only) -->
          <div class='row mb-3'>
            <label class='col-sm-2 col-form-label'>Start</label>

            <div class='col-lg-3 col-md-4 col-sm-4 col-4'>
              <input type='text' class='form-control' id='start-date' name='start-date'>
            </div>

            <div class='col-lg-2 col-md-3 col-sm-3 col-3 px-1' id='start-time-div'>
              <select  class='form-select' id='start-time' name='start-time'>
              </select>
            </div>

            <div class='col-lg-2 col-md-3 col-sm-3 col-3 px-1' id='start-time-display-div' style='display:none'>
              <select  class='form-select' id='start-time-display' disabled>
              </select>
            </div>

          </div>

          <!-- The end date and time input, and one hidden disabled end time display (used for showing value only) -->
          <div class='row mb-3'>
            <label class='col-sm-2 col-form-label'>End</label>

            <div class='col-lg-3 col-md-4 col-sm-4 col-4'>
              <input type='text' class='form-control' id='end-date' name='end-date'>
            </div>

            <div class='col-lg-2 col-md-3 col-sm-3 col-3 px-1' id='end-time-div'>
              <select  class='form-select' id='end-time' name='end-time'>
              </select>
            </div>

            <div class='col-lg-2 col-md-3 col-sm-3 col-3 px-1' id='end-time-display-div' style='display:none'>
              <select  class='form-select' id='end-time-display' disabled>
              </select>
            </div>

            <!-- The All day switch-->
            <div class='col-lg-2 col-md-3 col-sm-3 col-3 d-flex align-items-center' id='switch-display-div'>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="all-day">
                <label class="form-check-label" for="all-day">All day</label>
              </div>
            </div>

          </div>

          <!-- The appointment location input -->
          <div class='row mb-3'>
            <label for='location' class='col-sm-2 col-form-label'>Location</label>

            <div class='col-sm-8'>
              <input type='text' class='form-control' id='location' name='location' placeholder='Add location' required>
            
              <div class="invalid-feedback">
                Please provide a valid location.
              </div>
            </div>
            
          </div>

          <!-- The appointment details input -->
          <div class='row mb-3'>
            <label for='details' class='col-sm-2 col-form-label'>Details</label>

            <div class='col-sm-8'>
              <textarea class='form-control' id='details' name='details' rows='3' placeholder='Write more details for this appointment' required></textarea>
              
              <div class="invalid-feedback">
                Please provide some details.
              </div>
            </div>
            
          </div>
          
        </form>

      </div>

      <!-- Footer of the modal -->
      <div class='modal-footer'>
        <button type='button' class='btn btn-light button2' data-bs-dismiss='modal'>Close</button>
        <button type='button' id='form-event-button' class='btn btn-primary button1'>Save</button>
      </div>

    </div>

  </div>

</div>