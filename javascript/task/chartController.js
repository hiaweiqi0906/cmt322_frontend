// To create a pie chart
const taskChart_createPieChart = (id, tasks) => {
    // Get the number of todo tasks and done tasks
    const todoTasks = tasks.filter(task => task.status === 'todo').length;
    const doneTasks = tasks.length - todoTasks;
  
    // Pie chart settings
    var options = {
      chart: {
        id: 'task-admin-pieChart',    // Id of chart, later used for reference to the chart when updating data
        type: 'donut',      // Use donut chart
        height: '90%',      // The height of the chart
      },
      colors: ['#1C277E', '#003554'],
      plotOptions: {
        pie: {
          donut: {
            labels: {           // To show the total number of tasks in the center of the pie chart
              show: true,
              name: {
                show: true
              },
              value: {
                show: true
              },
              total: {
                show: true,
                fontSize: '14px',
                label: 'Total Tasks'
              }
            },
          },
        },
      },
      labels: ['Todo Tasks', 'Done Tasks'],   // Category label
      series: [todoTasks, doneTasks]          // The value for each category
    }
  
    var chart = new ApexCharts(document.getElementById(id), options);   // Apply the chart to the id
  
    chart.render();     // Render the chart
  }

 // To update the pie chart data because the chart cannot be recreated
const taskChart_updatePieChart = (pie_chart_id, tasks) => {

    // To get the number of todo tasks and done tasks
    const todoTasks = tasks.filter(task => task.status === 'todo').length;
    const doneTasks = tasks.length - todoTasks;
  
    // The new data to be used for updated the chart
    const newSeriesData = [todoTasks, doneTasks]
  
    // Update the pie chart using the chart id and the updateSeries function with data
    ApexCharts.exec(pie_chart_id, 'updateSeries', newSeriesData);
  }
  
  
  // To create an array of current week dates
  const taskChart_createWeekDates = () => {
  console.log("here")
    const today = moment();
  
    // Get the start date of the current week (Sunday)
    const sundayOfThisWeek = today.clone().startOf('week');
  
    // Generate an array to store the dates for each day of the week
    const weekDates = [];
  
    // Add to the array with dates for each day of the week
    for (let i = 0; i < 7; i++) {
      const currentDate = sundayOfThisWeek.clone().add(i, 'days');
      const formattedDate = currentDate.format('YYYY-MM-DD');
      weekDates.push(formattedDate);
    }
  
    return weekDates;
  }
  
  
  // To create an area chart
  const taskChart_createAreaChart = (id, tasks) => {
  
    // To get the todo tasks
    const todoTasks = tasks.filter(task => task.status === 'todo');
  
    // Get the week dates
    const weekDates = taskChart_createWeekDates();
  
    // Hold the number of tasks for each day of the week
    const tasksByWeekDates = [];
  
    // To get the number of tasks for each day of the week
    weekDates.forEach(date => {
      const numberOfTasks = todoTasks.filter(task => task.dateStart === date).length;
      tasksByWeekDates.push(numberOfTasks);
    });
  }
  
  // Area chart settings
options = {
    chart: {
      id: 'task-admin-areaChart', // Chart ID, later used for reference the chart when doing data updates
      type: 'area',   // Use Area chart
      height: '90%',  // The height of the chart
      zoom: {
        enabled: false  // Disable the zoom functionality
      }
    },
    colors: ['#1C277E'],
    dataLabels: {
      enabled: false    // Disable the label for each data's value
    },
    markers: {          // Show the markers for each data
      size: 6
    },
    stroke: {           // The line style
      curve: 'straight'
    },
    tooltip: {
      y: {
        formatter: function (value) {        // To ensure the value is integer
          return value;
        }
      }
    },
    xaxis: {
      categories: weekDates,       // x-axis
      labels: {
        formatter: function (value) {
          return moment(value).format("DD MMM");   // Change the format, example 12 Dec
        }
      }
    },
    series: [{
      name: 'Tasks',
      data: tasksByWeekDates  // y-axis
    }],
  
  };
  
  var chart = new ApexCharts(document.getElementById(id), options);   // Apply the chart to the id
  
  chart.render();     // Render the chart
  
  
  // Update the area chart because the chart cannot be recreated
  const taskChart_updateAreaChart = (area_chart_id, tasks) => {
    // To get the todo tasks
    const todoTasks = tasks.filter(task => task.status === 'todo');
  
    // Get the week dates
    const weekDates = taskChart_createWeekDates();
  
    // Hold the number of tasks for each day of the week
    const tasksByWeekDates = [];
  
    // To get the number of tasks for each day of the week
    weekDates.forEach(date => {
      const numberOfTasks = todoTasks.filter(task => task.dateStart === date).length;
      tasksByWeekDates.push(numberOfTasks);
    });
  
    // The new data to be used for updated the chart
    const newSeriesData = [{
      name: 'Tasks',
      data: tasksByWeekDates
    }]
  
    // Update the area chart using the chart id and the updateSeries function with data
    ApexCharts.exec(area_chart_id, 'updateSeries', newSeriesData);
  }