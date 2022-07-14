<?php
//判斷偷用網址進來的阻擋
session_start();        //啟動session
//檢查是否正常登入，檢查session裡面有沒有login_user
if (!isset($_SESSION["login_user"])) {

	//如果沒有，就跳到login.php
	echo "<script type='text/javascript'>alert('提醒您：登入後才能使用!');</script>";
	header("location:login.php");
}
//但測試時找不到bug，用此還是無法阻擋，可能cookie有紀錄。

include_once 'dbconfig.php';
if (isset($_POST['btn-save'])) {
	// variables for input data
	$cryptocurrency_name = $_POST['cryptocurrency_name'];
	$price = $_POST['price'];
	$amount = $_POST['amount'];
	$handlingFee = $_POST['handlingFee'];
	$cost = $_POST['cost'];
	$TWD_cost = $_POST['TWD_cost'];
	$note = $_POST['note'];
	// variables for input data

	// sql query for inserting data into database
	$sql_query = "INSERT INTO cryptocurrency(cryptocurrency_name,price,amount,handlingFee,cost,TWD_cost,note) VALUES('$cryptocurrency_name','$price','$amount','$handlingFee','$cost','$TWD_cost','$note')";
	// sql query for inserting data into database

	// sql query execution function
	if (mysqli_query($link, $sql_query)) {
?>
		<script type="text/javascript">
			alert('資料新增成功!!!\u000aData Are Inserted Successfully ');
			window.location.href = 'cryptocurrency_main.php';
		</script>
	<?php
	} else {
	?>
		<script type="text/javascript">
			alert('資料新增失敗!!!\u000aerror occured while inserting your data');
		</script>
<?php
	}
	// sql query execution function
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>C109193110 張珈薰</title>
	<link rel="stylesheet" href="style.css" type="text/css" />

	<!-- header -->
	<link rel="stylesheet" href="./css/style2.css">
	<link rel="stylesheet" href="./css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,1,0" />

</head>

<body>
	<center>

		<div id="header">
			<div class="header">
				<img src="./img/export.png" alt="Logo" class="mid">
				<h1>財賦自游 <span>Financial Independence</h1>
				<ul class="nav mid2">
					<li><a href="./index2.php"><span class="material-symbols-sharp mid2">home</span>首頁Home</a></li>
					<li><a href="./modify.php"><span class="material-symbols-sharp mid2">person</span>會員資料</a></li>
					<li><a href="./cryptocurrency_main.php"><span class="material-symbols-sharp mid2">savings</span>資產紀錄</a></li>
					<li><a href="./login.php" onclick="if(confirm('確定要登出嗎?\u000aSure to Logout?')==false)return false;"><span class="material-symbols-sharp mid2">logout</span>登出</a></li>
				</ul>
				<!-- href="#" -->
			</div>
		</div>

		<div id="body">
			<div id="content">
				<form method="post">
					<table align="center" style="border: 10px white solid;">
						<tr>
							<td align="center"><a href="cryptocurrency_main.php">回到該頁 資產紀錄<br>back to main page</a></td>
						</tr>
						<tr>
							<td><input type="text" name="cryptocurrency_name" placeholder="貨幣名稱 cryptocurrency Name" required /></td>
						</tr>
						<tr>
							<td><input type="text" name="price" placeholder="買入價格 Price" required /></td>
						</tr>
						<tr>
							<td><input type="text" name="amount" placeholder="買入數量 Amount" required /></td>
						</tr>
						<tr>
							<td><input type="text" name="handlingFee" placeholder="手續費 Handing Fee" required /></td>
						</tr>
						<tr>
							<td><input type="text" name="cost" placeholder="投入成本 Cost" required /></td>
						</tr>
						<tr>
							<td><input type="text" name="TWD_cost" placeholder="台幣成本 TWD Cost" required /></td>
						</tr>
						<tr>
							<td><input type="text" name="note" placeholder="紀錄 Note" required /></td>
						</tr>
						<tr>
							<td><button type="submit" name="btn-save"><strong>儲存 SAVE</strong></button></td>
						</tr>
					</table>
				</form>
			</div>
		</div>

	</center>
</body>

</html>