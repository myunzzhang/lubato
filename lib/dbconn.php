<?php
    //$connect=mysqli_connect("서버주소","서버아이디","서버비번") or
    //die("SQL server에 연결할 수 없습니다.")
    //mysqli_select_db($connect,"데이터베이스이름")
?> 


<?php
    $connect=mysqli_connect("localhost","root","") or
    die("SQL server에 연결할 수 없습니다.");

    mysqli_select_db($connect,"phptest");
?> 