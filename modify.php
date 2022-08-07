<?php
session_start();
//檢查 cookie 中的 passed 變數是否等於 TRUE 
$passed = $_COOKIE["passed"];

//如果 cookie 中的 passed 變數不等於 TRUE
//表示尚未登入網站，將使用者導向首頁 index.html
if ($passed != "TRUE") {
  header("location:login.php");
  exit();
}

//如果 cookie 中的 passed 變數等於 TRUE
//表示已經登入網站，取得使用者資料	
else {
  require_once("dbtools.inc.php");

  $id = $_COOKIE["id"];
  // $id = $_SESSION["PHPSESSID"];

  // $sn = $_SESSION["sn"];

  //建立資料連接
  $link = create_connection();

  //執行 SELECT 陳述式取得使用者資料
  $sql = "SELECT * FROM account Where sn = $id";
  $result = execute_sql($link, "heroku_d0e242e673f9bf8", $sql);

  $row = mysqli_fetch_assoc($result);
?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>修改會員資料</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,1,0" />

    <!-- dropdown下拉式選單 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Toggle Password Visibility明暗碼顯示 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/b9bdbd120a.js"></script>

    <script type="text/javascript">
      // function check_data() {
      //   if (document.regForm.account.value.length == 0) {
      //     alert("「使用者帳號」一定要填寫");
      //     return false;
      //   }
      //   if (document.regForm.account.value.length > 10) {
      //     alert("「使用者帳號」不可以超過 10 個字元");
      //     return false;
      //   }
      //   if (document.regForm.email.value.length == 0) {
      //     alert("您的Email一定要填寫");
      //     return false;
      //   }
      //   if (document.regForm.psw.value.length == 0) {
      //     alert("「使用者密碼」一定要填寫");
      //     return false;
      //   }
      //   if (document.regForm.psw.value.length > 10) {
      //     alert("「使用者密碼」不可以超過 10 個字元");
      //     return false;
      //   }
      //   regForm.submit();
      // }

      //顯示密碼1(w3schools-Toggle Password Visibility)
      function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }

      // 顯示密碼2(https://codepen.io/Qanser/pen/dVRGJv)
      $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
          event.preventDefault();
          if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("fa-eye-slash");
            $('#show_hide_password i').removeClass("fa-eye");
          } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("fa-eye-slash");
            $('#show_hide_password i').addClass("fa-eye");
          }
        });
      });
    </script>
    <style>
      a,
      a:hover {
        color: #333;
      }

      .welcome {
        color: #AE8F00;
      }

      h1 {
        color: #000;
      }
    </style>
  </head>

  <body>
    <div id="header">
      <div class="header">
        <img src="./img/export.png" alt="Logo" class="mid">
        <h1>財賦自游 <span>Financial Independence</h1>
        <ul class="nav mid2">
          <li><a href="./index2.php"><span class="material-symbols-sharp mid2">home</span>首頁Home</a></li>
          <li><a href="./modify.php"><span class="material-symbols-sharp mid2">person</span>會員資料</a></li>
          <!-- <li><a href="./main.php"><span class="material-symbols-sharp mid2">savings</span>資產紀錄</a></li> -->
          <li class="nav-item dropdown">
          <li class="nav-item dropdown mid2">
            <a class="nav-link dropdown-toggle" style="font-size: 26px;" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><span class="material-symbols-sharp mid2">savings</span>資產紀錄</a>
            <ul class="dropdown-menu mid2 hoverbg" style=" background-color: #E7CB84;">
              <li><a class="dropdown-item" href="./main.php">金融帳戶</a></li>
              <li><a class=" dropdown-item" href="./stock_main.php">股票資產</a></li>
              <li><a class="dropdown-item" href="./cryptocurrency_main.php">虛擬貨幣</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="./TotalPieChart.php">總資金-圓餅圖</a></li>
            </ul>
          </li>
          <li><a href="./logout.php" onclick="if(confirm('確定要登出嗎?\u000aSure to Logout?')==false)return false;"><span class="material-symbols-sharp mid2">logout</span>登出</a></li>
        </ul>
        <!-- href="#" -->
      </div>
    </div>

    <section class="h-100">
      <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
          <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
            <div class="text-center my-3">
              <img src="./img/login/user1.png" alt="logo" width="100">
            </div>
            <div class="card shadow-lg">
              <div class="card-body p-4">
                <h2 class="fs-4 card-title fw-bold mb-3">會員資料修改</h2>
                <div class="welcome">
                  <h6>使用者: <b><?php echo ($_SESSION["login_user"]) ?></b></h6>
                </div>
                <form name="regForm" action="update.php" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                  <div class="mb-3">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">🔒</span>
                      </div>
                      <input id="name" type="text" class="form-control mr-3" name="account" value="<?php echo $row["username"] ?>" placeholder="使用者名稱" required autofocus>
                      <div class="invalid-feedback">
                        使用者名稱 <b>尚未輸入</b>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">📧</span>
                      </div>
                      <input id="email" type="email" class="form-control mr-3" name="email" value="<?php echo $row["email"] ?>" placeholder="Email" required>
                      <div class="invalid-feedback">
                        Email <b>尚未輸入 或 格式輸入錯誤</b>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">🔑</span>
                      </div>
                      <div class="form-group">
                        <div class="input-group" id="show_hide_password">
                          <input id="password" type="password" class="form-control pr-5 " name="psw" value="<?php echo $row["psw"] ?>" placeholder="密碼" required>
                          <div class="input-group-addon">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                          </div>
                        </div>
                      </div>

                      <!-- <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                      </div> -->

                      <div class="invalid-feedback">
                        密碼 <b>尚未輸入</b>
                      </div>
                      <!-- <input type="checkbox" onclick="myFunction()">顯示密碼 -->
                    </div>
                  </div>

                  <p class="form-text text-muted mb-2">
                    上述資料為<font color="EA0000"><b>必填</b></font>，請確認後，<b>重新修改資料<b>。
                  </p>

                  <div class="align-items-center" align="right">
                    <button type="submit" class="btn btn-primary ms-auto" onClick="check_data()">修改資料</button>
                    <button type="reset" class="btn btn-primary ms-auto">重新填寫</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="text-center mt-2 text-muted">
              Copyright &copy; 2022 &mdash; C109193110 張珈薰
            </div>
          </div>
        </div>
    </section>

    <script src="js/login.js"></script>
  </body>

  </html>

<?php
  //釋放資源及關閉資料連接
  mysqli_free_result($result);
  mysqli_close($link);
}
?>