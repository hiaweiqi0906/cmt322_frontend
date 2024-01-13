<!DOCTYPE html>
<html lang="en">

<head>
    <!-- import common header and common scripts, using correct relative path -->
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <title>Clients</title>
    <script>
        checkProtectedRoutes();
    </script>
</head>

<body>
    <?php include "../../components/common/navbar.php"; ?>
    <div class="main-content">
        <h1 class="h1-main-title">User</h1>
        <h2 class="h2"> User Details</h2>
        <div class="flex-con">
            <div class="row-1 nested-flex-con-col">
                <div class="float-card info-float-card row-1" style="min-height: 380px;">
                    <div class="nested-flex-con-row">
                        <div style="width: 50%">
                            <h3 class="h3-semibold-24">User Info </h3>

                        </div>
                        <div style="width: 50%">
                            <button type="button" id="client-icon-delete" style="background-color: #1c277e; width: 20%; display: none; cursor: pointer; margin-left: 1rem; margin-right: 3rem; float: right;" class="btn btn-primary" onclick="editUser()"><img width="24" height="24" src="https://img.icons8.com/ios-glyphs/30/ffffff/design.png" alt="design" style="margin-right: 1rem;" />Edit</button>
                            <button type="button" id="client-icon-edit" style="border: 1px solid #1c277e; background-color: white; width: 20%; color: #1c277e; display: none; margin-left: 1rem;float: right;cursor: pointer;" class="btn btn-primary" onclick="deleteUser()"><img width="24" height="24" src="https://img.icons8.com/ios-glyphs/30/1c277e/filled-trash.png" alt="design" style="margin-right: 1rem;" />Delete</button>
                            <button type="button" id="client-icon-cancel" style="background-color: #1c277e; width: 20%; display: none; cursor: pointer; margin-left: 1rem; margin-right: 3rem; float: right;" class="btn btn-primary" onclick="confirmSave()"><img width="24" height="24" src="https://img.icons8.com/ios-glyphs/30/ffffff/checkmark--v1.png" alt="design" style="margin-right: 1rem;" />Save</button>
                            <button type="button" id="client-icon-save" style="border: 1px solid #1c277e; background-color: white; width: 20%; color: #1c277e; display: none; margin-left: 1rem;float: right;cursor: pointer;" class="btn btn-primary" onclick="cancelSave()"><img width="24" height="24" src="https://img.icons8.com/ios-glyphs/30/1c277e/multiply.png" alt="design" style="margin-right: 1rem;" />Cancel</button>
                        </div>
                    </div>

                    <div class="nested-flex-con-row">
                        <div class="col-3">
                            <div class="hoverable-img">
                                <div class="img-wrap">
                                    <img src="" id="client-clientInfo-clientAvatar" alt="" />
                                </div>
                                <div class="middle-img-hover img-wrap">
                                    <div class="view-text img-wrap">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="nested-flex-con-col row-1-statistics">
                                <div class="row-1-statistics">
                                    <div class="two-line-statistics document-info-block">
                                        <div>
                                            <p style="width: 85px;">Name</p>
                                            <div class="">
                                                <span class="info-text-document" id="client-clientInfo-clientName">Name </span>
                                                <input type="text" style="display: none; width: calc(100% - 3rem);" class="info-text-document" name="client-clientEditInfo-clientName" id="client-clientEditInfo-clientName" value="Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-1-statistics  mg-between-info">
                                    <div class="two-line-statistics document-info-block">
                                        <div>
                                            <p style="width: 100px;">Case History</p>
                                            <div class="">
                                                <span class="info-text-document" id="client-clientInfo-clientHistory">Case History </span>
                                                <textarea name="info-text-document" id="client-clientEditInfo-clientHistory" style="display: none; width: 100%;" rows="6">asfdasf</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row-1-statistics mg-between-info">
                                    <div class="two-line-statistics document-info-block">
                                        <div>

                                        <p style="width: 100px;">Address</p>
                                            <div class="info-text-document">
                                                <span class="info-text-document" id="client-clientInfo-clientAddress">Address</span>
                                                <input type="text" style="display: none; " class="info-text-document" name="client-clientEditInfo-clientAddress" id="client-clientEditInfo-clientAddress">
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
                                            <p style="width: 85px;">Email</p>
                                            <div class="">
                                                <span class="info-text-document" id="client-clientInfo-clientEmail">Email </span>
                                                <input type="text" style="display: none; " class="info-text-document" name="client-clientEditInfo-clientEmail" id="client-clientEditInfo-clientEmail">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="col-6 two-line-statistics mg-between-info">
                                        <div>
                                            <p style="width: 85px;">Contact</p>
                                            <div>
                                                <span class="info-text-document" id="client-clientInfo-clientNumber">Contact</span>
                                                <input type="text" style="display: none; " class="info-text-document" name="client-clientEditInfo-clientNumber" id="client-clientEditInfo-clientNumber">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 two-line-statistics mg-between-info">
                                        <div>
                                            <p style="width: 85px;">Type</p>
                                            <div>
                                                <span class="info-text-document" id="client-clientInfo-clientType">Type</span>
                                                <input type="text" style="display: none; " class="info-text-document" name="client-clientEditInfo-clientType" id="client-clientEditInfo-clientType">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="two-line-statistics mg-between-info">
                                        <div>
                                            <p style="margin-top: 1rem">Last Comm. Date</p>
                                            <div class="">
                                                <span class="info-text-document" id="client-clientInfo-lastDate">10 October 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nested-flex-con-row row-1-statistics">
                                    <div class="two-line-statistics mg-between-info">
                                        <div>
                                            <p style="margin-top: 1rem">Next Follow Up Date</p>
                                            <div class="">
                                                <span class="info-text-document" id="client-clientInfo-nextDate">12 November 2023</span>
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

        <h3 class="h3-semibold-24 non-float-card">All Users</h3>
        <div class="table-section" style="height: 39%; width: 100%;overflow-y: scroll;">
            <table id="client-allClient-table" class="table-general">
                <thead>
                    <tr>
                        <th class="col-1">Name

                        </th>
                        <th class="col-1">Type

                        </th>
                        <th class="col-2">Contact Number

                        </th>
                        <th class="col-2">Email

                        </th>
                        <th class="col-2">Case Involved

                        </th>
                        <th class="col-2">Last Comm. Date

                        </th>
                        <th class="col-2">Next Follow Up Date

                        </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </div>
    <div class="document-iframe-wrap">
        <embed id="document-documentInfo-documentIFrame" class="" height="500px">
        <!-- <p>Unable to display PDF file. <a href="/uploads/media/default/0001/01/540cb75550adf33f281f29132dddd14fded85bfc.pdf">Download</a> instead.</p> -->
        </embed>
    </div>

    <script>
        $('.h2-user-greeting').text("Client Details")
        let canAccessList = []

        // get the documentID and caseID

        const urlParams = new URLSearchParams(window.location.search);
        const clientId = urlParams.get('id');

        // Toggle effect for open and close the embed pdf when clicked
        const openClosePdf = () => {
            if ($('.document-iframe-wrap').css("visibility") === "hidden") {
                $('.document-iframe-wrap').css("visibility", "visible")
            } else {
                $('.document-iframe-wrap').css("visibility", "hidden")
            }
        }

        // get client details, and update the UI

        axios.get(`/api/crm/${clientId}`, )
            .then(function(response) {
                console.log(response.data);
                const {
                    username,
                    related_case_history,
                    email,
                    number,
                    address,
                    avatar_url,
                    type,
                } = response.data;
                console.log("here");

                $('#client-clientInfo-clientName').text(username)
                $('#client-clientEditInfo-clientName').val(username)

                $('#client-clientInfo-clientHistory').text(related_case_history)
                $('#client-clientEditInfo-clientHistory').val(related_case_history)

                $('#client-clientInfo-clientEmail').text(email)
                $('#client-clientEditInfo-clientEmail').val(email)

                $('#client-clientInfo-clientNumber').text(number)
                $('#client-clientEditInfo-clientNumber').val(number)

                $('#client-clientInfo-clientAddress').text(address)
                $('#client-clientEditInfo-clientAddress').val(address)

                $('#client-clientInfo-nextDate').text()
                const uploadedByUserInfo = ""
                $('#client-clientInfo-lastDate').text()

                $('#client-clientInfo-clientAvatar').attr("src", avatar_url)

                $('#client-clientEditInfo-clientType').val(type)
                $('#client-clientInfo-clientType').text(type)
                
                
                

                $('#client-icon-delete').css("display", "block")
                $('#client-icon-edit').css("display", "block")

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

        // Change the display properties when clicked edit
        const editUser = () => {
            $('#client-icon-save').css("display", "block")
            $('#client-icon-cancel').css("display", "block")
            $('#client-icon-editAccess').css("display", "inline")
            $('#client-icon-delete').css("display", "none")
            $('#client-icon-edit').css("display", "none")

            $('#client-clientEditInfo-clientType').css("display", "block")
            $('#client-clientEditInfo-clientEmail').css("display", "block")
            $('#client-clientEditInfo-clientName').css("display", "block")
            $('#client-clientEditInfo-clientNumber').css("display", "block")
            $('#client-clientEditInfo-clientAddress').css("display", "block")
            $('#client-clientEditInfo-clientHistory').css("display", "block")
            $('#client-clientEditInfo-clientAvatar').css("display", "block")

            $('#client-clientInfo-clientType').css("display", "none")
            $('#client-clientInfo-clientEmail').css("display", "none")
            $('#client-clientInfo-clientName').css("display", "none")
            $('#client-clientInfo-clientNumber').css("display", "none")
            $('#client-clientInfo-clientAddress').css("display", "none")
            $('#client-clientInfo-clientHistory').css("display", "none")
            
            
        }

        // Send update request to server if requested
        const sendUpdateRequest = () => {
            const reqBody = {
                username: $('#client-clientEditInfo-clientName').val(),
                email: $('#client-clientEditInfo-clientEmail').val(),
                type: $('#client-clientEditInfo-clientType').val(),
                number: $('#client-clientEditInfo-clientNumber').val(),
                address: $('#client-clientEditInfo-clientAddress').val(),
            }
            console.log(reqBody);
            axios.put(`/api/crm/${clientId}`, reqBody).then(function(response) {
                if (response.status === 200) {
                    location.reload()
                }
            }).catch(function(error) {
                console.log(error);
                const {
                    status
                } = error.response
                if (status === 401) {
                    localStorage.clear()
                    window.location.href = baseUrl + 'php/auth/login.php';
                }
            })
        }

        // change the display properties when clicked cancel
        const cancelSave = () => {
            $('#client-icon-save').css("display", "none")
            $('#client-icon-cancel').css("display", "none")
            $('#client-icon-delete').css("display", "block")
            $('#client-icon-edit').css("display", "block")

            $('#client-clientEditInfo-clientType').css("display", "none")
            $('#client-clientEditInfo-clientHistory').css("display", "none")
            $('#client-clientEditInfo-clientName').css("display", "none")
            $('#client-clientEditInfo-clientNumber').css("display", "none")
            $('#client-clientEditInfo-clientAddress').css("display", "none")
            $('#client-clientEditInfo-clientEmail').css("display", "none")
            $('#client-clientEditInfo-clientAvatar').css("display", "none")

            $('#client-clientInfo-clientHistory').css("display", "block")
            $('#client-clientInfo-clientName').css("display", "block")
            $('#client-clientInfo-clientNumber').css("display", "block")
            $('#client-clientInfo-clientAddress').css("display", "block")
            $('#client-clientInfo-clientEmail').css("display", "block")
            $('#client-clientInfo-clientType').css("display", "block")
        }

        // Send update request if update button is clicked
        const confirmSave = () => {
            sendUpdateRequest()
        }

        // Send delete request if requested
        const sendDeleteRequest = () => {
            axios.delete(`/api/crm/${clientId}`).then(function(response) {
                if (response.status === 200) {
                    window.location.href = baseUrl + 'php/client';
                }
            }).catch(function(error) {
                console.log(error);
                const {
                    status
                } = error.response
                if (status === 401) {
                    localStorage.clear()
                    window.location.href = baseUrl + 'php/auth/login.php';
                }
            })
        }

        // When onclick delete button, send delete request to backend
        const deleteUser = () => {
            sendDeleteRequest();
        }

        // get all related case documents
        axios.get(`/api/crm/`, )
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
                    $('#client-allClient-table tbody').append(markup);
                    console.log("object");
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

        endLoader();
    </script>
</body>

</html>