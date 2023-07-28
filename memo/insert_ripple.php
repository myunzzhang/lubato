<?php
session_start();

if(!$_SESSION['userid']){
    echo "
    <script>
    alert('로그인후 이용해 주세요');
    history.back();
    </script>
    ";
}
$num =$_REQUEST["num"];
$ripple_content=$_REQUEST["ripple_content"];

include "../lib/dbconn.php";

$sql = "INSERT INTO memo_ripple   (parent, id, name,nick,content,regist_day) VALUES(?,?,?,?,?,now())";
$stmh=mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmh,"sssss",$num,$_SESSION['userid'],$_SESSION['username'], $_SESSION['usernick'],$ripple_content);
    mysqli_stmt_execute($stmh);

    header("Location:http://localhost/memberSite/memo/memo.php");

    mysqli_stmt_close($stmh); 
    mysqli_close($connect);
?>
