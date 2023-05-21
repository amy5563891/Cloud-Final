<?php
ob_start();
session_start();
include("./conn.php");

$s_account=$_POST["acct"];
$spwd=$_POST["pwd"];

$SQL="SELECT * FROM employee WHERE e_account='$s_account' AND e_pwd='$spwd'";

if($result=mysqli_query($link,$SQL)){
    if($row = mysqli_fetch_assoc($result)){
        // $row = mysqli_fetch_assoc($result);
        $_SESSION["Name"]=$row["e_account"];
        $sid=$row['employee_id'];
        $_SESSION["ID"]=$row["employee_id"];
        echo"登入成功";
        header("location:./default.php?sid=$sid");
    }else{
        echo "登入失敗，將在3秒後跳轉回登入頁面";
        echo "<meta http-equiv='refresh' content='3;url=../system/login.php'/>";
    }
}
?>