<?php
session_start();
include "connectbd.php"; 
$Bilet_id=$_GET['id'];
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
    <a class="linkback" href="orders.php">назад</a>
   <table class="tableman" border="1">
        <tr class="tr_table">
            <td>название</td>
            <td>цена</td>
            <td>откуда</td>
            <td>куда</td>
            <td>дата и время отправления</td>
            <td>время пути</td>
            <td></td>
        </tr>
        <?$orderbiletmas=mysqli_query($mysql, "SELECT * FROM `Bilets` WHERE `Bilets_id`='$Bilet_id'");
        
    while ($orderbilet=mysqli_fetch_assoc($orderbiletmas)){
        $idfr=$orderbilet['CountryCityFrom_id'];
        $idwh=$orderbilet['CountryCityWhere_id'];
        $select="SELECT * FROM `CountryCity` WHERE `CountryCity_id`='$idfr'";
        $select2="SELECT * FROM `CountryCity` WHERE `CountryCity_id`='$idwh'";
        $cityes=$mysql->query($select);
        $cityes2=$mysql->query($select2);
       
        ?>
         <tr class="tr_table">
            <td><?php echo $orderbilet['Title'];?></td>
            <td><?php echo $orderbilet['Cost'];?></td>
            <td>
            <?while(($city=$cityes->fetch_assoc())>0):
                     echo $city['Name'];  
                    endwhile;
                    ?>
            </td>
            <td>
            <?while(($city2=$cityes2->fetch_assoc())>0):
                     echo $city2['Name'];  
                    endwhile;
                    ?>
            </td>
            <td><?php echo $orderbilet['DepartureDateTime'];?></td>
            <td><?php echo $orderbilet['travel_time'];?></td>
            <td></td>
        </tr>
        <?
    }
        ?>
   </table> 
</body>
</html>