<?php
session_start();
if (!isset($_SESSION["user_name"])) {
   header("Location: index.php");
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
    <title>Welcome</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1>
                Welcome,
                <?php
                echo $_SESSION["user_name"];
                ?> 
            </h1>
            <form action="welcome.php" method="post">
            <button class="btn" name="logout">
                LOGOUT
                <?php
                if (isset($_POST["logout"])) {
                session_start();
                session_destroy();
                header("Location: index.php");
                }
                ?>
            </button>
            </form>
            
        </div>
    </div>
</body>
</html>