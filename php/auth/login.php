<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <title>Login</title>
    <script>
        checkUnprotectedRoutes()
    </script>
</head>

<body>
    <form method="post" id="myForm">
        <label for="email">Email:</label>
        <input type="email" name="email" id="login_email">
        <br>

        <label for="password">Password:</label>
        <input type="password" name="login_password" id="login_password">
        <br>

        <input type="submit" value="Login">
    </form>
    <script>
        $("#myForm").submit(function(e) {
            console.log("object");
            e.preventDefault();
            const email = $('#login_email').val()
            const password = $('#login_password').val()

            axios.post('/auth/login', {
                    email,
                    password
                })
                .then(function(response) {
                    console.log(response);
                    // Store the token in localStorage
                    if(response.data.token && response.data.type){
                        // console.log(document.cookie)
                        localStorage.setItem('authToken', response.data.token);
                        localStorage.setItem('type', response.data.type);
                        localStorage.setItem('name', response.data.name);
                    }

                    // Redirect to the protected page
                    window.location.href = baseUrl + 'php/dashboard.php';
                })
                .catch(function(error) {
                    console.log(error);
                });
        });
    </script>
</body>

</html>