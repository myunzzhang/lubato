<?php

$num =$_REQUEST["num"];

include "../lib/dbconn.php";

$sql = "DELETE FROM memo_ripple WHERE num=?";
$stmh=mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmh,"s",$num);
    mysqli_stmt_execute($stmh);

    header("Location:http://localhost/memberSite/memo/memo.php");

    mysqli_stmt_close($stmh); 
    mysqli_close($connect);
?>
