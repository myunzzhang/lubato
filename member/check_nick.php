<?php 
$nick=$_REQUEST["nick"];
if(!$nick){
    echo("닉네임을 입력하세요.");
}else{
    include "../lib/dbconn.php";

    $sql="SELECT * FROM member WHERE nick='$nick'";
    $result = mysqli_query($connect,$sql);
    $num_record=mysqli_num_rows($result); //해당하는 결과의 갯수

    if($num_record){
        echo "닉네임이 중복됩니다. <br>";
        echo "다른 닉네임을 사용하세요. <br>";  
    } else {
        echo "사용가능한 닉네임입니다.";
    }

    mysqli_close($connect);
}

print "<div><input type = 'button' value = '창닫기' onclick='self.close()'></div>";
?>