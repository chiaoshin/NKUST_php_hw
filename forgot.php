<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>forgot.php</title>
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
							<h1 class="fs-4 card-title fw-bold mb-4">忘記帳號/密碼</h1>

							<form action="search.php" method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">📩</span>
										</div>
										<input id="email" type="email" class="form-control" name="email" value="" placeholder="Email" required autofocus>
										<div class="invalid-feedback">
											Email <b>尚未輸入 或 格式輸入錯誤</b>
										</div>
									</div>
								</div>

								<div class="align-items-center" align="right">
									<button type="submit" class="btn btn-primary ms-auto">
										查詢
									</button>
									<button type="reset" class="btn btn-primary ms-auto">重設</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								還記得你的密碼? <a href="login.php" class="text-blue">返回登入</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2022 &mdash; C109193110 張珈薰
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>

</html>