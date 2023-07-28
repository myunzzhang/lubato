<?php
session_start();
include "../lib/dbconn.php";
$sql="SELECT * FROM memo order by num desc";//오류수정
$result=mysqli_query($connect,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/memo.css">
</head>
<body>
    <div id="wrap">
        <div id="header">
            <?php include "../lib/top_login2.php"; ?>
        </div><!-- header -->
        <div id="menu">
         <?php include "../lib/top_menu2.php"; ?>  
        </div><!-- menu -->
        
        <div id="content">
            <div id="col1">
                <div id="left_menu">
                    <?php include "../lib/left_menu.php";?>
                </div>
            </div><!-- col1 -->
            <div id="col2">
                <div id="title">
                    <img src="../img/title_free.gif" alt="memo">
                </div>
              <?php
              if(isset($_SESSION['userid'])){
              ?>

                <div id="memo_row1">
                    <form action="insert.php" name="memo_form" method="post">
                        <div id="memo_writer">
                            <span>▷ <?= $_SESSION['usernick']?></span>
                        </div>
                        <div id="memo1">
                            <textarea name="content"  cols="85" rows="6"></textarea>
                        </div>
                        <div id="memo2">
                            <input type="image" src="../img/memo_button.gif">
                        </div>

                </form>

                </div>
            <?php
              }

              while($row = $result->fetch_assoc()){
                $memo_id=$row["id"];
                $memo_num=$row["num"];
                $memo_date=$row["regist_day"];
                $memo_nick=$row["nick"];
                $memo_content=$row["content"];
              
              ?>
              <div id="memo_writer_title">
                <ul>
                    <li id="writer_title1"><?=$memo_num?></li>
                    <li id="writer_title2"><?=$memo_nick?></li>
                    <li id="writer_title3"><?=$memo_date?></li>
                    <li id="writer_title4">
                        <?php
                        if(isset($_SESSION['userid'])){
                            if($_SESSION['userid'] == $memo_id){
                                print "<a href='delete.php?num=$memo_num'>[삭제]</a>";
                            }
                        }
                        ?>
                    </li>
                </ul>
            </div>
            <div id="memo_content">
                <?= $memo_content ?>
            </div>
            
            <div id="ripple" class="clearfix">
                <div id="ripple1">댓글</div>
                <div id="ripple2">
                    <?php
                        $sql_ripple="SELECT * FROM memo_ripple WHERE parent='$memo_num'";
                        $result_ripple=mysqli_query($connect,$sql_ripple);

                        while($row_ripple=$result_ripple->fetch_assoc()){//행을 연관배열로 변환하는 함수
                            $ripple_id=$row_ripple["id"];
                            $ripple_num=$row_ripple["num"];
                            $ripple_nick=$row_ripple["nick"];
                            $ripple_content=$row_ripple["content"];  
                            $ripple_date=$row_ripple["regist_day"]; 
                       
                    ?>
                    <div id="ripple_title">
                        <ul>
                            <li><?=$ripple_nick?></li>
                            <li id="mdi_del">
                                <?php
                                if(isset($_SESSION['userid'])){
                                    if(isset($_SESSION['userid'])==$ripple_id){
                                        print "<a href=delete_ripple.php?num=$ripple_num>[삭제]</a>";
                                    }
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                    <div id="ripple_content"><?= $ripple_content ?></div>
                    <?php
                        }
                        if(isset($_SESSION['userid'])){
                            ?>
                            <form action="insert_ripple.php" name="ripple_form" method="post">
                                <input type="hidden" name="num" value="<?=$memo_num?>">
                                <div id="ripple_insert">
                                    <div id="ripple_textarea">
                                        <textarea name="ripple_content"  cols="80" rows="3"></textarea>
                                    </div>
                                    <div id="ripple_button">
                                        <input type="image" src="../img/memo_ripple_button.png">
                                    </div>
                                </div>
                            </form>



                            <?php
                        }
                    ?>
                </div>
            </div>
             <div class="linespace_10"></div>               
            <?php
              }
              mysqli_close($connect);
              ?>
            </div><!-- col2 -->
        </div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</body>
</html>