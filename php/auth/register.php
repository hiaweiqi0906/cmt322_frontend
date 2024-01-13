<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <title>Register</title>
    <script>
        checkUnprotectedRoutes()
    </script>
</head>

<body>
    <form method="post" id="auth-register-registerForm">
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="auth-register-registerForm-email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="auth-register-registerForm-email" required>

        <label for="auth-register-registerForm-psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="auth-register-registerForm-psw" required>

        <label for="auth-register-registerForm-username"><b>Username</b></label>
        <input type="text" placeholder="Enter username" name="username" id="auth-register-registerForm-username" required>

        <label for="auth-register-registerForm-number"><b>Contact Number</b></label>
        <input type="text" placeholder="Enter Contact Number" name="number" id="auth-register-registerForm-number" required>

        <label for="auth-register-registerForm-address"><b>Address</b></label>
        <input type="text" placeholder="Enter Address" name="address" id="auth-register-registerForm-address" required>
        <hr>

        <button type="submit" class="registerbtn">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="login.php">Sign in</a>.</p>
    </div>
    </form>
    <script>
        $("#auth-register-registerForm").submit(function(e) {
            e.preventDefault();

            // Get email and password entered, using jQuery
            const email = $('#auth-register-registerForm-email').val()
            const password = $('#auth-register-registerForm-psw').val()
            const username = $('#auth-register-registerForm-username').val()
            const number = $('#auth-register-registerForm-number').val()
            const address = $('#auth-register-registerForm-address').val()
            const type = $('#auth-register-registerForm-type').val()
            const avatar_url = $('#auth-register-registerForm-url').val()
            axios.post('/auth/register', {
                    email,
                    password,
                    username,
                    number,
                    address,
                })
                
                .then(function(response) {
                    // Redirect to the protected page
                    window.location.href = baseUrl + 'php/dashboard.php';
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        });
    </script>
</body>

</html>

<style>
    * {box-sizing: border-box}

    /* Add padding to containers */
    .container {
    padding: 16px;
    }

    /* Full-width input fields */
    input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
    }

    /* Set a style for the submit/register button */
    .registerbtn {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    }

    .registerbtn:hover {
    opacity:1;
    }

    /* Add a blue text color to links */
    a {
    color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
    background-color: #f1f1f1;
    text-align: center;
    }
</style>