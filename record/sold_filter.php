<!-- 歷史修課篩選結果 -->
<?php
session_start();
include("../conn.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $p_id = $_POST["p_id"];
} else {
  $p_id = $_GET["p_id"];
}
// if(isset($_POST["year"])){
//     $year=$_POST["year"];
//     // echo $year;
// }
// if(isset($_POST["semester"])){
//     $semester=$_POST["semester"];
//     // echo "$semester";
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>庫 存 管 理 系 統</title>
  <link rel="stylesheet" href="../all.css">
  <script src="../button.js"></script>
</head>
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    width: 100%;
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }

  .btn-bd-primary {
    --bd-violet-bg: #712cf9;
    --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

    --bs-btn-font-weight: 600;
    --bs-btn-color: var(--bs-white);
    --bs-btn-bg: var(--bd-violet-bg);
    --bs-btn-border-color: var(--bd-violet-bg);
    --bs-btn-hover-color: var(--bs-white);
    --bs-btn-hover-bg: #6528e0;
    --bs-btn-hover-border-color: #6528e0;
    --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
    --bs-btn-active-color: var(--bs-btn-hover-color);
    --bs-btn-active-bg: #5a23c8;
    --bs-btn-active-border-color: #5a23c8;
  }

  .bd-mode-toggle {
    z-index: 1500;
  }
</style>

<body>
  <header class="p-3 text-bg-dark">
    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
          </svg>
          <span class="fs-1 " style="color:white">庫存管理系統</span>
        </a>
      </header>
    </div>


    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start row">

        <div class="col-sm-8">
          <div class="subject" onmouseover="switchMenu( this, 'subch', 'MouseOver' )" onmouseout="hideMenu()">
            <font size="5">庫存管理</font>
            <ul class="submenu nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" id="subch" style="display:none;" type="none">
              <li><a href="../stock/buy.php?sid=<?php echo $_SESSION["ID"]; ?>" class="nav-link px-2 text-black">進貨商品</a></li>
              <li><a href="../stock/sell.php?sid=<?php echo $_SESSION["ID"] ?>" class="nav-link px-2 text-black">出貨商品</a></li>
            </ul>
          </div>

          <div class="subject"><a href="../search/chose.php?sid=<?php echo $_SESSION["ID"] ?>" style="color:#FFFFFF; text-decoration:none;">
              <font size="5">庫存查詢</font>
            </a></div>
          <div class="subject"><a href="../default.php?sid=<?php echo $_SESSION["ID"] ?>" style="color:#FFFFFF; text-decoration:none;">
              <font size="5">個人檔案</font>
            </a></div>

          <div class="subject" onmouseover="switchMenu( this, 'subch_2', 'MouseOver' )" onmouseout="hideMenu()">
            <font size="5">歷史清單</font>
            <ul id="subch_2" class="submenu nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" style="display:none;" type="none">
              <li><a href="./buyrecord.php?sid=<?php echo $_SESSION["ID"]; ?>" class="nav-link px-2 text-black">進貨清單</a></li>
              <li><a href="./soldrecord.php?sid=<?php echo $_SESSION["ID"] ?>" class="nav-link px-2 text-black">出貨清單</a></li>
            </ul>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="text-end">
            <div class="subject">
              <a href="./default.php?sid=<?php echo $_SESSION["ID"] ?>" style="color:#FFFFFF; text-decoration:none;"><?php echo $_SESSION["Name"]; ?></a>
            </div>
            <div class="btn btn-warning"><a href="../system/logout.php" style="color:#000000; text-decoration:none;">Sign-Out</a></div>
          </div>
        </div>

      </div>
    </div>
  </header>


  <div class="content" align='center'>
    <div class="main">
      <div>
        <font size="10">產品出貨清單</font>
      </div>
      <div class="pform">
        <table cellpadding=10 style="border-collapse:collapse; width:50%; height:auto;table-layout:fixed;" align="center">
          <form action="./sold_filter.php?sid=<?php echo $_SESSION["ID"] ?>" method="post" align="center" style="line-height: 10px;">
            <tr>
              <td>
                <font size="6">產品名稱</font>
              </td>
              <td colspan="2"><select name="p_id" id="p_id">
                  <option value="none" selected disabled hidden>請選擇產品名稱</option>
                  <option value="1">主機</option>
                  <option value="2">螢幕</option>
                  <option value="3">滑鼠</option>
                  <option value="4">鍵盤</option>
                  <option value="5">喇叭</option>
                </select></td>
              <td width="35%">
                <div id="right"><input type="submit" value="查詢" id="btn2" class="btn btn-primary"></div>
              </td>
            </tr>
          </form>
        </table><br /><br />
        <?php
        $SQL = "SELECT * FROM soldrecord S, product P WHERE S.product_id=P.product_id AND S.product_id=$p_id";

        echo "<table class='table table-striped table table-hover' style='width:60%; height:auto;'  align='center'>";

        echo "<tr class='color1' style='height:10px'>
                    <td style='width:15%;' align='center'>訂單編號</td>
                    <td style='width:15%;' align='center'>產品編號</td>
                    <td style='width:25%;' align='center'>產品名稱</td>
                    <td style='width:20%;' align='center'>產品數量</td>
                    <td style='width:25%;' align='center'>訂單時間</td>
                    </tr>";



        if ($result = mysqli_query($link, $SQL)) {
          $line = 0;
          $data_nums = mysqli_num_rows($result);
          $per = 10; //每頁顯示項目數量
          $pages = ceil($data_nums / $per);

          if (!isset($_GET["page"])) { //假如$_GET["page"]未設置
            $page = 1; //則在此設定起始頁數
          } else {
            $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
          }
          $start = ($page - 1) * $per; //每一頁開始的資料序號
          $result = mysqli_query($link, $SQL . ' LIMIT ' . $start . ', ' . $per) or die("Error");
          $line = 0;

          while ($row = mysqli_fetch_assoc($result)) {
            if ($line >= 10) break;
            echo "<tr class='color3' style='height:10px'>
                                <td align='center'>" . $row["sold_id"] . "</td>
                                <td align='center'>" . $row["product_id"] . "</td>
                                <td align='center'>" . $row["p_name"] . "</td>
                                <td align='center'>" . $row["sold_num"] . "</td>
                                <td align='center'>" . $row["sold_date"] . "</td></tr>";



            $line += 1;
          }
        }

        echo "</table>";
        ?>
        <?php
        //分頁頁碼
        echo '共 ' . $data_nums . ' 筆-在 ' . $page . ' 頁-共 ' . $pages . ' 頁';
        echo "<br /><a href=?page=1 style='text-decoration:none;'>首頁</a> ";
        echo "第 ";
        for ($i = 1; $i <= $pages; $i++) {
          if ($page - 3 < $i && $i < $page + 3) {
            if ($i == $page) {
              echo "<a href=?page=" . $i . "&p_id=" . $p_id . " style='text-decoration:none;'><font size='5'>" . $i . "</font></a> ";
            } else {
              echo "<a href=?page=" . $i . "&p_id=" . $p_id . " style='text-decoration:none;'>" . $i . "</a> ";
            }
          }
        }
        echo " 頁 <a href=?page=" . $pages . "&p_id=" . $p_id . " style='text-decoration:none;'>末頁</a><br /><br />";
        ?>

      </div>
    </div>
    <div class="adition" style="background-color:white;">

    </div>
  </div>

</body>

</html>