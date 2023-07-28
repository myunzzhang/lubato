<?php
session_start();

if(!isset($_REQUEST['id'])||empty($_REQUEST['id'])){
    echo ("
    <script>
        alert('아이디를 입력하세요.')
        history.go(-1);
    </script>
    ");

    exit;
}

if(!isset($_REQUEST['pass'])||empty($_REQUEST['pass'])){
    echo ("
    <script>
        alert('비밀번호를 입력하세요.')
        history.go(-1);
    </script>
    ");

    exit;
}

include "../lib/dbconn.php";
$id=$_REQUEST['id'];
$pass=$_REQUEST['pass'];

$sql = "SELECT * FROM member WHERE id='$id'";
$result=mysqli_query($connect,$sql);
$num_match=mysqli_num_rows($result);

if(!$num_match){
    echo("
    <script>
        alert('등록되지 않은 아이디입니다.');
        history.go(-1);
    </script>
    ");
}else{
    $row=mysqli_fetch_array($result);
    //mysql_fetch_array() 함수는 쿼리 결과로부터 한 행(row)의 데이터를 배열형태로 변환
    //select문으로 가져온 결과를 처리할 때 사용됨
    //$row[0] => 첫번째 행 $rowp['id'] id에 해당하는 행
    $db_pass=$row['passwd'];

    if($pass !== $db_pass){
        echo("
        <script>
            alert('비밀번호가 일치하지 않습니다.');
            history.go(-1);
        </script>
        "); 
        exit;
    }else{
        $userid=$row['id'];
        $username=$row['name'];
        $usernick=$row['nick'];
        $userlevel=$row['level'];

        $_SESSION['userid'] = $userid;
        $_SESSION['username'] = $username;
        $_SESSION['usernick'] = $usernick;
        $_SESSION['userlevel'] = $userlevel;
        
        echo ("
        <script>
            location.href='../index.php';
        </script>
        ");

    }
}

mysqli_close($connect);
?>