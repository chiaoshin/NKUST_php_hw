<?php
require_once("dbtools.inc.php");

//取得表單資料
$login_user = $_POST["account"];
$login_password = $_POST["psw"];
$email = $_POST["email"];

//建立資料連接
$link = create_connection();

//檢查帳號是否有人申請
$sql = "SELECT * FROM account Where username = '$login_user'";
$result = execute_sql($link, "db_C109193110", $sql);
// $result = mysqli_query($link, $sql);

//如果帳號已經有人使用
if (mysqli_num_rows($result) != 0) {
  //釋放 $result 佔用的記憶體
  mysqli_free_result($result);

  //顯示訊息要求使用者更換帳號名稱
  echo "<script type='text/javascript'>";
  echo "alert('您所指定的帳號已經有人使用，請使用其它使用者名稱');";
  echo "history.back();";
  echo "</script>";
}

//如果帳號沒人使用
else {
  //釋放 $result 佔用的記憶體	
  mysqli_free_result($result);

  //執行 SQL 命令，新增此帳號
  $sql = "INSERT INTO account (username, psw, email) VALUES ('$login_user', '$login_password','$email')";

  $result = execute_sql($link, "db_C109193110", $sql);
  // $result = mysqli_query($link, $sql);
}

//關閉資料連接	
mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>新增帳號成功</title>
  <style>
    html {
      background: #DCD5C3;
    }

    p {
      background: #E7CB84;
      color: #FFFFFF;
    }
  </style>
</head>

<body bgcolor="#E7CB84">
  <p align="center">
    <font color="#000000">恭喜您已經註冊成功了，您的資料如下：（請勿按重新整理鈕）</font><br>
    🔒︎帳號：<font color="#FF0000"><?php echo $login_user ?></font><br>
    🗝密碼：<font color="#FF0000"><?php echo $login_password ?></font><br>
    <font color="#000000"> 請記下您的帳號及密碼，然後點擊<a href="./login.php">登入網站</a>。</font>
  </p>
</body>

</html>