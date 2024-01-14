<div class="container">
  <div class="calendar">
    <?php
      // Assume we have an array of tasks
      $tasks = [
        [
          'title' => 'Task 1',
          'description' => 'This is task 1',
          'status' => 'todo',
          'assignedBy' => 'Admin',
          'assignedTo' => 'User 1',
          'deadline' => '2022-12-31',
          'taskAssignedDate' => '2023-12-01',
          'acceptanceCriteria' => 'Criteria 1'
        ],
        [
          'title' => 'Task 2',
          'description' => 'This is task 2',
          'status' => 'todo',
          'assignedBy' => 'Admin',
          'assignedTo' => 'User 2',
          'deadline' => '2023-01-31',
          'taskAssignedDate' => '2023-01-01',
          'acceptanceCriteria' => 'Criteria 2'
        ]
        // Add more tasks here...
      ];

      foreach ($tasks as $task) {
        echo "<div class='task'>";
        echo "<h3>" . $task['title'] . "</h3>";
        echo "<p>" . $task['description'] . "</p>";
        echo "<p>Assigned by: " . $task['assignedBy'] . "</p>";
        echo "<p>Assigned to: " . $task['assignedTo'] . "</p>";
        echo "<p>Deadline: " . $task['deadline'] . "</p>";
        echo "<p>Task Assigned Date: " . $task['taskAssignedDate'] . "</p>";
        echo "<p>Acceptance Criteria: " . $task['acceptanceCriteria'] . "</p>";
        echo "</div>";
      }
    ?>
  </div>
</div>

