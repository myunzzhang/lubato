<?php
$num=$_REQUEST["num"];

include"../lib/dbconn.php";

$sql = "DELETE FROM memo WHERE num=?";
$stmh = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmh,"s",$num);
mysqli_stmt_execute($stmh);

header("Location:http://localhost/memberSite/memo/memo.php");
mysqli_stmt_close();
mysqli_close($connect);


?>



<!--stmt문에 대한 설명 
    위의 예시에서 mysqli_prepare() 함수를 사용하여 INSERT 문장을 준비하고,
    mysqli_stmt_bind_param() 함수를 사용하여 바인딩할 변수를 지정합니다.
    그 후, mysqli_stmt_execute() 함수를 호출하여 준비된 문장을 실행하고,
    mysqli_stmt_bind_result() 함수를 사용하여 결과 값을 바인딩합니다. 
    마지막으로, mysqli_stmt_fetch() 함수를 사용하여 결과를 순회하고 출력합니다. 
    mysqli_stmt_close() 함수를 사용하여 준비된 문장 객체를 닫습니다.
    "ssss"는 mysqli_stmt_bind_param 함수의 두 번째 매개변수로 전달되는 문자열입니다. 이 문자열은 바인딩할 매개변수의 데이터 유형을 지정하는 역할을 합니다.
    ?는 나중에 바인딩될 매개변수를 의미합니다. -->