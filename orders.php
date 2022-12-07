<?php
session_start();
include "connectbd.php"; 
 if($_SESSION['user']['role']==2){
}
else {
    header('Location: index.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>заказы</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="jquery.js"></script> 
</head>
<body>
<a class="linkback" href="managerPages.php">назад</a>
   <table class="tableman" border="1">
        <tr class="tr_table">
            <td>Почта</td>
            <td>номер билета</td>
            <td>дата заказа</td>
            <td>багаж</td>
            <td></td>
        </tr>
        
        <?$ordermas=mysqli_query($mysql, "SELECT * FROM `Orders` ORDER BY `Orders`.`OrderId` DESC");
    while ($order=mysqli_fetch_assoc($ordermas)){
        ?>
         <tr class="tr_table">
            <td><?php echo $order['email_u'];?></td>
            <td><a href="bilets.php?id=<?php echo $order['Bilets_id'];?>"><?php echo $order['Bilets_id'];?></a></td>
            <td><?php echo $order['DateOrder'];?></td>
            <td><?php echo $order['baggage'];?></td>
            <td></td>
        </tr>
        <?
    }
        ?>
   </table> 
</body>
</html>