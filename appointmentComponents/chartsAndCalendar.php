<!-- The container for two charts and calendar -->
<div class='container mt-3'>

    <div class='row'>

        <!-- The first chart-->
        <div class='col-xl-6' style="border: 1px solid black"> 
            <div class='card'>

                <div class='card-body'>
                    <!-- Title -->
                    <h5 class='card-title'>Total Appointment Info</h5>

                    <div id='pie-chart' style='height: 50vh'></div>
                
                </div>
            </div>
        </div>

        <!-- The second chart-->
        <div class='col-xl-6' style="border: 1px solid black">
            <div class='card'>

                <div class='card-body'>
                    <!-- Title -->
                    <h5 class='card-title'>Weekly Appointment</h5>

                    <div id='area-chart' style='height: 50vh'></div>
                </div>

            </div>
        </div>

    </div>

    <!-- Calendar -->
    <div class='row mt-3 mb-4' style="border: 1px solid black">
        <div class=col>
            <div class='card'>

                <div class='card-body'>

                    <div id='calendar' style='height: 50vh'></div>
                </div>

            </div>
        </div>
    </div>

</div>