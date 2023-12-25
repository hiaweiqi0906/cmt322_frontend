<!DOCTYPE html>
<html lang="en">

<head>
    <!-- import common header and common scripts, using correct relative path -->
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>

    <!-- TODO: Add any relevant scripts -->

    <title><!-- TODO: change name --></title>
    <script>
        // Choose whether protected or unprotected
        checkUnprotectedRoutes(); /* or */ checkProtectedRoutes();

        // TODO: Add more scripts
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
            e.preventDefault();

            // get input from form
            const input = $('#input').val()

            // axios post request
            axios.post('/auth/login', {
                    email
                })
                .then(
                    //  what to do after getting response from server
                    function(response) {
                        console.log(response);

                    }).catch(function(error) {
                    // catch error and show it to user
                    console.log(error);
                });
        });
    </script>
</body>

</html>