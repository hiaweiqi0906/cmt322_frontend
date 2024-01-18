<!DOCTYPE html>
<html lang="en">

<head>
    <!-- import common header and common scripts, using correct relative path -->
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <title>Create Case</title>
    <script>
        checkProtectedRoutes();
    </script>
</head>

<body>
    <?php include "../../components/common/navbar.php"; ?>
    <div class="main-content">
        <h1 class="h1-main-title">Create New Case</h1>
        <h2 class="h2-user-greeting">Greeting, user!</h2>
        <div class="flex-con">
            <div class="col-8 row-1 nested-flex-con-col">
                <div class="float-card row-1" style="min-height: 85vh;">
                    <link href="./css/case/create.css" rel="stylesheet" />
                                <span class="create-new-case1-case-info">Case Info</span>
                                <div class="create-new-case1-case-info1">
                                <div class="create-new-case1-container03">
                                    <span class="create-new-case1-case-title">Case Title</span>
                                    <input type="text" placeholder="Enter Case Title (Required)" class="create-new-case1-input-case-title input"/>
                                    <div class="create-new-case1-container04">
                                    <div class="create-new-case1-container05">
                                        <span class="create-new-case1-case-type">Case Type</span>
                                        <input type="text" placeholder="e.g. Individual" class="create-new-case1-textinput input"/>
                                    </div>
                                    <div class="create-new-case1-container06">
                                        <span class="create-new-case1-case-status">Case Status</span>
                                        <input type="text" placeholder="e.g. Open" class="create-new-case1-textinput1 input"/>
                                    </div>
                                    <div class="create-new-case1-container07">
                                        <span class="create-new-case1-priority">Priority</span>
                                        <input type="text" placeholder="e.g. Urgent" class="create-new-case1-textinput2 input"/>
                                    </div>
                                    <div class="create-new-case1-container08">
                                        <span class="create-new-case1-total-billed-hour">
                                        Total Billed Hour
                                        </span>
                                        <input type="text" placeholder="Integer Only" class="create-new-case1-textinput3 input"/>
                                    </div>
                                    </div>
                                </div>
                                <div class="create-new-case1-container09">
                                    <span class="create-new-case1-case-description">Description</span>
                                    <textarea
                                    placeholder="Enter Case Description"
                                    class="create-new-case1-textarea textarea"
                                    ></textarea>
                                </div>
                                </div>
                                <div class="create-new-case1-assign-client">
                                <div class="create-new-case1-assign-client1">
                                    <span class="create-new-case1-assign-client2">Assign Client</span>
                                    <div class="table-section">
                                        <table id="create-allClient-table" class="table-assign-member">
                                            <thead>
                                                <tr>
                                                    <th class="col-2"></th>
                                                    <th class="col-1"></th>
                                                    <th class="col-1">Name</th>
                                                    <th class="col-2">Phone Number</th>
                                                    <th class="col-2">Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <!-- <div id="record-not-found-div" style="display: block">
                                        <img src="../../assets/no_record_found.png" style="width:30rem;display:block; margin-left: auto; margin-right: auto; margin-top: 6rem; border-radius: 20px;" alt="" >
                                        <h3 style="width:30rem;display:block; margin-left: auto; margin-right: auto;margin-top: 0.5rem; text-align: center; color: #959595;" >No Record found yet..</h3>

                                        </div> -->
                                    </div>
                                </div>
                                </div>
                                <div class="create-new-case1-assign-staff">
                                <div class="create-new-case1-assign-staff1">
                                    <span class="create-new-case1-assign-staff2">Assign Staff</span>
                                    <div class="table-section">
                                        <table id="create-allStaff-table" class="table-assign-member">
                                            <thead>
                                                <tr>
                                                    <th class="col-2"></th>
                                                    <th class="col-1"></th>
                                                    <th class="col-1">Name</th>
                                                    <th class="col-2">Role</th>
                                                    <th class="col-2">Phone Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <!-- <div id="record-not-found-div" style="display: block">
                                        <img src="../../assets/no_record_found.png" style="width:30rem;display:block; margin-left: auto; margin-right: auto; margin-top: 6rem; border-radius: 20px;" alt="" >
                                        <h3 style="width:30rem;display:block; margin-left: auto; margin-right: auto;margin-top: 0.5rem; text-align: center; color: #959595;" >No Record found yet..</h3>

                                        </div> -->
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="create-new-case1-container14">
                    <button type="button" class="create-new-case1-button button">
                    Cancel
                    </button>
                    <button type="button" class="create-new-case1-button1 button">
                    Create Case
                    </button>
                </div>
            </div>
        </div>
    </div>






    

    <script>
        endLoader();

        axios.get(`/api/crm`, )
            .then(function(response) {
                // TODO: Convert into data and render it
                const clientData = response.data.filter(user => user.type === 'client');
                if(clientData.length===0) 
                    $('#record-not-found-div').css("display", "block")
                else 
                    $('#record-not-found-div').css("display", "none")
                clientData.forEach((client, index) => {
                    const markup = '<tr>' +
                        '<td><input type="checkbox" class="case-checkbox" /></td>' +
                        '<td><img src="' + client.avatar_url + '" alt="avatar" class="client-avatar" /></td>' +
                        '<td>' + client.username + '</td>' +
                        '<td>' + client.number + '</td>' +
                        '<td>' + client.address + '</td>' +
                        '</tr>';
                    $('#create-allClient-table tbody').append(markup);
                });

                // prepare table so that it can be sorted
                $('#create-allClient-table').tableSort({
                    animation: 'slide',
                    speed: 500
                });

                const staffData = response.data.filter(user => user.type !== 'client');
                if(staffData.length===0) 
                    $('#record-not-found-div').css("display", "block")
                else 
                    $('#record-not-found-div').css("display", "none")
                    staffData.forEach((staff, index) => {
                    const markup = '<tr>' +
                        '<td><input type="checkbox" class="case-checkbox" /></td>' +
                        '<td><img src="' + staff.avatar_url + '" alt="avatar" class="client-avatar" /></td>' +
                        '<td>' + staff.username + '</td>' +
                        '<td>' + staff.number + '</td>' +
                        '<td>' + staff.address + '</td>' +
                        '</tr>';
                    $('#create-allStaff-table tbody').append(markup);
                });

                // prepare table so that it can be sorted
                $('#create-allStaff-table').tableSort({
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

    </script>
</body>

</html>