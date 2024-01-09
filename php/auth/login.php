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
    <form method="post" id="auth-login-loginForm">
        <label for="auth-login-loginForm-email">Email:</label>
        <input type="email" name="email" id="auth-login-loginForm-email">
        <br>

        <label for="auth-login-loginForm-password">Password:</label>
        <input type="password" name="login_password" id="auth-login-loginForm-password">
        <br>

        <input type="submit" value="Login">
    </form>
    <script>
        $("#auth-login-loginForm").submit(function(e) {
            e.preventDefault();

            // Get email and password entered, using jQuery
            const email = $('#auth-login-loginForm-email').val()
            const password = $('#auth-login-loginForm-password').val()

            axios.post('/auth/login', {
                    email,
                    password
                })
                .then(function(response) {
                    // Store the token in localStorage
                    if(response.data.token && response.data.type){
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