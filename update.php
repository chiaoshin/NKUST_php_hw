`<?php
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE["passed"];

  /* 如果 cookie 中的 passed 變數不等於 TRUE，
     表示尚未登入網站，將使用者導向首頁 index.html */
  if ($passed != "TRUE") {
    header("location:login.php");
    exit();
  }

  /* 如果 cookie 中的 passed 變數等於 TRUE，
     表示已經登入網站，則取得使用者資料 */ else {
    require_once("dbtools.inc.php");

    //取得 modify.php 網頁的表單資料
    $id = $_COOKIE["id"];
    $login_user = $_POST["account"];
    $login_password = $_POST["psw"];
    $email = $_POST["email"];

    //建立資料連接
    $link = create_connection();

    //執行 UPDATE 陳述式來更新使用者資料
    $sql = "UPDATE account SET username = '$login_user',psw = '$login_password', email = '$email' WHERE sn = $id";
    $result = execute_sql($link, "db_C109193110", $sql);
    // var_dump($link);

    //關閉資料連接
    mysqli_close($link);
  }
  ?>
<!doctype html>
<html>

<head>
  <title>成功修改會員資料</title>
  <meta charset="utf-8">
</head>

<body style="background-color:#DCD5C3">
  <div class="bg">

    <body bgcolor="#DCD5C3">
  </div>
  <center>
    <br><br>
    <b><?php echo $login_user ?></b><br> 恭喜您，<font color="EA000">修改資料成功</font>。
    <p><a href="main.php">回首頁</a></p>
  </center>
</body>

</html>