<!DOCTYPE html>

<html lang="en">
  <head>
    <?php include "../../components/header.php"; ?>             <!-- Common header file-->
    <?php include "../../components/appointment/header.php" ?>  <!-- Appointment specific header file -->
  </head>

  <body>

    <!-- A container to move all the content in center and 80% width -->
    <div id='appointment-container'>
      <div class='container mt-3'>    <!-- The Bootstrap container -->
        
        <?php include "../../components/appointment/modal.php"; ?>   <!-- The Bootstrap Modal form -->

        <!-- Button to trigger modal -->
        <button type='button' class='btn btn-primary mb-3 button1' data-bs-toggle='modal' data-bs-target='#appointmentModal'>
          <i class='bi bi-plus-square' aria-label='plus-square icon'></i>
          New Appointment
        </button>

        <!-- The charts and calendar place-->
        <?php include "../../components/appointment/charts.php"; ?>
        <?php include "../../components/appointment/calendar.php"; ?>
        
      </div>
    </div>


    <?php include "../../components/scripts.php"; ?>              <!-- Common script -->
    <?php include "../../components/appointment/script.php"; ?>   <!-- appointment specific script -->
  </body>
</html>