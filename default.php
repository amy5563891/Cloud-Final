<!--Session 24min timeout-->
<?php
session_start();
include("conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>庫 存 管 理 系 統</title>
    <link rel="stylesheet" href="all.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">
    <script src="button.js"></script>
</head>

<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
                            <li><a href="./stock/buy.php?sid=<?php echo $_SESSION["ID"]; ?>" class="nav-link px-2 text-black">進貨商品</a></li>
                            <li><a href="./stock/sell.php?sid=<?php echo $_SESSION["ID"] ?>" class="nav-link px-2 text-black">出貨商品</a></li>
                        </ul>
                    </div>

                    <div class="subject"><a href="./search/chose.php?sid=<?php echo $_SESSION["ID"] ?>" style="color:#FFFFFF; text-decoration:none;">
                            <font size="5">庫存查詢</font>
                        </a></div>
                    <div class="subject"><a href="./default.php?sid=<?php echo $_SESSION["ID"] ?>" style="color:#FFFFFF; text-decoration:none;">
                            <font size="5">個人檔案</font>
                        </a></div>

                    <div class="subject" onmouseover="switchMenu( this, 'subch_2', 'MouseOver' )" onmouseout="hideMenu()">
                        <font size="5">歷史清單</font>
                        <ul id="subch_2" class="submenu nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" style="display:none;" type="none">
                            <li><a href="./record/buyrecord.php?sid=<?php echo $_SESSION["ID"]; ?>" class="nav-link px-2 text-black">進貨清單</a></li>
                            <li><a href="./record/soldrecord.php?sid=<?php echo $_SESSION["ID"] ?>" class="nav-link px-2 text-black">出貨清單</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="text-end">
                        <div class="subject">
                            <a href="./default.php?sid=<?php echo $_SESSION["ID"] ?>" style="color:#FFFFFF; text-decoration:none;"><?php echo $_SESSION["Name"]; ?></a>
                        </div>
                        <div class="btn btn-warning"><a href="./system/logout.php" style="color:#000000; text-decoration:none;">Sign-Out</a></div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    

    <div class="content" align='center'>
        <div class="main">
            <!-- 要改，用switch case寫  -->
            <div class="pform" align="center">
                <?php
                    $SQL="SELECT * FROM employee WHERE employee_id= ";
                    $SQL.='\''.$_SESSION["ID"].'\'';

                    if($result=mysqli_query($link,$SQL)){
                        echo "<table cellpadding=4  style='border:1px solid white;border-collapse:collapse; width:60%; height:auto;table-layout:fixed;'>";
                        $row = mysqli_fetch_assoc($result);
                        echo "<tr class='color1'><td colspan=7 align='center'>個人資訊</td></tr>";
                        echo "<tr class='color3'><td align='center'>員工編號</td><td colspan=6 align='center'>".$row["employee_id"]."</td></tr>";
                        echo "<tr class='color3'><td align='center'>員工姓名</td><td colspan=6 align='center'>".$row["e_name"]."</td></tr>";
                        echo "<tr class='color3'><td align='center'>員工帳號</td><td colspan=6 align='center'>".$row["e_account"]."</td></tr>";
                        echo "</table>";
                    }else{
                        echo "enter failed";
                    }
                ?>
            </div>  
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2023 NYCU IIM</p>
        </div>
        <div class="adition" style="background-color:white;">
       
</body>
</html>