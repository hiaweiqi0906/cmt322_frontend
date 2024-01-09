<!DOCTYPE html>
<html lang="en">

<head>
    <!-- import common header and common scripts, using correct relative path -->
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <title>Documents</title>
    <script>
        checkProtectedRoutes();
    </script>
</head>

<body>
    <!-- Add neccessary components, such as navbars, footer, header, etc.. -->
    <?php include "../../components/common/navbar.php"; ?>
    <div class="main-content">
        <h1 class="h1-main-title">Client</h1>
        <h2 class="h2-user-greeting">Greeting, user!</h2>
        <div class="flex-con">
            <div class="col-8 row-1 nested-flex-con-col">
                <div class="float-card row-1" style="min-height: 380px;">
                    <h3 class="h3-semibold-24">Client Info</h3>
                    <div class="nested-flex-con-row">
                        <div class="col-7">
                            <div class="chart-div" id="client-clientInfo-chart">

                            </div>
                        </div>
                        <div class="col-5">
                            <div class="nested-flex-con-col row-1-statistics">
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="col-4 two-line-statistics">
                                        <div style="width: 85px;">
                                            <p>Total Clients</p>
                                            <div class="big-number-statistics-block">
                                                <span class="big-number-statistics">99</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 two-line-statistics">
                                        <div style="width: 85px;">
                                            <p>Client Onboarding</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">99</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 three-line-statistics">
                                        <div style="width: 70px;">
                                            <p>Archived Client</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="col-6 two-line-statistics">
                                        <div style="width: 80px;">
                                            <p>Client Satisfaction</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">4.78</span>
                                                <span class="small-number-statistics">/5.0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 two-line-statistics">
                                        <div style="width: 80px;">
                                            <p>Active Cases</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">99</span>
                                                <span class="small-number-statistics">/client</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <div class="col-4 row-1" style="">
                <!-- Overall Analytics for Documents -->
                <div class="float-card row-only-one-col">
                    <h3 class="h3-semibold-24">Client Status</h3>
                    <div class="chart-div" id="client-clientStatus-chart">

                    </div>
                </div>
            </div>
        </div>
        <h3 class="h3-semibold-24 non-float-card">All Clients</h3>
        <div class="table-section">
            <table id="client-allClient-table" class="table-general">
                <thead>
                    <tr>
                        <th class="col-1">Name </th>
                        <th class="col-1">Type </th>
                        <th class="col-2">Contact Number </th>
                        <th class="col-2">Email </th>
                        <th class="col-2">Case Involved </th>
                        <th class="col-2">Last Comm. Date </th>
                        <th class="col-2">Next Follow-up Date </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </div>
    <script>
        $('.h2-user-greeting').text(renderUserGreeting())
        var caseOption = {
            series: [44, 20, 30],
            colors: graphColors.slice(0, 3),
            fill: {
                colors: graphColors.slice(0, 3)
            },
            labels: ["halo", "closed", "pending"],
            distributed: true,
            borderWidth: 0,
            chart: {
                width: 380,
                type: 'donut',
            },
            dataLabels: {
                colors: graphColors.slice(0, 3),
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
            states: {
                hover: {
                    filter: {
                        type: 'none'
                    }
                }
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%', // Adjust the size of the donut
                    },
                    customScale: 1, // Adjust the scale to remove the white borders
                    offsetX: 0,
                    offsetY: 0,
                    dataLabels: {
                        style: {
                            colors: graphColors.slice(0, 3)

                        }
                    }
                },
            },
            stroke: {
                show: false,
            },
            legend: {
                position: 'right',
                offsetY: 0,
                height: 230,
                labels: {
                    colors: graphColors.slice(0, 3)
                },
                markers: {
                    fillColors: graphColors.slice(0, 3)
                }
            },
            tooltip: {
                fillSeriesColor: true
            }
        };

        // Get all documents
        axios.get('/api/crm', )
            .then(function(response) {

                // TODO: Convert into data and render it
                const clientData = response.data
                clientData.forEach(client => {
                    const markup = '<tr>' +
                        '<td><a href="' + baseUrl + '/php/client/view.php?id=' + client._id + '">'+client.username+'</a></td>' +
                        '<td>'+client.type+'</td>' +
                        '<td>'+client.number+'</td>' +
                        '<td>'+client.email+'</td>' +
                        '<td>aaa</td>' +
                        '<td>aaa</td>' +
                        '<td>aaa</td>' +
                        '</tr>';

                    console.log(markup);
                    $('#client-allClient-table tbody').append(markup);
                });

                $('#client-allClient-table').tableSort({
                    animation: 'slide',
                    speed: 500
                });
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

        renderChart('client-clientInfo-chart', caseOption)
        renderChart('client-clientStatus-chart', caseOption)

        endLoader();
    </script>
</body>

</html>