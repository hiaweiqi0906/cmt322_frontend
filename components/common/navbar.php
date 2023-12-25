<div class="navbar-bg">
    <!-- determine type of navbar to show here -->
    
    <div class="admin-navbar" style="display: none">
        <ul class="navbar-v">
            <li class="navbar-v"><a class="active" href="#home">Dashboard</a></li>
            <li class="navbar-v"><a href="">Client</a></li>
            <li class="navbar-v"><a href="">Case</a></li>
            <li class="navbar-v"><a href="">Document</a></li>
            <li class="navbar-v"><a href="">Appointment</a></li>
            <li class="navbar-v"><a href="">Task</a></li>
            <li class="navbar-v"><a href="">User Roles</a></li>
            <li class="navbar-v"><a href="">Setting</a></li>
        </ul>
    </div>
    <div class="paralegal-navbar" style="display: none">
        <ul class="navbar-v">
            <li class="navbar-v"><a class="active" href="#home">Dashboard</a></li>
            <li class="navbar-v"><a href="">Case</a></li>
            <li class="navbar-v"><a href="">Document</a></li>
            <li class="navbar-v"><a href="">Appointment</a></li>
            <li class="navbar-v"><a href="">Task</a></li>
            <li class="navbar-v"><a href="">Setting</a></li>
        </ul>
    </div>

    <div class="client-navbar" style="display: none">
        <ul class="navbar-v">
            <li class="navbar-v"><a class="active" href="#home">Dashboard</a></li>
            <li class="navbar-v"><a href="">Case</a></li>
            <li class="navbar-v"><a href="">Document</a></li>
            <li class="navbar-v"><a href="">Appointment</a></li>
            <li class="navbar-v"><a href="">Setting</a></li>
        </ul>
    </div>
</div>
<script>
        const userType = getUserType()
        if(userType === 'admin'){
            $(".admin-navbar").css({"display": "block"});
            $("div.paralegal-navbar").css({"display": "none"});
            $("div.client-navbar").css({"display": "none"});
        }else if(userType === 'paralegal'){
            $("div.admin-navbar").css({"display": "none"});
            $("div.paralegal-navbar").css({"display": "block"});
            $("div.client-navbar").css({"display": "none"});
        }else if(userType === 'client'){
            $("div.admin-navbar").css({"display": "none"});
            $("div.paralegal-navbar").css({"display": "none"});
            $("div.client-navbar").css({"display": "block"});
        }else{
            // localStorage.clear()
            // window.location.replace(baseUrl + 'php/auth/login.php');
        }

        // TODO: apply active class to correct tab automatically
        
    </script>