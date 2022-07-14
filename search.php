<?php
require_once("dbtools.inc.php");
header("Content-type: text/html; charset=utf-8");

//取得表單資料
$email = $_POST["email"];

//建立資料連接
$link = create_connection();

//檢查查詢的帳號是否存在
$sql = "SELECT username, psw FROM account WHERE email = '$email'";
$result = execute_sql($link, "db_C109193110", $sql);

//如果帳號不存在
if (mysqli_num_rows($result) == 0) {
  //顯示訊息告知使用者，查詢的帳號並不存在
  echo "<script type='text/javascript'>
            alert('您所查詢的資料不存在，請檢查是否輸入錯誤。');
            history.back();
          </script>";
} else  //如果帳號存在
{
  $row = mysqli_fetch_object($result);
  $login_user = $row->username;
  $login_password = $row->psw;
  $message = "
      <!doctype html>
      <html>
        <head>
          <title></title>
          <meta charset='utf-8'>
          <style>
          html {
            background: #DCD5C3;
            text-align: center;
          }
      
          p {
            background: #E7CB84;
            color: #FFFFFF;
          }
          </style>
        </head>
        <body>
        $login_user 您好<br><br>您的帳號及密碼 資料如下：<br><br>
        　　帳號：🔒<b>$login_user</b><br>
        　　密碼：🔑<b>$login_password</b><br><br>
            <a href='./login.php'>按此登入本站</a>
          </body>
      </html>
    ";

  echo $message;   //顯示訊息告知使用者帳號密碼
}

//釋放 $result 佔用的記憶體
mysqli_free_result($result);

//關閉資料連接	
mysqli_close($link);
