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
//目前發現，如果用無痕式窗，則正常運作。

include_once 'dbconfig.php';

// delete condition
if (isset($_GET['delete_id'])) {
    // $sql_query = "DELETE FROM bank WHERE user_id=" . $_GET['delete_id'];
    $sql_query = "DELETE FROM stock WHERE stock_id=" . $_GET['delete_id'];

    mysqli_query($link, $sql_query);
    header("Location: $_SERVER[PHP_SELF]");
}
// delete condition
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>C109193110 張珈薰</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <!-- Navbar -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,700,1,0" />

    <!-- pie chart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <!-- dropdown下拉式選單 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- pdf -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <script type="text/javascript">
        function edt_id(id) {
            if (confirm('確定要修改嗎?\u000aSure to Edit?')) {
                window.location.href = 'stock_edit_data.php?edit_id=' + id;
            }
        }

        function delete_id(id) {
            if (confirm('確定要刪除嗎?\u000aSure to Delete?')) {
                window.location.href = 'stock_main.php?delete_id=' + id;
            }
        }
        //  onclick="confirm__logout()"
        function comfirm_logout(id) {
            if (comfirm('確定要登出嗎?\u000aSure to Logout?')) {
                window.location.href = 'logout.php';
            }
        }
    </script>

    <!-- dropdown -->
    <style>
        .hoverbg a:hover {
            background-color: #e4b51a;
        }
    </style>

    <!-- pdf -->
    <script>
        function exportPDF() {
            var step = "請按F12(開啟開發人員工具)，再按Shift+ctrl+p，最後輸入cap，找到Capture full size screenshot，即可輸出png圖片。";
            alert(step);
        }
    </script>
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

        <button class="btn btn-primary ms-auto" onclick="exportPDF()">下載PNG</button>

        <div class="welcome">
            <h2>使用者: <b><?php echo ($_SESSION["login_user"]) ?></b></h2>
        </div>

        <!-- pie chart -->
        <div class="container">
            <center>
                <div id="container"></div>
            </center>
        </div>
        <?php
        include "dbconfig.php"; // connection file with database
        $query = "SELECT * FROM stock"; // get the records on which pie chart is to be drawn
        $getData = $connection->query($query);
        ?>
        <script>
            // Build the chart
            Highcharts.chart('container', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: ''
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            connectorColor: 'silver'
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: '帳戶資產量',
                    colorByPoint: true,
                    data: [
                        <?php
                        $data = '';
                        if ($getData->num_rows > 0) {
                            while ($row = $getData->fetch_object()) {
                                $data .= '{ name:"' . $row->stock_name . '",y:' . $row->cost . '},';
                            }
                        }
                        echo $data;
                        ?>
                    ]
                }]
            });
        </script>

        <div id="body">
            <div id="content">
                <table align="center" style="border: 10px white solid;">
                    <tr>
                        <!-- <div class="welcome">
                            <h2>使用者: <b><?php echo ($_SESSION["login_user"]) ?></b></h2>
                        </div> -->
                        <th colspan="5" class="thcolor"><a href="stock_add_data.php" style="background-color:#EAC100;"><span class=" material-symbols-sharp">add</span>新增資料</a></th>
                    </tr>
                    <th style="color:#0072E3;background-color:#EAC100;border: 5px white solid;">【股票代號 Stock Symbol】</th>
                    <th style="color:#0072E3;background-color:#EAC100;border: 5px white solid;">【股票名稱 Stock Name】</th>
                    <th style="color:#0072E3;background-color:#EAC100;border: 5px white solid;">【買入價格 Price】</th>
                    <th style="color:#0072E3;background-color:#EAC100;border: 5px white solid;">【買入數量(股數) Amount】</th>
                    <th style="color:#0072E3;background-color:#EAC100;border: 5px white solid;">【手續費 Handing Fee】</th>
                    <th style="color:#0072E3;background-color:#EAC100;border: 5px white solid;">【投入成本 Cost】</th>
                    <th style="color:#0072E3;background-color:#EAC100;text-align:center;border: 5px white solid;">【紀錄 Note】</th>
                    <th colspan="2" style="color:#0080FF;background-color:#EAC100;text-align:center;border: 5px white solid;">【修改 及 刪除】</th>
                    </tr>
                    <?php
                    // $sql_query = "SELECT * FROM bank";
                    $sql_query = "SELECT stock_id,stock_symbol,stock_name,FORMAT(price,2) AS price,FORMAT(amount,0) AS amount,FORMAT(handlingFee,0) AS handlingFee,FORMAT(cost,0) AS total, note FROM stock";
                    $result_set = mysqli_query($link, $sql_query);
                    if (mysqli_num_rows($result_set) > 0) {
                        while ($row = mysqli_fetch_row($result_set)) {
                    ?>
                            <tr>
                                <td><?php echo $row[1]; ?></td> <!-- stock name(2) -->
                                <td><?php echo $row[2]; ?></td> <!-- amount(3) -->
                                <td><?php echo $row[3]; ?></td> <!-- note(4) -->
                                <td><?php echo $row[4]; ?></td> <!-- amount(3) -->
                                <td><?php echo $row[5]; ?></td> <!-- amount(3) -->
                                <td><?php echo $row[6]; ?></td> <!-- amount(3) -->
                                <td><?php echo $row[7]; ?></td> <!-- amount(3) -->
                                <td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')"><img src="./img/main/b_edit.png" align="EDIT" /></a></td>
                                <td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img src="./img/main/b_drop.png" align="DELETE" /></a></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">No Data Found !</td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>

        <div class="footer">
            <div class="fs-5 text-center mt-5 text-muted">
                <p>Copyright &copy; 2022 &mdash; C109193110 張珈薰</p>
            </div>
        </div>
    </center>
</body>

</html>