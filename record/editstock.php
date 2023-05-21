<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editstock</title>
    <link rel="stylesheet" href="../system/login.css">
    <script src="../button.js"></script>
</head>
<body>
<div class="header">
        <div id="name">&nbsp;庫 存 管 理 系 統</div>
        <div class="line"></div>
        <div class="func">
        </div>    
    </div>

    <div class="content">
        <div class="header" id="subheader">新增產品
        </div>
        <form action="../student/buyrecord.php" method="post" align="center" style="margin-top:30px">
            <tr>
                <td>產品名稱</td>
                <td><input type="text" name="acct" required></td>
            </tr><br/><br/><br/>
            <tr>
                <td>產品數量</td>
                <td><input type="password" name="pwd" id="" required></td>
            </tr><br/><br/><br/>

            <tr>
                <td>購買日</td>
                <td><input type="password" name="pwd" id="" required></td>
            </tr><br/><br/><br/>
            <tr>
                <td>到期日</td>
                <td><input type="password" name="pwd" id="" required></td>
            </tr><br/><br/><br/>
            <div id="right">
                <input type="submit" value="儲存" id="button">
            </div>
        </form>

    </div>
</body>
</html>