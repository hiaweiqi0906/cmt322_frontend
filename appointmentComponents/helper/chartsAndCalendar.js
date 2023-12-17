
username = "Pikachu";

// Get all data from database once the page is loaded, 
// the data used for creating the charts and admin's personal calendar
document.addEventListener('DOMContentLoaded', function() {
    axios.get('http://localhost:9000/appointments/admin/Jie Yi')
        .then((response) => {
            return response.data
        })
        .then((data) =>{
            createPieChart('pie-chart', data);
            createAreaChart('area-chart', data);
            createCalendar('calendar-admin', data, username, true);
        })
        .catch((err) => {
            console.error('Fetch Data Error', err)
        });

})