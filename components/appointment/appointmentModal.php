<!-- Modal -->
<div class='modal fade' id='appointmentModal' tabindex='-1' aria-labelledby='appointmentModalLabel' aria-hidden='true'>

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

        <form>

          <!-- The title input section -->
          <div class='row mb-3'>
            <label for='title' class='col-sm-2 col-form-label'>Title</label>

            <div class='col-sm-8'>
              <input type='text' class='form-control' id='title' placeholder='Add title' required>
            </div>
          </div>

          <div class='row mb-3'>
            <label for='attendees-select' class='col-sm-2 col-form-label'>Attendees</label>

            <div class='col-sm-8'>
              <select class="form-select" id="attendees-select" multiple required>
              </select>
            </div>

          </div>

          <div class='row mb-3'>
            <label for='venue' class='col-sm-2 col-form-label'>Venue</label>

            <div class='col-sm-8'>
              <input type='text' class="form-control" id="venue" placeholder='Add Venue' required>
            </div>
            
          </div>

          <div class='row mb-3'>
            <label for='dateAndTime' class='col-sm-2 col-form-label'>Date & Time</label>

            <div class="input-group log-event" id="datetimepicker1" data-td-target-input="nearest" data-td-target-toggle="nearest">
              <input id="datetimepicker1Input" type="text" class="form-control" data-td-target="#datetimepicker1">
              <span class="input-group-text" data-td-target="#datetimepicker1" data-td-toggle="datetimepicker">
                <i class="fas fa-calendar"></i>
              </span>
            </div>

            <div class='col-sm-8'>
              
            </div>
            
          </div>
          

        </form>

      </div>

      <!-- Footer of the modal -->
      <div class='modal-footer'>
        <button type='button' class='btn btn-light button2' data-bs-dismiss='modal'>Close</button>
        <button type='button' class='btn btn-primary button1'>Save changes</button>
      </div>

    </div>

  </div>

</div>