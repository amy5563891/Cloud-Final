<?php
session_start();
include("../conn.php");
$sid = $_GET["sid"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>庫 存 管 理 系 統</title>
    <link rel="stylesheet" href="../all.css">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#dep").change(function() {
                var val = $(this).val();
                if (val == "IM") {
                    $("#S_course").html("");
                    var x;
                    for (x = 0; x < B.length; x++) {
                        $("#S_course").append("<option value=" + BC[x] + ">" + B[x] + "</option>");
                    }
                    $("#degree").change(function() {
                        var val = $(this).val();
                        if (val == 1) {
                            $("#S_course").html("");
                            var x;
                            for (x = 0; x < B1.length; x++) {
                                $("#S_course").append("<option value=" + BC1[x] + ">" + B1[x] + "</option>");
                            }

                        } else if (val == 2) {
                            $("#S_course").html("");
                            var x;
                            for (x = 0; x < B2.length; x++) {
                                $("#S_course").append("<option value=" + BC2[x] + ">" + B2[x] + "</option>");
                            }
                        } else if (val == 3) {
                            $("#S_course").html("");
                            var x;
                            for (x = 0; x < B3.length; x++) {
                                $("#S_course").append("<option value=" + BC3[x] + ">" + B3[x] + "</option>");
                            }
                        } else if (val == 4) {
                            $("#S_course").html("");
                            var x;
                            for (x = 0; x < B4.length; x++) {
                                $("#S_course").append("<option value=" + BC4[x] + ">" + B4[x] + "</option>");
                            }
                        }
                    });
                } else if (val == "GR") {
                    $("#S_course").html("");
                    var x;
                    for (x = 0; x < M.length; x++) {
                        $("#S_course").append("<option value=" + MC[x] + ">" + M[x] + "</option>");
                    }
                    $("#degree").change(function() {
                        var val = $(this).val();
                        if (val == 1 || val == 2 || val == 3 || val == 4) {
                            $("#S_course").html("");
                            var x;
                            for (x = 0; x < M.length; x++) {
                                $("#S_course").append("<option value=" + MC[x] + ">" + M[x] + "</option>");
                            }

                        }
                    });
                }
            });

        });
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
                            <li><a href="./buy.php?sid=<?php echo $_SESSION["ID"]; ?>" class="nav-link px-2 text-black">進貨商品</a></li>
                            <li><a href="./sell.php?sid=<?php echo $_SESSION["ID"] ?>" class="nav-link px-2 text-black">出貨商品</a></li>
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
            <div>
                <font size="10">產品進貨</font>
            </div>
            <div class="course">
                <table>
                    <form action="add.php?sid=<?php echo $_SESSION["ID"] ?>" method="post" align="center" style="line-height: 10px;">
                        <tr>
                            <td align="center">
                                <font size="5">產品名稱</font>
                            </td>
                            <td><select name="p_id" id="p_id" style="width: 300px">
                                    <option value="none" selected disabled hidden>請選擇產品名稱</option>
                                    <option text-align-last: center value="1">主機</option>
                                    <option text-align-last: center value="2">螢幕</option>
                                    <option text-align-last: center value="3">滑鼠</option>
                                    <option text-align-last: center value="4">鍵盤</option>
                                    <option text-align-last: center value="5">喇叭</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" required>
                                <font size="5">產品數量</font>
                            </td>
                            <td><input type="number" name="p_quantity" id="p_quantity" style="width: 300px" required="required"></td>
                        </tr>
                        <tr>
                            <td class="littlegrayline" style='visibility:hidden;'></td>
                            <td><input type="submit" value="新增庫存" id="btnv2" class="btn btn-primary" style="width:150px ;height:50px;" align="center"></td>
                        </tr>
                    </form>
                <table>
            </div>
        </div>
    </div>
</body>

</html>