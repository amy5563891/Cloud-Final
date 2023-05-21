<?php
ob_start();
session_start();
include("../conn.php");

$time=date('Y-m-d');
$p_id=$_POST["p_id"];
$p_quantity=$_POST["p_quantity"];

if((int)$p_quantity && $p_quantity != "0"){

    echo "居然來到這裡了嗎";
    $SQL1="INSERT INTO soldrecord (product_id, sold_num, sold_date) VALUES ('$p_id','$p_quantity','$time')";
    $SQL3="SELECT p_stock FROM product WHERE product_id=$p_id";
    $test=$link->query($SQL3);
    $row = $test->fetch_assoc();
    $new_stock=$row["p_stock"] -(int)$p_quantity;
    
    if ($new_stock < 0){
        echo "<script type='text/javascript'>alert('庫存數不足 哈哈'); location.href='./sell.php?sid=".$_SESSION["ID"]."';</script>";
        echo "庫存數不足 哈哈";
        // header("location:./sell.php?sid=".$_SESSION["ID"]."");
    }
    else{
        $SQL2="UPDATE product SET p_stock=$new_stock WHERE product_id=$p_id";

        if($result=mysqli_query($link, $SQL1) && $result2=mysqli_query($link, $SQL2)){
            echo "<script type='text/javascript'>alert('成功出貨囉~~~'); location.href='../record/soldrecord.php?sid=".$_SESSION["ID"]."';</script>";
            echo "成功出貨囉~~~";
            // header("location:../record/soldrecord.php?sid=".$_SESSION["ID"]."");
        }
        else{
            
        echo "<script type='text/javascript'>alert('出貨大西敗 看看你的後端是否出事 才是對的喔~~'); location.href='./sell.php?sid=".$_SESSION["ID"]."';</script>";
            echo "出貨大西敗 看看你的後端是否出事 才是對的喔~~";
            // header("location:./sell.php?sid=".$_SESSION["ID"]."");
        }
    }
}
?>