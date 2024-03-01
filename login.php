<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/alphardex/aqua.css@master/dist/aqua.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background:midnightblue;

            background-size: cover;
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>

    <form class="login-form" method="post" action="masuk.php">
        <h1>Login Pengguna</h1>
        <div class="form-input-material">
            <input type="text" name="username" id="username" placeholder=" " autocomplete="off" class="form-control-material" required />
            <label for="username">Username</label>
        </div>
        <div class="form-input-material">
            <input type="password" name="password" id="password" placeholder=" " autocomplete="off" class="form-control-material" required />
            <label for="password">Password</label>
            <input type="checkbox" id="show_password" onchange="togglePasswordVisibility()">
        </div>
        <button class="btn btn-primary btn-ghost">
            Login</button>
        <button class="btn btn-primary btn-ghost" onclick="window.location.href='index.php'">
            SignUp</button>
            <?php
    // Tampilkan pesan error jika ada
    if (isset($_SESSION["error"])) {
        echo '<div style="color:red;">' . $_SESSION["error"] . '</div>';
        unset($_SESSION["error"]);
    }

    if (isset($_SESSION["error_1"])) {
        echo '<div style="color:red;">' . $_SESSION["error_1"] . '</div>';
        unset($_SESSION["error_1"]);
    }
    ?>
    </form>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>

</html>