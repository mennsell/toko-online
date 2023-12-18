<?php
    session_start();
    require "koneksi.php";
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
    .main{
        height: 100vh;
    }
    .login-box{
        width: 500px;
        height: 300px;
        box-sizing: border-box;
        border-radius: 10px;

    }
    </style>
<body>
    <div class="main d-flex flex-column justify-content-center align-items-center warna3">
        <div class="login-box p-5 shadow">
            <form action="" method="post">
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
                    name="loginbtn">Login</button>
                </div>
            </form>
        </div>

        <div class="mt-3">
             <p>Belum Punya Akun? <a href="register.php" style="text-decoration: none;">Register disini</a></p>
        </div>

        <?php 
            if(isset($_POST['loginbtn'])){
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                $email = htmlspecialchars($_POST['email']);

                $query = "SELECT * FROM register WHERE nama='$username' AND password='$password'";
                $result = $conn->query( $query );

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $_SESSION["username"] = $username;
                    $_SESSION["login"] = true;
                    header('location: index.php');
                } else {
                    echo "<div class='alert alert-warning' role='alert'>
                        Akun tidak tersedia
                    </div>";
                }


                
            }
        ?>
    </div>
</body>
</html>