<!-- The container for two charts and calendar -->
<div class='container mt-3'>

  <?php include "../../components/appointment/appointmentModal.php"; ?>

  <!-- Button trigger modal -->
  <button type='button' class='btn btn-primary mb-3 button1' data-bs-toggle='modal' data-bs-target='#appointmentModal'>
    <i class='bi bi-plus-square' aria-label='plus-square icon'></i>
    New Appointment
  </button>

  <div class='row'>

    <!-- The first chart-->
    <div class='col-xl-6'> 
      <div class='card'>

        <div class='card-body'>
          <!-- Title -->
          <h5 class='card-title'>Total Appointment Info</h5>

          <div id='pie-chart' style='height: 41vh'></div>
        
        </div>
      </div>
    </div>

    <!-- The second chart-->
    <div class='col-xl-6'>
      <div class='card'>

        <div class='card-body'>
          <!-- Title -->
          <h5 class='card-title'>Weekly Scheduled Appointment</h5>

          <div id='area-chart' style='height: 41vh'></div>
          
        </div>

      </div>
    </div>

  </div>

  <!-- Calendar -->
  <div class='row mt-3 mb-4'>
    <div class=col>
      <div class='card'>

        <div class='card-body'>

          <div id='calendar-admin' style='height: 50vh'></div>

        </div>

      </div>
    </div>
  </div>

</div>
