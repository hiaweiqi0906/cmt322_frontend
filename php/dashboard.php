<!DOCTYPE html>
<html lang="en">

<head>
    <!-- import common header and common scripts, using correct relative path -->
    <?php include "../components/common/header.php"; ?>
    <?php include "../components/common/scripts.php" ?>

    <!-- Add any relevant scripts -->

    <title>CaseAce Dashboard</title>
    <script>
        // Choose whether protected or unprotected
        checkProtectedRoutes();

        // Add more scripts
    </script>
</head>

<body>
    <!-- Add neccessary components, such as navbars, footer, header, etc.. -->
    <?php include "../components/common/navbar.php"; ?>

    <div class="main-content">
        <h1>Dashboard</h1>
        <h2 class="user-greeting">Good Morning, user</h2>
        <div class="row">
            <div class="col-9 no-pr">
                <div class="row row-1">
                    <div class="col-6">
                        <!-- Overall Analytics for Cases -->
                        <div class="float-card">
                            <h3>Cases Analytics</h3>
                            <div id="chart-case">

                            </div>
                        </div>

                    </div>
                    <div class="col-6 no-pr">
                        <!-- Overall Analytics for Users -->
                        <div class="float-card">
                            <h3>Users Analytics</h3>
                            <div id="chart-user">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-1">
                    <div class="col-4" style="background-color: grey;">
                        <!-- Overall Analytics for Cases -->
                        <div>
                            <h3>Clients Analytics</h3>
                            <div id="chart-clients">

                            </div>
                        </div>

                    </div>
                    <div class="col-8 no-pr" style="background-color: red;">
                        <!-- Overall Analytics for Users -->
                        <div>
                            <h3>Calendar Analytics</h3>
                            <div id="chart-calendar">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <!-- Overall Analytics for Documents -->
                <div>
                    asdf
                </div>
            </div>
        </div>



    </div>
    <!-- Write relevant html here -->

    <script>
        $('.user-greeting').text(renderUserGreeting())

        // Get statistics data from server
        axios.get('/api/statistics/dashboard', )
            .then(function(response) {

                // TODO: Convert into data and render it
                const statisticData = response.data
                var options = {
                    chart: {
                        type: 'bar'
                    },
                    series: [{
                        name: 'sales',
                        data: [30, 40, 45, 50, 49, 60, 70, 91, 125]
                    }],
                    xaxis: {
                        categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
                    }
                }
                var caseOption = {
                    series: [44, 20, 30],
                    fill: {
                        colors: ['#1A73E8', '#B32824', '#A42824']
                    },
                    labels: ["open", "closed", "pending"],
                    distributed: true,
                    borderWidth: 0,
                    // {
                    //     "open": 44, "close": 20, "pending": 30
                    // },
                    chart: {
                        width: 380,
                        type: 'donut',
                    },
                    dataLabels: {
                        enabled: true
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                show: true
                            }
                        }
                    }],
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '70%', // Adjust the size of the donut
                            },
                            customScale: 1, // Adjust the scale to remove the white borders
                            offsetX: 0,
                            offsetY: 0,

                        },
                    },
                    stroke: {
                        show: false,
                    },
                    legend: {
                        position: 'right',
                        offsetY: 0,
                        height: 230,
                    }
                };
                renderChart('chart-case', caseOption)
                renderChart('chart-user', caseOption)
            })
            .catch(function(error) {
                const {
                    status
                } = error.response
                if (status === 401) {
                    localStorage.clear()
                    window.location.href = baseUrl + 'php/auth/login.php';
                }
            });
    </script>
</body>

</html>