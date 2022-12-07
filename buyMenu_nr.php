<?
session_start();
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
            <form action="sendmail.php" method="POST">
            <div class="contentbuy">
                <p>откуда-куда</p>
                <p><?echo $bilet2['from']?> - <?echo $bilet2['wheres']?></p>
                <p>дата и время</p>
                 <p><?echo $bilet2['DepartureDateTime']?></p>
                 <p>Добавить багаж</p>
            <div class="bagage">
                <p class="textbagage">+ 500 ₽</p>
                <label class="switch">
                    <input type="checkbox" class="cb_baggage" name="checkb" id="cb_baggage" onclick="checkCB()">
                    <span class="slider round"></span>
                </label>
            </div>
            <p>Время пути</p>
            <p><?echo $bilet2['travel_time']?></p>
            </div> 
            
            <?
            $cost=$bilet2['Cost'];
            if(!$_SESSION['user']){  
                ?>
                    <input type="text"  pattern="^[А-Яа-яЁё]+$" minlength="2" name="surname" id="surname_u" class="userfio" placeholder="Фамилия" required>
                    <input type="text"  pattern="^[А-Яа-яЁё]+$" minlength="2" name="name" id="name_u" class="userfio" placeholder="Имя" required>
                    <input type="email" name="email" id="emails" class="userfio" placeholder="Почта" required>
                    <input type="hidden" readonly name="cost" value="<?echo $cost?>">
                                   
                <?
            }
            else{
            }
            ?>
                <button id="button_Buynow" type="submit" name="btnbuyandsend" value="<?echo $bilet2['Bilets_id']?>" class="button_Buynow" data-id="<?php echo $bilet['Bilets_id'];?>">
                    <div class="form-submit__label" id="buycost"  >Купить за <?echo $cost?></div>
                </button>          
            </form>

        <div class="reg_close" id="reg_close">
            <a href="index.php">&#10006</a></div>           
        </div>           
    </div>
</div>
<?
}
?>
    <script>
        function checkCB(){
            console.log('y');
               var jsvar='<?echo $cost?>';
               var jsvarsum='<?echo $cost+500?>';
            var cb=document.getElementById('cb_baggage');
            if(cb.checked==true){
                document.getElementById('buycost').innerHTML='';         
                document.getElementById('buycost').innerHTML+='Купить за '+jsvarsum +".00";    
            }
            else{ 
                document.getElementById('buycost').innerHTML='';      
                document.getElementById('buycost').innerHTML+='Купить за '+jsvar;
            }
        }
    </script>
</body>
</html>