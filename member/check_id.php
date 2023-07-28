<?php 
$id=$_REQUEST["id"];
if(!$id){
    echo("아이디를 입력하세요");
}else{
    include "../lib/dbconn.php";

    $sql="SELECT * FROM member WHERE id='$id'";
    $result = mysqli_query($connect,$sql);
    $num_record=mysqli_num_rows($result); //해당하는 결과의 갯수

    if($num_record){
        echo "아이디가 중복됩니다. <br>";
        echo "다른 아이디를 사용하세요. <br>";  
    } else {
        echo "사용가능한 아이디입니다.";
    }

    mysqli_close($connect);
}

print "<div><input type = 'button' value = '창닫기' onclick='self.close()'></div>";
?>