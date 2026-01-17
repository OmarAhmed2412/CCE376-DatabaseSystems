<?php
session_start();
if (isset($_SESSION["user_name"])) {
   header("Location: welcome.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Rubik:wght@600&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <form class="login frm" action="index.php" method="post" onsubmit="return validateFormInputs()">
                <h1>Login</h1>
                <?php
                if (isset($_POST["submit"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                $md5Password = md5($password);
                require_once "php/config.php";
                $sql = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($user) {
                    if ($md5Password === $user["user_password"]) {
                        session_start();b
                        $_SESSION["user_name"] = $user["name"];
                        header("Location: welcome.php");
                        die();
                    }else{
                        echo "<div class='error'>Password is incorrect</div>";
                    }
                }else{
                    echo "<div class='error'>Email does not match</div>";
                }
                }
                ?>
                <div class="input-box">
                    <!-- <input type="email" placeholder="Email" name="email" id="email"
                        pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,3}$" title="format: char@char.co" autofocus required> -->
                    <input type="email" placeholder="Email" name="email" id="email" title="format: char@char.co" autofocus>
                    <i class="fa-solid fa-envelope fa-1x"></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="password" id="password">
                    <i class="fa-solid fa-lock fa-1x"></i>
                </div>
                <button type="submit" name="submit" class="btn">LOGIN</button>
                <div class="extra-link">
                    <p>Don't have an account? <a href="regis.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>

</html>