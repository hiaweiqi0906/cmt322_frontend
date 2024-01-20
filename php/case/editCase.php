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
        <h1 class="h1-main-title">Edit Case</h1>
        <h2 class="h2-user-greeting">Greeting, user!</h2>
        <div class="flex-con">
            <div class="col-8 row-1 nested-flex-con-col">
                <form id='createCase-Form'>
                <div class="float-card row-1" style="min-height: 85vh;">
                    <link href="./css/case/create.css" rel="stylesheet" />
                        <span class="create-new-case1-case-info">Edit Case Details</span>
                            <div class="create-new-case1-case-info1">
                                <div class="create-new-case1-container03">
                                    <span class="create-new-case1-case-title">Case Title</span>
                                    <input type="text" placeholder="Enter Case Title (Required)" required class="create-new-case1-input-case-title input"/>
                                    <div class="invalid-feedback">
                                        Please provide a valid title.
                                    </div>
                                    <div class="create-new-case1-container04">
                                    <div class="create-new-case1-container05">
                                        <span class="create-new-case1-case-type">Case Type</span>
                                        <input type="text" placeholder="e.g. Individual" required class="create-new-case1-textinput input"/>
                                    </div>
                                    <div class="create-new-case1-container06">
                                        <span class="create-new-case1-case-status">Case Status</span>
                                        <input type="text" placeholder="e.g. Open" required class="create-new-case1-textinput1 input"/>
                                    </div>
                                    <div class="create-new-case1-container07">
                                        <span class="create-new-case1-priority">Priority</span>
                                        <input type="text" placeholder="e.g. Urgent" required class="create-new-case1-textinput2 input"/>
                                    </div>
                                    <div class="create-new-case1-container08">
                                        <span class="create-new-case1-total-billed-hour">
                                        Total Billed Hour
                                        </span>
                                        <input type="text" placeholder="Integer Only" required pattern="\d+" class="create-new-case1-textinput3 input"/>
                                        <div class="invalid-feedback">
                                            Please enter a valid integer for Total Billed Hour.
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="create-new-case1-container09">
                                    <span class="create-new-case1-case-description">Description</span>
                                    <textarea placeholder="Enter Case Description" required class="create-new-case1-textarea textarea"></textarea>
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
                    <!-- <button type="submit" class="create-new-case1-button1 button" onsubmit="submitForm()"> -->
                    <button type="submit" class="create-new-case1-button1 button">
                    Submit
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        endLoader();
        
        const urlParams = new URLSearchParams(window.location.search);
        const caseId = urlParams.get('cid');

        axios.get('/api/cases/' + caseId, )
            .then(function(response) {
                
                const caseData = response.data
                if(caseData.length===0) 
                    $('#record-not-found-div').css("display", "block")
                else 
                    $('#record-not-found-div').css("display", "none")

                // document.querySelector(".faq--01 h1").innerHTML = json[0].title;

                document.querySelector('.create-new-case1-input-case-title').value = caseData.case_title;
                document.querySelector('.create-new-case1-textarea').value = caseData.case_description;
                document.querySelector('.create-new-case1-textinput').value = caseData.case_type;
                document.querySelector('.create-new-case1-textinput1').value = caseData.case_status;
                document.querySelector('.create-new-case1-textinput2').value = caseData.case_priority;
                document.querySelector('.create-new-case1-textinput3').value = caseData.case_total_billed_hour;

                // document.querySelector('.case-client-name0').textContent = caseData.case_client_list[0].case_member_id;

                const caseClientList = caseData.case_member_list.filter(user => user.case_member_type === 'client');

                const caseStaffList = caseData.case_member_list.filter(user => user.case_member_type !== 'client');

                console.log(caseClientList);

                for (let i = 0; i < caseClientList.length; i++) {
                    axios.get('/api/crm/' + caseClientList[i].case_member_id, )
                    .then(function(response) {
                        const avatar_url = response.data.avatar_url;
                        if(avatar_url === ""){
                            document.getElementById(`case-client-image${i}`).src = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
                            document.getElementById(`case-client-image${i}`).style.visibility = "visible";
                        } else {
                            document.getElementById(`case-client-image${i}`).src = response.data.avatar_url;
                            document.getElementById(`case-client-image${i}`).style.visibility = "visible";
                        }


                        document.querySelector(`.case-client-name${i}`).textContent = response.data.username;
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
                }

                for (let i = 0; i < caseStaffList.length; i++) {
                    axios.get('/api/crm/' + caseStaffList[i].case_member_id, )
                    .then(function(response) {
                        const avatar_url = response.data.avatar_url;
                        if(avatar_url === ""){
                            document.getElementById(`case-member-image${i}`).src = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
                            document.getElementById(`case-member-image${i}`).style.visibility = "visible";
                        } else {                            
                            document.getElementById(`case-member-image${i}`).src = response.data.avatar_url;
                            document.getElementById(`case-member-image${i}`).style.visibility = "visible";
                        }


                        document.querySelector(`.case-member-name${i}`).textContent = response.data.username;
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
                }

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
                        '<td style="display:none;">' + client._id + '</td>' +
                        '<td style="display:none;">' + client.type + '</td>' +
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
                        '<td style="display:none;">' + staff._id + '</td>' +
                        '<td style="display:none;">' + staff.type + '</td>' +
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

            // Store the selected case members in an array
            let selectedCaseMembers = [];

            // Event listener for checkbox clicks
            $(document).on('change', '.case-checkbox', function() {
                // Get the values from the corresponding row
                const row = $(this).closest('tr');
                const id = row.find('td:eq(2)').text();
                const role = row.find('td:eq(3)').text();
                const username = row.find('td:eq(4)').text();
                const number = row.find('td:eq(5)').text();
                const address = row.find('td:eq(6)').text();

                // Check if the checkbox is checked or unchecked
                if ($(this).prop('checked')) {
                    // console.log(id);
                    // Add the selected case member to the array
                    selectedCaseMembers.push({
                        case_member_id: id,
                        case_member_type: role,  // Assuming a default type for clients
                        case_member_role: 'role'     // Assuming a default role for clients
                    });
                } else {
                    // Remove the unselected case member from the array
                    selectedCaseMembers = selectedCaseMembers.filter(member => member.case_member_id !== id);
                }

                // console.log(selectedCaseMembers)

                // // Store the values in data attributes on the "Create Case" button
                // $('#create-case-button').data('id', id);
                // $('#create-case-button').data('username', username);
                // $('#create-case-button').data('number', number);
                // $('#create-case-button').data('address', address);
            });

            const submitForm = () => {
            startLoader()

            const formData = {
                case_title: $('.create-new-case1-input-case-title').val(),
                case_description: $('.create-new-case1-textarea').val(),
                case_type: $('.create-new-case1-textinput').val(),
                case_status: $('.create-new-case1-textinput1').val(),
                case_priority: $('.create-new-case1-textinput2').val(),
                case_total_billed_hour: parseInt($('.create-new-case1-textinput3').val(), 10),
                case_member_list: selectedCaseMembers
            };

            console.log(formData);

            // // Event listener for "Create Case" button click
            // $('#create-new-case1-button1').on('click', function() {
                // Use these values in your axios.post request


                axios.put('/api/cases', {
                    case_title: $('.create-new-case1-input-case-title').val(),
                    case_description: $('.create-new-case1-textarea').val(),
                    case_type: $('.create-new-case1-textinput').val(),
                    case_status: $('.create-new-case1-textinput1').val(),
                    case_priority: $('.create-new-case1-textinput2').val(),
                    case_total_billed_hour: parseInt($('.create-new-case1-textinput3').val(), 10),
                    case_member_list: selectedCaseMembers
                })
                .then(function(response) {
                    window.location.href = baseUrl + 'php/case/';
                    endLoader()
                })
                .catch(function(error) {
                    const { status } = error.response;
                    if (status === 401) {
                        localStorage.clear();
                        window.location.href = baseUrl + 'php/auth/login.php';
                    } else {
                        // alert(`Error: ${data.message}`);
                    }
                    
                });
            // });
        }

        document.getElementById('createCase-Form').addEventListener('submit', function(event) {
            // Prevent the default form submission
            event.preventDefault();

            submitForm();
        });
    
    </script>
</body>

</html>