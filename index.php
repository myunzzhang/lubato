<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/common.css">
</head>
<body>
    <div id="wrap">
        <div id="header">
            <?php include "./lib/top_login1.php"; ?>
        </div>
        <div id="menu">
            <?php include "./lib/top_menu1.php"; ?>
        </div>

        <div id="content">
            <div id="main_img">
                <img src="./img/main_img.jpg">
            </div>
        </div>
    </div>
</body>
</html>