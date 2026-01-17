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
    <title>Registration</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <form class="regis frm" action="regis.php" id="regis" method="post" onsubmit="return validateFormInputs()">
                <h1>Registration</h1>
                <?php
                if (isset($_POST["submit"])) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $passwordRepeat = $_POST["confirm"];
                $md5Password = md5($password);
                $errors = array();
                if (empty($name) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
                    array_push($errors,"All fields are required");
                }
                // check using rfc 822
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, "Email is invalid");
                }
                if ($password!==$passwordRepeat) {
                    array_push($errors,"Passwords does not match");
                }
                require_once "php/config.php";
                $sql = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if ($rowCount>0) {
                    array_push($errors,"Email already exists!");
                }
                if (count($errors)>0) {
                    foreach ($errors as  $error) {
                        echo "<div class='error'>$error</div>";
                    }
                }else{
                    $sql = "INSERT INTO users (email, name, user_password) VALUES (?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "sss", $email, $name, $md5Password);
                    mysqli_stmt_execute($stmt);
                    if (mysqli_stmt_affected_rows($stmt) > 0) {
                        echo "<div class='success'>You have registered successfully.</div>";
                        // session_start();
                        // $_SESSION["user_name"] = $name;
                        // header("Location: welcome.php");
                        // die();
                      } else {
                        echo "<div class='error'>There was an error registering your account.</div>";
                      }
                }
                }
                ?>
                <div class="input-box">
                    <input type="text" placeholder="Name" name="name" id="name" autofocus>
                    <i class="fa-solid fa-user fa-1x"></i>
                </div>
                <div class="input-box">
                    <!-- <input type="email" placeholder="Email" name="email" id="email"
                        pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,3}$" title="format: char@char.co" required> -->
                        <input type="email" placeholder="Email" name="email" id="email" title="format: char@char.co">
                    <i class="fa-solid fa-envelope fa-1x"></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="password" id="password">
                    <i class="fa-solid fa-lock fa-1x"></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Confim password" name="confirm" id="confirm">
                    <i class="fa-solid fa-lock fa-1x"></i>
                </div>
                <button type="submit" name="submit" class="btn">REGISTER</button>
                <div class="extra-link">
                    <p>Already have an account? <a href="index.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>

</html>