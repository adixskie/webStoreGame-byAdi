<?php
ob_start();
session_start();
require "../koneksi.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <link rel="stylesheet" href="../login.css">
</head>
<body>
    
<div class="wrapper">
        <sapn class="bg-animated"></sapn>
        <sapn class="bg-animated2"></sapn>
        
        <div class="from-box login">
            <h2 class="animation" style="--i:0 --j:21;">Login</h2>
            <form action="" method="post">
                <div class="input-box animation" style="--i:1 --j:22;">
                    <input type="text" name="username" id="username" required>
                    <label for="username">Username</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:2 --j:23;">
                    <input type="password" name="password" id="password" required>
                    <label for="password">Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn animation" name="loginbtn" style="--i:3 --j:24;">Login</button>
            </form>
        </div>
        <div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20;">Welcome Back!!</h2>
            <p class="animation" style="--i:1; --j:21;">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
        </div>
        <div>
            <?php
                if(isset($_POST['loginbtn'])){
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);

                    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
                    $countdata = mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);

                    if($countdata>0){
                        if (password_verify($password, $data['password'])) {
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['login'] = true;
                            header('location: index.php');
                        }
                        else{
                            ?>
                            <div class="alert alert-primary" role="alert">
                            A simple primary alert—check it out!
                            </div>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <div class="alert alert-primary" role="alert">
                        A simple primary alert—check it out!
                        </div>
                        <?php
                    }
                }
            
            ?>
        </div>
    </div>

</body>
</html>