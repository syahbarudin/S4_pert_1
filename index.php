<?php 
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Daftar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/alphardex/aqua.css@master/dist/aqua.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
            background: #000;

            background-size: cover;
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <form class="login-form" method="post" action="connection.php">
        <h1>Form Daftar</h1>
        <div class="form-input-material">
            <input type="text" name="username" id="username" placeholder=" " autocomplete="off" class="form-control-material" required />
            <label for="username">Username</label>
        </div>
        <div class="form-input-material">
            <input type="password" name="password" id="password" placeholder=" " autocomplete="off" class="form-control-material" required />
            <label for="password">Password</label>
        </div>
        <button class="btn btn-primary btn-ghost">
            Daftar</button>
        <button class="btn btn-primary btn-ghost" onclick="window.location.href='login.php'">
            Login</button>
        <?php if (isset($_SESSION["error"])) : ?>
            <p style="color: red;"><?php echo $_SESSION["error"];
                                    unset($_SESSION["error"]); ?></p>
        <?php endif; ?>
        <?php if (isset($_SESSION["valid"])) : ?>
            <p style="color: green;"><?php echo $_SESSION["valid"];
                                    unset($_SESSION["valid"]); ?></p>
        <?php endif; ?>
    </form>
</body>

</html>