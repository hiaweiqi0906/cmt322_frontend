<!DOCTYPE html>
<html lang="en">

<head>
    <!-- import common header and common scripts, using correct relative path -->
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <title>Notifications</title>
    <script>
        checkProtectedRoutes();
    </script>
</head>

<body>
    <!-- Add neccessary components, such as navbars, footer, header, etc.. -->
    <?php include "../../components/common/navbar.php"; ?>
    <div class="main-content">
        <h1 class="h1-main-title">Notifications</h1>
        <h2 class="h2-user-greeting">Greeting, user!</h2>
        <div class="flex-con">
        <div class="row-1 nested-flex-con-col" id="notification-rows">

        </div>
        </div>
    </div>
    <script>
        $('.h2-user-greeting').text(renderUserGreeting())
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

        const getImage = (c) => {
            switch (c.notification_type) {
                case "addDocument": {
                    return '<img style="display: block; margin-left: auto; margin-right: auto; margin-top: 1rem;"width="40" height="40" src="https://img.icons8.com/ios-glyphs/90/1c277e/agreement-new.png" alt="agreement-new"/>'
                    break
                }
                case "editDocument": {
                    return '<img style="display: block; margin-left: auto; margin-right: auto; margin-top: 1rem;" width="40" height="40" src="https://img.icons8.com/ios-glyphs/90/1c277e/rename.png" alt="rename"/>'
                    break;
                }
                case "deleteDocument": {
                    return '<img style="display: block; margin-left: auto; margin-right: auto; margin-top: 1rem;" width="40" height="40" src="https://img.icons8.com/ios-glyphs/90/1c277e/agreement-delete.png" alt="agreement-delete"/>'
                    break;
                }
            }
        }

        // Get cases from backend and display as table
        axios.get(`/api/statistics/notifications`, )
            .then(function(response) {
                // TODO: Convert into data and render it
                const notifications = response.data
                console.log(notifications);
                notifications.forEach(c => {
                    let img = getImage(c)
                    console.log(c);
                    // Convert every cases into rows 
                    // TODO: This is dummy data. Change the dummy data into real data rows to be shown.
                    const markup = `
                        <div class="float-card row-1" style="height: 6rem; margin-bottom: 1rem;">
                        <a style="text-decoration: none;" href="${baseUrl}${c.notification_clicklink}">
                            <div class="nested-flex-con-row">
                                <div class="col-1">
                                ${img}
                                </div>
                                <div class="col-11">
                                    <div class="nested-flex-con-col row-1-statistics-notification">
                                        <div class="nested-flex-con-row row-1-statistics-notification">
                                            <div class="two-line-statistics">
                                                <div style="width: 100%;">
                                                    <p class="notification-time">${changeToReadableFormat(c.notification_sent_date)}</p>
                                                    <div class="big-number-statistics-block-notification">
                                                        <span class="big-number-statistics notifications">${c.notification}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    `
                    // const markup = '<tr>' +
                    //     '<td><a href="' + baseUrl + '/php/case/view.php?cid=' + c._id + '"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />NULL</a></td>' +
                    //     '<td>null</td>' +
                    //     '<td>null</td>' +
                    //     '<td>null</td>' +
                    //     '<td>null</td>' +
                    //     '<td>null</td>' +
                    //     '<td>null</td>' +
                    //     '</tr>';
                    $('#notification-rows').append(markup);
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
            });

        renderChart('document-documentInfo-chart', caseOption)
        renderChart('document-documentStatus-chart', caseOption)

        endLoader();
    </script>
</body>

</html>