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
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h1-main-title">Cases</h1>
            <a href="http://localhost/php/case/createNewCase.php" class="btn btn-primary" id="create-case-button">Create New Case</a>
        </div>
        <h2 class="h2-user-greeting">Greeting, user!</h2>
        <div class="flex-con" id="adminOnly-case-stats">
            <div class="col-8 row-1 nested-flex-con-col">
                <div class="float-card row-1" style="min-height: 380px;">
                    <h3 class="h3-semibold-24">Case Info</h3>
                    <div class="nested-flex-con-row">
                        <div class="col-7">
                            <div class="chart-div" id="document-documentInfo-chart">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="nested-flex-con-col row-1-statistics">
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="col-4 two-line-statistics">
                                        <div style="width: 85px;">
                                            <p>Total Documents</p>
                                            <div class="big-number-statistics-block">
                                                <span class="big-number-statistics">99</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 two-line-statistics">
                                        <div style="width: 85px;">
                                            <p>Average Filesize</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">99</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 three-line-statistics">
                                        <div style="width: 70px;">
                                            <p>Document Opened Rate</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="col-6 two-line-statistics">
                                        <div style="width: 80px;">
                                            <p>Document Uploaded</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">99</span>
                                                <span class="small-number-statistics">/case</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 two-line-statistics">
                                        <div style="width: 80px;">
                                            <p>Document Uploaded</p>
                                            <div class="big-number-statistics-block">

                                                <span class="big-number-statistics">99</span>
                                                <span class="small-number-statistics">/case</span>
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
                    <h3 class="h3-semibold-24">Case Status</h3>
                    <div class="chart-div" id="document-documentStatus-chart">

                    </div>
                </div>
            </div>
        </div>
        <h3 class="h3-semibold-24 non-float-card">All Cases</h3>
        <div class="table-section">
            <table id="case-allCase-table" class="table-general">
                <thead>
                    <tr>
                        <th class="col-2">Name </th>
                        <th class="col-1">Type </th>
                        <th class="col-1">File Size </th>
                        <th class="col-2">Uploaded By </th>
                        <th class="col-2">Case Involved </th>
                        <th class="col-2">Updated Date </th>
                        <th class="col-2">Last Accessed </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div id="record-not-found-div" style="display: block">
            <img src="../../assets/no_record_found.png" style="width:30rem;display:block; margin-left: auto; margin-right: auto; margin-top: 6rem; border-radius: 20px;" alt="" >
            <h3 style="width:30rem;display:block; margin-left: auto; margin-right: auto;margin-top: 0.5rem; text-align: center; color: #959595;" >No Record found yet..</h3>

            </div>
        </div>
    </div>
    <script>
        $('.h2-user-greeting').text(renderUserGreeting())
        if(getUserType() !== 'admin' && getUserType() !== 'partner') $('#adminOnly-case-stats').css("display", "none")
        if(getUserType() !== 'admin' && getUserType() !== 'partner') $('#create-case-button').css("display", "none")
        // Options for statistics graph later
        var caseOption = {
            series: [44, 20, 30],
            fill: {
                colors: ['#1A73E8', '#B32824', '#A42824']
            },
            labels: ["open", "closed", "pending"],
            distributed: true,
            borderWidth: 0,
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

        // Get cases from backend and display as table
        axios.get(`/api/cases/`, )
            .then(function(response) {
                console.log("caseData", response.data);
                // TODO: Convert into data and render it
                const caseData = response.data
                if(caseData.length===0) 
                    $('#record-not-found-div').css("display", "block")
                else 
                    $('#record-not-found-div').css("display", "none")
                caseData.forEach(c => {
                    // Convert every cases into rows 
                    // TODO: This is dummy data. Change the dummy data into real data rows to be shown.
                    const markup = '<tr>' +
                        '<td><a href="' + baseUrl + '/php/case/view.php?cid=' + c._id + '"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />NULL</a></td>' +
                        '<td>null</td>' +
                        '<td>null</td>' +
                        '<td>null</td>' +
                        '<td>null</td>' +
                        '<td>null</td>' +
                        '<td>null</td>' +
                        '</tr>';
                    $('#case-allCase-table tbody').append(markup);
                });

                // prepare table so that it can be sorted
                $('#case-allCase-table').tableSort({
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
                $('#record-not-found-div').css("display", "block")
            });

        renderChart('document-documentInfo-chart', caseOption)
        renderChart('document-documentStatus-chart', caseOption)

        endLoader();
    </script>
</body>

</html>