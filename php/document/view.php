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
        <h1 class="h1-main-title">Documents</h1>
        <h2 class="h2-user-greeting">Greeting, user!</h2>
        <div class="flex-con">
            <div class="row-1 nested-flex-con-col">
                <div class="float-card info-float-card row-1" style="min-height: 380px;">
                    <h3 class="h3-semibold-24">Document Info</h3>
                    <div class="nested-flex-con-row">
                        <div class="col-3">
                            <div></div>
                        </div>
                        <div class="col-5">
                            <div class="nested-flex-con-col row-1-statistics">
                                <div class="row-1-statistics">
                                    <div class="two-line-statistics document-info-block">
                                        <div>
                                            <p style="width: 85px;">Document Name</p>
                                            <div class="">
                                                <span class="info-text-document">Document1 .pdf asdfdfas </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-1-statistics  mg-between-info">
                                    <div class="two-line-statistics document-info-block">
                                        <div>
                                            <p style="width: 80px;">Document Description</p>
                                            <div class="info-text-document">
                                                <span class="info-text-document">Lorem ipsum dolor sit amet consectetur. Sit sit lacus rhoncus amet. Sed elementum convallis convallis amet tellus egestas et scelerisque at. Pretium nec varius posuere duis eget mi adipiscing. Nulla ipsum aliquam massa pulvinar in. Eget nunc semper felis massa sed </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row-1-statistics mg-between-info">
                                    <div class="two-line-statistics document-info-block">
                                        <div>
                                            <p>Last Accessed By</p>
                                            <div class="info-text-document">
                                                <span class="info-text-document"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/user-male-circle.png" alt="user-male-circle" style="margin-right: 0.5rem;" />Dato Seri Mh Lim Cho</span><span class="last-accessed">1 day ago...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="nested-flex-con-col row-1-statistics">
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="two-line-statistics">
                                        <div>
                                            <p style="width: 85px;">Related Case</p>
                                            <div class="">
                                                <span class="info-text-document">Document1 .pdf asdfdfas </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="col-6 two-line-statistics mg-between-info">
                                        <div>
                                            <p style="width: 85px;">Document Size</p>
                                            <div>
                                                <span class="info-text-document">99kB</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 two-line-statistics mg-between-info">
                                        <div>
                                            <p style="width: 85px;">Document Type</p>
                                            <div>
                                                <span class="info-text-document">Individual</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="two-line-statistics mg-between-info">
                                        <div>
                                            <p style="margin-top: 1rem">Uploaded by</p>
                                            <div class="">
                                                <span class="info-text-document"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/user-male-circle.png" alt="user-male-circle" style="margin-right: 0.5rem;" />Dato Seri Mh Lim Cho</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="two-line-statistics mg-between-info">
                                        <div>
                                            <p style="margin-top: 1rem">Uploaded Date</p>
                                            <div class="">
                                                <span class="info-text-document">08.25 am, 12 November 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="h3-semibold-24 non-float-card">All Documents</h3>
        <div class="table-section">
            <table id="document-allDocument-table" class="table-general">
                <thead>
                    <tr>
                        <th class="col-2">Name

                        </th>
                        <th class="col-1">Type

                        </th>
                        <th class="col-1">File Size

                        </th>
                        <th class="col-2">Uploaded By

                        </th>
                        <th class="col-2">Case Involved

                        </th>
                        <th class="col-2">Updated Date

                        </th>
                        <th class="col-2">Last Accessed

                        </th>
                    </tr>
                </thead>
                <tbody>


                    <!-- <tr>
                        <td><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />Document1.pdf</td>
                        <td>Individual</td>
                        <td>53.6kB</td>
                        <td>Dato Seri Mh Lim Cho</td>
                        <td>Mr Lim Murder Case</td>
                        <td>12 Nov 2023</td>
                        <td>13 Nov 2023</td>
                    </tr>
                    <tr>
                        <td><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />Document1.pdf</td>
                        <td>Individual</td>
                        <td>53.6kB</td>
                        <td>Dato Seri Mh Lim</td>
                        <td>Mr Lim Murder Case</td>
                        <td>13 Nov 2023</td>
                        <td>123 Nov 2023</td>
                    </tr>
                    <tr>
                        <td><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />Document1.pdf</td>
                        <td>Individual</td>
                        <td>53.6kB</td>
                        <td>Dato Seri Mh Lim Cho</td>
                        <td>Mr Lim Murder Case</td>
                        <td>211 Nov 2023</td>
                        <td>112 Nov 2023</td>
                    </tr>
                    <tr>
                        <td><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />Document1.pdf</td>
                        <td>Individual</td>
                        <td>53.6kB</td>
                        <td>Dato Seri Mh Lim Cho</td>
                        <td>Mr Lim Murder Case</td>
                        <td>9 Nov 2023</td>
                        <td>3 Nov 2023</td>
                    </tr>
                    <tr>
                        <td><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />Document1.pdf</td>
                        <td>Individual</td>
                        <td>53.6kB</td>
                        <td>Dato Seri Mh Lim Cho</td>
                        <td>Mr Lim Murder Case</td>
                        <td>9 Nov 2023</td>
                        <td>3 Nov 2023</td>
                    </tr>
                    <tr>
                        <td><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />Document1.pdf</td>
                        <td>Individual</td>
                        <td>53.6kB</td>
                        <td>Dato Seri Mh Lim Cho</td>
                        <td>Mr Lim Murder Case</td>
                        <td>9 Nov 2023</td>
                        <td>3 Nov 2023</td>
                    </tr>
                    <tr>
                        <td><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />Document1.pdf</td>
                        <td>Individual</td>
                        <td>53.6kB</td>
                        <td>Dato Seri Mh Lim Cho</td>
                        <td>Mr Lim Murder Case</td>
                        <td>9 Nov 2023</td>
                        <td>3 Nov 2023</td>
                    </tr>
                    <tr>
                        <td><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />Document1.pdf</td>
                        <td>Individual</td>
                        <td>53.6kB</td>
                        <td>Dato Seri Mh Lim Cho</td>
                        <td>Mr Lim Murder Case</td>
                        <td>9 Nov 2023</td>
                        <td>3 Nov 2023</td>
                    </tr>
                    <tr>
                        <td><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />Document1.pdf</td>
                        <td>Individual</td>
                        <td>53.6kB</td>
                        <td>Dato Seri Mh Lim Cho</td>
                        <td>Mr Lim Murder Case</td>
                        <td>9 Nov 2023</td>
                        <td>3 Nov 2023</td>
                    </tr>
                    <tr>
                        <td><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />Document1.pdf</td>
                        <td>Individual</td>
                        <td>53.6kB</td>
                        <td>Dato Seri Mh Lim Cho</td>
                        <td>Mr Lim Murder Case</td>
                        <td>9 Nov 2023</td>
                        <td>3 Nov 2023</td>
                    </tr> -->
                </tbody>
            </table>

        </div>
    </div>
    <script>
        $('.h2-user-greeting').text("Document Details")
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

        axios.get('/api/documents/all', )
            .then(function(response) {
                console.log(response);

                // TODO: Convert into data and render it
                const documentData = response.data
                documentData.forEach(doc => {
                    const markup = '<tr>' +
                        '<td><a href="' + baseUrl + '/php/document/view.php?id=' + doc._id + '"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/1c277e/pdf-2.png" alt="pdf-2" />Document1.pdf</a></td>' +
                        '<td>Individual</td>' +
                        '<td>53.6kB</td>' +
                        '<td>Dato Seri Mh Lim Cho</td>' +
                        '<td>Mr Lim Murder Case</td>' +
                        '<td>9 Nov 2023</td>' +
                        '<td>3 Nov 2023</td>' +
                        '</tr>';
                    $('#document-allDocument-table tbody').append(markup);
                });

                // var options = {
                //     chart: {
                //         type: 'bar'
                //     },
                //     series: [{
                //         name: 'sales',
                //         data: [30, 40, 45, 50, 49, 60, 70, 91, 125]
                //     }],
                //     xaxis: {
                //         categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
                //     }
                // }
                // var caseOption = {
                //     series: [44, 20, 30],
                //     fill: {
                //         colors: ['#1A73E8', '#B32824', '#A42824']
                //     },
                //     labels: ["open", "closed", "pending"],
                //     distributed: true,
                //     borderWidth: 0,
                //     // {
                //     //     "open": 44, "close": 20, "pending": 30
                //     // },
                //     chart: {
                //         width: 380,
                //         type: 'donut',
                //     },
                //     dataLabels: {
                //         enabled: true
                //     },
                //     responsive: [{
                //         breakpoint: 480,
                //         options: {
                //             chart: {
                //                 width: 200
                //             },
                //             legend: {
                //                 show: true
                //             }
                //         }
                //     }],
                //     plotOptions: {
                //         pie: {
                //             donut: {
                //                 size: '70%', // Adjust the size of the donut
                //             },
                //             customScale: 1, // Adjust the scale to remove the white borders
                //             offsetX: 0,
                //             offsetY: 0,

                //         },
                //     },
                //     stroke: {
                //         show: false,
                //     },
                //     legend: {
                //         position: 'right',
                //         offsetY: 0,
                //         height: 230,
                //     }
                // };
                $('#document-allDocument-table').tableSort({
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


        // $(document).ready(function() {
        //     $('#document-allDocument-table').tableSort({
        //         animation: 'slide',
        //         speed: 500
        //     });
        // });
        endLoader();
    </script>
</body>

</html>