<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/member.css">
    <title>Document</title>
    
</head>
<body>
    <div id="wrap">
        <div id="header">
            <?php include "../lib/top_login2.php"; ?>
        </div>

        <div id="menu">
             <?php include "../lib/top_menu2.php"; ?>
        </div>

        <div id="content">
        <div id="col1">
            <div id="left_menu">
                <?php include "../lib/left_menu.php"; ?>
            </div>
        </div>

        <div id="col2">
            <form name="member_form" method="post" action="login.php">
                <div id="title">
                    <img src="../img/title_login.gif">
                </div>

                <div id="login_form">
                    <img id="login_msg" src="../img/login_msg.gif" alt="login Message">
                    <div class="clear"></div>
                    <div id = "login1">
                        <img src="../img/login_key.gif" alt="login_key">
                    </div>

                    <div id="login2">
                        <div id="id_input_button" class="clearfix">
                            <div id="id_pw_title">
                                <ul>
                                    <li>
                                        <img src="../img/id_title.gif">
                                    </li>
                                    <li>
                                        <img src="../img/pw_title.gif">
                                    </li>
                                </ul>
                            </div> <!-- //id_pw_title -->
                            <div id="id_pw_input">
                                <ul>
                                    <li>
                                        <input type="text" name="id" class="login_input">
                                    </li>
                                    <li>
                                        <input type="text" name="pass" class="login_input">
                                    </li>
                                </ul>
                            </div> <!-- //id_pw_input -->
                            <div id="login_button">
                                <input type="image" src="../img/login_button.gif">
                            </div> <!-- //login_button -->
                        </div>
                        <div id="login_line"></div>
                        <div id="join_button">
                            <img src="../img/no_join.gif">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="../member/member_form.php">
                                <img src="../img/join_button.gif">
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    
    
</body>
</html>