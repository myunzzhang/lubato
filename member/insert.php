<?php
$id = $_REQUEST["id"];
$pass = $_REQUEST["pass"];
$name = $_REQUEST["name"];
$nick = $_REQUEST["nick"];
$hp1 = $_REQUEST["hp1"];
$hp2 = $_REQUEST["hp2"];
$hp3 = $_REQUEST["hp3"];
$email1 = $_REQUEST["email1"];
$email2 = $_REQUEST["email2"];

$hp=$hp1."-".$hp2."-".$hp3;
$email = $email1."@".$email2;
$regist_day = date("Y-m-d (H:i)"); //현재의 년월시

include "../lib/dbconn.php"; //데이터베이스 연결
$sql="SELECT * FROM member WHERE id = '$id'";
$result = mysqli_query($connect,$sql);
$exist_id = mysqli_num_rows($result); //결과값을 숫자로

if($exist_id){
    echo("
    <script>
        alert('해당 아이디가 존재합니다.');
        history.go(-1); /* //전 페이지로 이동 */
    </script>
    ");
    exit;
}else{
    $sql="INSERT INTO member VALUES('$id','$pass','$name','$nick','$hp','$email','$regist_day',9)";

    if(mysqli_query($connect,$sql)){
        echo "
        <script>
        location.href='../index.php';
        </script>
        ";
    }else{
        echo "데이터베이스 입력에 실패하였습니다.".mysqli_error($connect);
    }
}

mysqli_close($connect); //DB연결끊기

?>