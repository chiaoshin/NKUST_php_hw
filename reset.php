<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Bootstrap 5 Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/style2.css">
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
				<li><a href="./main.php"><span class="material-symbols-sharp">savings</span>資產紀錄</a></li>
				<!-- <li><a href="#"><span class="material-symbols-sharp">logout</span>登出</a></li> -->
			</ul>
	</div>
</div>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-3">
						<img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h2 class="fs-4 card-title fw-bold mb-4">Reset Password</h2>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">New Password</label>
									<input id="password" type="password" class="form-control" name="password" value="" required autofocus>
									<div class="invalid-feedback">
										Password is required	
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password-confirm">Confirm Password</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirm" required>
								    <div class="invalid-feedback">
										Please confirm your new password
							    	</div>
								</div>

								<div class="d-flex align-items-center">
									<!-- <div class="form-check">
										<input type="checkbox" name="logout_devices" id="logout" class="form-check-input">
										<label for="logout" class="form-check-label">Logout all devices</label>
									</div> -->
									<button type="submit" class="btn btn-primary ms-auto">
										Reset Password	
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="text-center mt-2 text-muted">
						Copyright &copy; 2017-2021 &mdash; Your Company 
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>
