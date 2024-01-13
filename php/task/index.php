<!DOCTYPE html>

<html lang="en">
  <head>
    <?php include "../../components/common/header.php"; ?>      <!-- Common header file-->
    <?php include "../../components/task/header.php" ?>  <!-- Task specific header file -->
    <?php include "../../components/common/scripts.php"; ?>     <!-- Common script -->
    <title>Tasks</title>

    <script>
      checkProtectedRoutes();
    </script>
  </head>

  <body>

    <!-- Navigation bar -->
    <?php include "../../components/common/navbar.php"; ?>

    <!-- A container to move all the content in center and 80% width -->
    <div id='task-mainContainer'>

      <div class='mb-3'>
        <h1 class="h1-main-title">Tasks</h1>
        <h2 class="h2-user-greeting">Greeting, user!</h2>
      </div>

      <?php include "../../components/task/modal.php"; ?>   <!-- The Bootstrap Modal form -->

      <!-- Button to trigger modal -->
      <button type='button' id='task-newTaskButton' class='btn btn-primary mb-3' data-bs-toggle='modal' data-bs-target='#multiTaskModal'>
        <i class='bi bi-plus-square' aria-label='plus-square icon'></i>
        New Task
      </button>

      <!-- The charts and calendar place-->
      <?php include "../../components/task/charts.php"; ?>
      <?php include "../../components/task/calendar.php"; ?>
        
      
    </div>


    <?php include "../../components/task/script.php"; ?>   <!-- task specific script -->

    <script>
      $('.h2-user-greeting').text(renderUserGreeting())
    </script>
  </body>
</html>