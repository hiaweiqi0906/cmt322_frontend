<!DOCTYPE html>

<html lang="en">
  <head>
    <?php include "../../components/common/header.php"; ?>      <!-- Common header file-->
    <?php include "../../components/appointment/header.php" ?>  <!-- Appointment specific header file -->
    <?php include "../../components/common/scripts.php"; ?>     <!-- Common script -->
    <title>Appointments</title>

    <script>
      checkProtectedRoutes();
    </script>
  </head>

  <body>

    <!-- Navigation bar -->
    <?php include "../../components/common/navbar.php"; ?>

    <!-- A container to move all the content in center and 80% width -->
    <div id='appointment-mainContainer'>

      <div class='mb-3'>
        <h1 class="h1-main-title">Appointments</h1>
        <h2 class="h2-user-greeting">Greeting, user!</h2>
      </div>

      <?php include "../../components/appointment/modal.php"; ?>   <!-- The Bootstrap Modal form -->

      <!-- Button to trigger modal -->
      <button type='button' id='appointment-newAppointmentButton' class='btn btn-primary mb-3' data-bs-toggle='modal' data-bs-target='#multiAppointmentModal'>
        <i class='bi bi-plus-square' aria-label='plus-square icon'></i>
        New Appointment
      </button>

      <!-- The charts and calendar place-->
      <?php include "../../components/appointment/charts.php"; ?>
      <?php include "../../components/appointment/calendar.php"; ?>
        
      
    </div>


    <?php include "../../components/appointment/script.php"; ?>   <!-- appointment specific script -->

    <script>
      $('.h2-user-greeting').text(renderUserGreeting())
    </script>
  </body>
</html>