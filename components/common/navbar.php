<div class="navbar-bg">
    <!-- determine type of navbar to show here -->

    <div class="admin-navbar" style="display: none">
        <ul class="navbar-v">
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-dashboard" href="http://localhost:3000/php/dashboard.php">Dashboard</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-client" href="http://localhost:3000/php/client">Client</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-case" href="http://localhost:3000/php/case">Case</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-document" href="http://localhost:3000/php/document">Document</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-appointment" href="http://localhost:3000/php/appointment">Appointment</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-task" href="http://localhost:3000/php/task">Task</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-user-roles" href="http://localhost:3000/php/user-roles">User Roles</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-setting" href="http://localhost:3000/php/setting">Setting</a></li>
        </ul>
    </div>
    <div class="paralegal-navbar" style="display: none">
        <ul class="navbar-v">
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-dashboard" href="http://localhost:3000/php/dashboard.php">Dashboard</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-case" href="http://localhost:3000/php/case">Case</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-document" href="http://localhost:3000/php/document">Document</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-appointment" href="http://localhost:3000/php/appointment">Appointment</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-task" href="http://localhost:3000/php/task">Task</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-setting" href="http://localhost:3000/php/setting">Setting</a></li>
        </ul>
    </div>

    <div class="client-navbar" style="display: none">
        <ul class="navbar-v">
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-dashboard" href="http://localhost:3000/php/dashboard.php">Dashboard</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-case" href="http://localhost:3000/php/case">Case</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-document" href="http://localhost:3000/php/document">Document</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-appointment" href="http://localhost:3000/php/appointment">Appointment</a></li>
            <li class="navbar-v" onclick="startLoader()"><a class="nb-e nb-setting" href="http://localhost:3000/php/setting">Setting</a></li>
        </ul>
    </div>
</div>
<div class="loader-div">
    <div class="loader">
        <div class="cell d-0"></div>
        <div class="cell d-1"></div>
        <div class="cell d-2"></div>

        <div class="cell d-1"></div>
        <div class="cell d-2"></div>


        <div class="cell d-2"></div>
        <div class="cell d-3"></div>


        <div class="cell d-3"></div>
        <div class="cell d-4"></div>
    </div>

</div>
<script>

    const userType = getUserType()
    if (userType === 'admin') {
        $(".admin-navbar").css({
            "display": "block"
        });
        $("div.paralegal-navbar").css({
            "display": "none"
        });
        $("div.client-navbar").css({
            "display": "none"
        });
    } else if (userType === 'paralegal') {
        $("div.admin-navbar").css({
            "display": "none"
        });
        $("div.paralegal-navbar").css({
            "display": "block"
        });
        $("div.client-navbar").css({
            "display": "none"
        });
    } else if (userType === 'client') {
        $("div.admin-navbar").css({
            "display": "none"
        });
        $("div.paralegal-navbar").css({
            "display": "none"
        });
        $("div.client-navbar").css({
            "display": "block"
        });
    } else {
        // localStorage.clear()
        // window.location.replace(baseUrl + 'php/auth/login.php');
    }

    const updateNavbarAttr = () => {
         const currentLink = window.location.href;
    $('.nb-e').removeClass('active');
    if (currentLink.includes("dashboard")) 
        $('.nb-dashboard').addClass('active');
        else if (currentLink.includes("client")) 
        $('.nb-client').addClass('active');
        else if (currentLink.includes("case")) 
        $('.nb-case').addClass('active');
        else if (currentLink.includes("document")) 
        $('.nb-document').addClass('active');
        else if (currentLink.includes("appointment")) 
        $('.nb-appointment').addClass('active');
        else if (currentLink.includes("task")) 
        $('.nb-task').addClass('active');
        else if (currentLink.includes("user-roles")) 
        $('.nb-user-roles').addClass('active');
        else if (currentLink.includes("setting")) 
        $('.nb-setting').addClass('active');
    }

    updateNavbarAttr();

    
   
</script>