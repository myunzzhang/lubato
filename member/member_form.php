<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/member.css">
    
    <script>
        //id중복체크
        function check_id(){
             window.open("check_id.php?id=" + document.member_form.id.value, "IDCheck", "top=200,left=200,width=200,height=100");
        }
        //nick중복체크
        function check_nick(){
             window.open("check_nick.php?nick=" + document.member_form.nick.value, "NICKCheck", "top=200,left=200,width=200,height=100");
        }
        //check
        function check_input(){
            if(!document.member_form.id.value){
                alert("아이디를 입력하세요.")
                document.member_form.id.focus();
                return;
            }
            if(!document.member_form.pass.value){
                alert("비밀번호를 입력하세요.")
                document.member_form.pass.focus();
                return;
            }
            if(!document.member_form.pass_confirm.value){
                alert("비밀번호를 입력하세요.")
                document.member_form.pass_confirm.focus();
                return;
            }
            if(!document.member_form.name.value){
                alert("이름을 입력하세요.")
                document.member_form.name.focus();
                return;
            }
            if(!document.member_form.nick.value){
                alert("닉네임을 입력하세요.")
                document.member_form.nick.focus();
                return;
            }
            if(!document.member_form.hp2.value || !document.member_form.hp3.value){
                alert("휴대폰번호를 입력하세요.")
                document.member_form.hp2.focus();
                return;
            }
            if(document.member_form.pass.value !== document.member_form.pass_confirm.value){
                alert("비밀번호가 일치하지 않습니다. 다시 입력해주세요.")
                document.member_form.pass.focus();
                return;
            }

            document.member_form.submit();
        }

        //reset
        function reset_form(){
            document.member_form.id.value="";
            document.member_form.pass.value="";
            document.member_form.pass_confirm.value="";
            document.member_form.name.value="";
            document.member_form.nick.value="";
            document.member_form.hp1.value="";
            document.member_form.hp2.value="";
            document.member_form.hp3.value="";
            document.member_form.email1.value="";
            document.member_form.email2.value="";

            document.member_form.id.focus();
            return;
        }
    </script>
</head>
<body>
    <div id="wrap">
        <div id="header">
            <?php include "../lib/top_login2.php"; ?>
        </div>

        <div id="menu">
        <?php include "../lib/top_menu2.php"; ?>
        </div>

        <div id="content" class="clearfix">
            <div id="col1">
                <div id="left_menu">
                    <?php include "../lib/left_menu.php" ?>
                </div>
            </div> <!-- //col1 -->
            <div id="col2">
                <form name="member_form" method="post" action="insert.php">
                    <div id="title">
                        <img src="../img/title_join.gif">
                    </div> <!-- //title -->
                    <div id="form_join" class="clearfix">
                        <div id="join1">
                            <ul>
                                <li>* 아이디</li>
                                <li>* 비밀번호</li>
                                <li>* 비밀번호 확인</li>
                                <li>* 이름</li>
                                <li>* 닉네임</li>
                                <li>* 휴대폰</li>
                                <li>&nbsp;&nbsp;이메일</li>
                            </ul>
                        </div> <!-- //join1 -->
                        <div id="join2">
                            <ul>
                                <li>
                                    <div id="id1">
                                        <input type="text" name="id" required>
                                    </div> <!-- //id1 -->
                                    <div id="id1">
                                        <a href="#">
                                            <img src="../img/check_id.gif" onclick="check_id()">
                                        </a>
                                    </div>
                                    <div id="id3">4~12자의 영문 소문자, 숫자의 특수문자(_)만 사용할 수 있습니다.</div>
                                </li> <!-- //li1 -->
                                <li>
                                    <input type="password" name="pass" required>
                                </li><!-- //li2 -->
                                <li>
                                    <input type="password" name="pass_confirm" required>
                                </li><!-- //li3 -->
                                <li>
                                    <input type="text" name="name" required>
                                </li><!-- //li4 -->
                                <li>
                                    <div id="nick1">
                                        <input type="text" name="nick" required>
                                    </div>
                                    <div id="nick2">
                                        <a href="#">
                                            <img src="../img/check_id.gif" onclick="check_nick()">
                                        </a>
                                    </div>
                                </li><!-- //li5 -->
                                <li>
                                    <select name="hp1" calss="hp" required>
                                        <option value="010">010</option>
                                        <option value="011">011</option>
                                        <option value="016">016</option>
                                        <option value="017">017</option>
                                        <option value="019">019</option>
                                    </select>
                                    - <input type="text" class="hp" name="hp2" required> 
                                    - <input type="text" class="hp" name="hp3" required> 
                                </li><!-- //li6 -->
                                <li>
                                    <input type="text" id="email1" name="email1"> @ 
                                    <input type="text" name="email2">
                                </li><!-- //li7 -->
                            </ul>
                        </div>

                        <div id="must" class="clear">*는 필수입력 항목입니다. </div>
                    </div>

                    <div id="button">
                        <a href="#"><img src="../img/button_save.gif" onclick="check_input()"></a>&nbsp;&nbsp;
                        <a href="#"><img src="../img/button_reset.gif" onclick="reset_form()"></a>
                    </div>
                </form>
            </div> <!-- //col2 -->
        </div><!-- //content -->
    </div>
</body>
</html>