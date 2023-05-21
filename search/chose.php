<?php
session_start();
include("../conn.php");
$sid = $_GET["sid"];
$_SESSION["ID"] = $_GET["sid"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>庫 存 管 理 系 統</title>
    <link rel="stylesheet" href="../all.css">
    <!-- <link rel="stylesheet" href="../system/login.css"> -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="../button.js"></script>

    <script>
        $(function() {
            var w = $("#mwt_slider_content").width();
            // $('#mwt_slider_content').css('height', ($(window).height() - 50) + 'px' ); //將區塊自動撐滿畫面高度

            $("#mwt_fb_tab").mouseover(function() { //滑鼠滑入時
                if ($("#mwt_mwt_slider_scroll").css('right') == '-' + w + 'px') {
                    $("#mwt_mwt_slider_scroll").animate({
                        right: '0px'
                    }, 400, 'swing');
                }
            });


            $("#mwt_slider_content").mouseleave(function() { //滑鼠離開後
                $("#mwt_mwt_slider_scroll").animate({
                    right: '-' + w + 'px'
                }, 400, 'swing');
            });
        });

        $(function() {
            var w = $("#mwt_slider_content2").width();
            // $('#mwt_slider_content2').css('height', ($(window).height() - 50) + 'px' ); //將區塊自動撐滿畫面高度

            $("#mwt_fb_tab2").mouseover(function() { //滑鼠滑入時
                if ($("#mwt_mwt_slider_scroll2").css('right') == '-' + w + 'px') {
                    $("#mwt_mwt_slider_scroll2").animate({
                        right: '0px'
                    }, 400, 'swing');
                }
            });


            $("#mwt_slider_content2").mouseleave(function() { //滑鼠離開後
                $("#mwt_mwt_slider_scroll2").animate({
                    right: '-' + w + 'px'
                }, 400, 'swing');
            });
        });

        $(function() {
            var w = $("#mwt_slider_content3").width();
            // $('#mwt_slider_content3').css('height', ($(window).height() - 50) + 'px' ); //將區塊自動撐滿畫面高度

            $("#mwt_fb_tab3").mouseover(function() { //滑鼠滑入時
                if ($("#mwt_mwt_slider_scroll3").css('right') == '-' + w + 'px') {
                    $("#mwt_mwt_slider_scroll3").animate({
                        right: '0px'
                    }, 400, 'swing');
                }
            });


            $("#mwt_slider_content3").mouseleave(function() { //滑鼠離開後
                $("#mwt_mwt_slider_scroll3").animate({
                    right: '-' + w + 'px'
                }, 400, 'swing');
            });
        });
    </script>
    <script type="text/javascript">
        function show(obj, item) {
            document.getElementById(item).style.display = obj.checked ? "block" : "none";
        }

        function show2(obj, item) {
            document.getElementById(item).style.display = obj.checked ? "none" : "block";
        }
    </script>

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
                            <li><a href="../record/buyrecord.php?sid=<?php echo $_SESSION["ID"]; ?>" class="nav-link px-2 text-black">進貨清單</a></li>
                            <li><a href="../record/soldrecord.php?sid=<?php echo $_SESSION["ID"] ?>" class="nav-link px-2 text-black">出貨清單</a></li>
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
            <div class="pform" align="center">
                <table cellpadding=10 style="border-collapse:collapse; width:50%; height:auto; table-layout:fixed;">
                    <form action="search.php?sid=<?php echo $_SESSION["ID"] ?>" method="post" align="center" style="line-height: 10px;">
                        <tr>
                            <td>
                                <font size="6">產品名稱</font>
                            </td>
                            <td colspan="2">
                                <select name="productname" required>
                                    <option value="none" selected disabled hidden>請選擇產品名稱</option>
                                    <option value="1">主機</option>
                                    <option value="2">螢幕</option>
                                    <option value="3">滑鼠</option>
                                    <option value="4">鍵盤</option>
                                    <option value="5">喇叭</option>
                                </select>
                            </td>
                            <td width="35%">
                                <div id="right"><input type="submit" value="查詢" id="btn2" class="btn btn-primary"></div>
                            </td>
                        </tr>
                    </form>
                </table>

            </div>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2023 NYCU IIM</p>
        </div>
        <div class="adition" style="background-color:white;">
    </div>
</body>

</html>