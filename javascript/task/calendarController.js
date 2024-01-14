document.addEventListener('DOMContentLoaded', function () {
    // Get all task elements
    const tasks = document.querySelectorAll('.task');
  
    tasks.forEach(task => {
      // Add event listener for each task
      task.addEventListener('click', function() {
        // Get task details
        const title = this.querySelector('h3').innerText;
        const description = this.querySelector('p').innerText;
        const assignedBy = this.querySelectorAll('p')[1].innerText.split(': ')[1];
        const assignedTo = this.querySelectorAll('p')[2].innerText.split(': ')[1];
        const deadline = this.querySelectorAll('p')[3].innerText.split(': ')[1];
        const taskAssignedDate = this.querySelectorAll('p')[4].innerText.split(': ')[1];
        const acceptanceCriteria = this.querySelectorAll('p')[5].innerText.split(': ')[1];
  
        // Display task details
        console.log(`Title: ${title}`);
        console.log(`Description: ${description}`);
        console.log(`Assigned by: ${assignedBy}`);
        console.log(`Assigned to: ${assignedTo}`);
        console.log(`Deadline: ${deadline}`);
        console.log(`Task Assigned Date: ${taskAssignedDate}`);
        console.log(`Acceptance Criteria: ${acceptanceCriteria}`);
      });
    });
  });