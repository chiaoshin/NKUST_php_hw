<?php
//判斷偷用網址進來的阻擋
session_start();        //啟動session
//如果已經正常登入，$_SESSION["login_user"]有資料
if (isset($_SESSION["login_user"])) {

	//如果有，就跳到main.php
	// header("location:main.php");
	//換此用無痕導致登出有問題bug
}

if (isset($_POST["account"])) {
	require_once("dbconfig.php");

	//取得登入資料
	$login_user = $_POST["account"]; 		//admin
	$login_password = $_POST["psw"];		//qq11

	//用網路文章解決SQL注入問題(此方法沒有很全面)，預處理，會出現bug，找方法解決，多加一個$link。
	$login_user_xx = mysqli_real_escape_string($link, $login_user);
	$login_password_xx = mysqli_real_escape_string($link, $login_password);

	// //建立資料連接
	// $link = create_connection();

	//檢查帳號密碼是否正確
	$sql = "SELECT sn, username, email FROM account WHERE username = '$login_user_xx'
            AND psw = '$login_password_xx'";
	// $result = execute_sql($link, "album", $sql);
	$result = mysqli_query($link, $sql);

	//若沒找到資料，表示帳號密碼錯誤
	if (mysqli_num_rows($result) == 0) {

		//釋放 $result 佔用的記憶體
		mysqli_free_result($result);

		//關閉資料連接	
		mysqli_close($link);

		//顯示訊息要求使用者輸入正確的帳號密碼
		echo "<script type='text/javascript'>alert('帳號密碼錯誤，請查明後再登入')</script>";
	} else     //如果帳號密碼正確
	{
		//將使用者資料加入 Session
		//session_start();
		$row = mysqli_fetch_object($result);
		$_SESSION["login_user"] = $row->username;
		$_SESSION["login_email"] = $row->email;

		//釋放 $result 佔用的記憶體	
		mysqli_free_result($result);

		//關閉資料連接	
		mysqli_close($link);

		//Cookie設定
		setcookie("id", $row->sn);
		setcookie("passed", "TRUE");

		header("location:index2.php");	//成功連結資料庫，到達主畫面
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>login.php</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/style2.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,1,0" />
</head>

<body>
	<div id="header">
		<div class="header">
			<img src="./img/export.png" alt="Logo" class="mid">
			<h1>財賦自游 <span>Financial Independence</h1>
			<ul class="nav">
				<li><a href="./index.php"><span class="material-symbols-sharp">home</span>首頁Home</a></li>
				<li><a href="./login.php"><span class="material-symbols-sharp">person</span>登入/註冊</a></li>
				<li><a href="javascript:alert('請登入才能使用!')"><span class="material-symbols-sharp">savings</span>資產紀錄</a></li>
				<!-- <li><a href="#"><span class="material-symbols-sharp">logout</span>登出</a></li> -->
			</ul>
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
						<div class="card-body p-5">
							<h2 class="fs-4 card-title fw-bold mb-4">登入</h2>
							<form action="login.php" method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<!-- <label class="mb-2 text-muted" for="email">E-Mail Address</label> -->
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">🔒︎</span>
										</div>
										<input id="text" type="text" class="form-control input_pass" name="account" value="" placeholder="帳號" required autofocus>
										<div class="invalid-feedback">
											帳號 <b>尚未輸入</b>
										</div>
									</div>
								</div>

								<div class="mb-3">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">🗝</span>
										</div>
										<input id="password" type="password" class="form-control input_pass" name="psw" placeholder="密碼" required>
										<div class="invalid-feedback">
											密碼 <b>尚未輸入</b>
										</div>
									</div>
								</div>

								<div class="d-flex align-items-center">
									<div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label"><b>記住我</b></label>
									</div>
									<button type="submit" class="btn btn-primary ms-auto">
										登入
									</button>
									<button type="reset" class="btn btn-primary ms-auto">
										重設
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								沒有帳號? <a href="register.php" class="text-blue">註冊會員</a>
							</div>
							<div class="mb-1 w-100 d-flex justify-content-center links">
								<a href="forgot.php" class="float-end">忘記帳號/密碼</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-2 text-muted">
						Copyright &copy; 2022 &mdash; C109193110 張珈薰
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>

</html>