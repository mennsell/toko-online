<?php
    session_start();
    require "koneksi.php";

    if (isset($_POST['loginbtn'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO register VALUES ('$username', '$email', '$password', NULL)";
        $result = $conn->query($sql);

        if ($result) {
            // header("")
            header('location: user.php');
            // return false;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    
    .login-box{
        width: 500px;
        height: 300px;
        box-sizing: border-box;
        border-radius: 10px;

    }
    </style>
<body style="background-color: #CA965C; ">
    
<div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow">
            <form action="register.php" method="post">
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username"
                    id="username">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password"
                    id="password">
                </div>
                <div>
                    <label for="email">email</label>
                    <input type="email" class="form-control" name="email"
                    id="email">
                </div>
                <div>
                  <button class="btn btn-succes form-control mt-3" type="submit"
                    name="loginbtn">register</button>
                </div>
            </form>
        </div>

        <div class="mt-3">
             <p>Sudah Punya Akun? <a href="user.php" style="text-decoration: none;">login disini</a></p>
        </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>