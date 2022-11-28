<?
include "connectbd.php"; 
?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>регистрация</title>
    <link rel="stylesheet" href="stylebuy.css">
</head>
<body class="body"  style="overflow: auto;">
<?
$Bilet_id=$_GET['id'];
$biletmas2= mysqli_query($mysql, "SELECT `B`.*, `a1`.`CountryCity_id`, `a1`.`Name` as `from` , `a2`.`CountryCity_id`, `a2`.`Name` as `wheres` FROM `Bilets` as `B` LEFT JOIN `CountryCity` as `a1` ON (`a1`.`CountryCity_id` = `B`.`CountryCityFrom_id`) LEFT JOIN `CountryCity` as `a2` ON (`a2`.`CountryCity_id` = `b`.`CountryCityWhere_id`) WHERE `b`.`Bilets_id`=$Bilet_id;");

while($bilet2=mysqli_fetch_array($biletmas2)){
    ?>
    <div class="pop_up" id="pop_up">
    <div class="pop_up_container">
        <div class="pop_up_body" id="pop_up_body">
            <h1 id="titleb"><? echo $bilet2['Title']?></h1>
            <div class="contentbuy">
                <p>откуда-куда</p>
                <p><?echo $bilet2['from']?> - <?echo $bilet2['wheres']?></p>
                <p>дата и время</p>
                 <p><?echo $bilet2['DepartureDateTime']?></p>
                 <p>Добавить багаж</p>
            <div class="bagage">
                <p class="textbagage">+ 500 ₽</p>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
            <p>Время пути</p>
            <p><?echo $bilet2['travel_time']?></p>
            </div>
            <?
            $cost=$bilet2['Cost']
            ?>
            <div>
                <button id="button_Buynow" type="submit" class="button_Buynow" data-id="<?php echo $bilet['Bilets_id'];?>">
                    <div class="form-submit__label">Купить за <?echo $bilet2['Cost'];?></div>
                </button>
            </div>                 
        <div class="reg_close" id="reg_close">
            <a href="index.php">&#10006</a></div>           
        </div>           
    </div>
</div>
<?
}
?>
    <script>

    </script>
</body>
</html>