<?php
ob_start();
session_start();

include("../conn.php");   
$time=date('Y-m-d');

$p_id=$_POST["p_id"];
$p_quantity=$_POST["p_quantity"];

	if((int)$p_quantity && $p_quantity != "0"){
		echo "居然來到這裡了嗎";
		$SQL1="INSERT INTO buyrecord (product_id, buy_num, buy_date) VALUES ('$p_id','$p_quantity','$time')";
		$SQL3="SELECT p_stock FROM product WHERE product_id=$p_id";
		$test=$link->query($SQL3);
		$row = $test->fetch_assoc();
		$new_stock=$row["p_stock"] +(int)$p_quantity;
		
		$SQL2="UPDATE product SET p_stock=$new_stock WHERE product_id=$p_id";

		if ($result=mysqli_query($link, $SQL1) && $result2=mysqli_query($link, $SQL2)){ //這裡是$link，不是$con
			echo "新增成功";
			echo "<script type='text/javascript'>alert('新增成功'); location.href='../record/buyrecord.php?sid=".$_SESSION["ID"]."';</script>";
	
		}
	}else{
		echo "新增失敗";
		echo "<script type='text/javascript'>alert('新增失敗'); location.href='./buy.php?sid=".$_SESSION["ID"]."';</script>";
	}
