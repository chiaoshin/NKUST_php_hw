<?php
session_start();
if (!isset($_SESSION["login_user"])) {

    header("location:index.php");
}
// setcookie("id", "sn");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index.php</title>

    <!-- <link rel="stylesheet" href="style.css" type="text/css" /> -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,1,0" />


    <!-- 輪播圖片最新bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <script type="text/javascript">
        //  onclick="confirm__logout()"
        function comfirm_logout() {
            if (comfirm('Sure to Logout?')) {
                window.location.href = 'logout.php';
            }
        }
    </script>
</head>

<body>
    <div id="header">

        <div class="header">
            <img src="./img/export.png" alt="Logo" class="mid">
            <h1>財賦自游 <span>Financial Independence</h1>
            <ul class="nav">
                <li><a href="./index2.php"><span class="material-symbols-sharp">home</span>首頁Home</a></li>
                <li><a href="./modify.php"><span class="material-symbols-sharp">person</span>會員資料</a></li>
                <li><a href="./main.php"><span class="material-symbols-sharp">savings</span>資產紀錄</a></li>
                <li><a href="./logout.php" onclick="if(confirm('確定要登出嗎?')==false)return false;"><span class="material-symbols-sharp">logout</span>登出</a></li>
            </ul>
        </div>

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <!-- 圖片切換 -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/index1.png" class="d-block w-100" alt="col1">
                </div>
                <div class="carousel-item">
                    <img src="./img/index2.png" class="d-block w-100" alt="col2">
                </div>
                <div class="carousel-item">
                    <img src="./img/index3.png" class="d-block w-100" alt="col3">
                </div>
            </div>
            <!-- 左右箭頭 -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="welcome">
            <h2>Welcome! 使用者: <b><?php echo ($_SESSION["login_user"]) ?></b></h2>
        </div>

        <div class="footer">
            <div class="fs-5 text-center mt-5 text-muted">
                <p>Copyright &copy; 2022 &mdash; C109193110 張珈薰</p>
            </div>
        </div>
    </div>


</body>

</html>