<?php
session_start();
include "connectbd.php"; 
    if($_SESSION['user']['role']==1){
    }
    else{
        header('Location: index.php');
    }  
 ?>
 <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>авибилеты</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="jquery.js"></script> 
</head>
<body class="body"> 

<?
 if($mysql->connect_errno) exit('ошибка подключения к бд');
 $select="SELECT * FROM `CountryCity`";
 $cityes=$mysql->query($select);
 $cityes2=$mysql->query($select);
 $cityes3=$mysql->query($select);
 $cityes4=$mysql->query($select);
?> 
    <div class="button1">
        <a  href="/" class="text_Home">Главная</a>
        <button id="open_pop_up" class="btnprofiles" type="button"  >        
           <img  width="35" height="35" src="profiles_ico.png" class="icon"></img>
            <div class="btn_text" id="text_log_btn"><?= $_SESSION['user']['login'] ?></div>
        </button>
    </div>
    <div class="rightmenu" id="rightmenu">
        <div class="contentmenu" id="contentmenu">
        <div class="pop_up_close" id="pop_up_close">&#10006</div>
        <div class="menulist">
            <a>Профиль</a>
            <a href="/logout.php">выход</a>
            </div>
        </div>
    </div>
    <div class="header__title">
        <h1 >Поиск авиабилетов</h1>
    </div>

    <div class="pop_up" id="pop_upadd">
        <div class="pop_up_container">
            <div class="pop_up_body" id="pop_up_bodyadd">
                <form action="addbilets.php" method="post">
                    <input type="text" name="title" id="login" placeholder="название" required>
                    <input type="number" min="0" step="1"  name="cost" id="password" placeholder="цена" required>
                    <div class="selectwf">
                    <select id="selectFrom" name="CountryCityFrom"  class="form_search1" required>
                        <option hidden value="">откуда</option>
                            <?php while(($city=$cityes->fetch_assoc())>0):?>
                                <option value="<?=$city['CountryCity_id'];?>"><?=$city['Name'];?></option>
                            <?php endwhile;?>
                    </select>
                    <select id="selectWhere" name="CountryCityWhere" class="form_search2" required>
                        <option hidden value="">куда</option>
                            <?php while(($city2=$cityes2->fetch_assoc())>0):?>
                                <option value="<?=$city2['CountryCity_id'];?>"><?=$city2['Name'];?></option>
                            <?php endwhile;?>
                    </select>
                    </div>
                    <div>
                        <p class="apopuptext">дата и время отбытия</p>
                        <input class="inputanew" name="inputdatetime" type="datetime-local" >
                    </div>
                    <div>
                        <p class="apopuptext">время пути</p>
                        <input class="inputanew" name="time" type="time" >
                    </div>
                    <button type="submit" class="btn_submit">добавить</button>                
                </form>                 
            <div class="pop_up_close" id="pop_up_closeadd">&#10006</div>
                      
            </div>           
        </div>
    </div> 

    <div class="page-header__form">
        <div action="/search" class="avia_form_admin" >
            <select id="selectFrom" name="CountryCityFrom_id" class="form_search1">
            <option hidden value="">откуда</option>
                <?php while(($city3=$cityes3->fetch_assoc())>0):?>
                <option value="<?=$city3['id'];?>"><?=$city3['Name'];?></option>
                <?php endwhile;?>
            </select>
            <select id="selectWhere" name="CountryCityWhere_id" class="form_search2">
            <option hidden value="">куда</option>
                <?php while(($city4=$cityes4->fetch_assoc())>0):?>
                <option value="<?=$city4['id'];?>"><?=$city4['Name'];?></option>
                <?php endwhile;?>
            </select>
            <div class="avia-form__submit">
                <form  method="GET">
                    <button name="buttonSearch" id="buttonSearch" type="submit" class="button_form_submit --on-home">
                        <div class="form-submit__label">Найти билеты</div>
                    </button>
                </form>
               
            </div>   
            <button type="button" id="open_pop_upadd" class="button_form_submit --on-home">добавить билет</button>  
        </div> 
    </div>
    <div id="page-bilets_list" class="page-bilets_list">
    <?php
    $biletmas= mysqli_query($mysql, "SELECT `B`.*, `a1`.`CountryCity_id`, `a1`.`Name` as `from` , `a2`.`CountryCity_id`, `a2`.`Name` as `wheres` FROM `Bilets` as `B` LEFT JOIN `CountryCity` as `a1` ON (`a1`.`CountryCity_id` = `B`.`CountryCityFrom_id`) LEFT JOIN `CountryCity` as `a2` ON (`a2`.`CountryCity_id` = `b`.`CountryCityWhere_id`)");
    while ($bilet=mysqli_fetch_assoc($biletmas)){ ?>
        <div id="mainBilets" class="mainBilets" data-idb="<?php echo $bilet['Bilets_id'];?>"  data-fr="<?php echo $bilet['from'];?>" data-wh="<?php echo $bilet['wheres']; ?>">
        <div class="BiletsD">
            <div class="leftbilets">
                <p class="costbilet"><?php echo $bilet['Cost'];?> ₽</p>
                <div class="whereFromClass">
                    <p class="graytext_p">откуда</p>
                    <p class="graytext_p">куда</p>
                    <p ><?php echo $bilet['from'];?> </p>
                    <p ><?php echo $bilet['wheres']; ?></p>
                </div>                    
            </div>
            <div class="centrebilets">
                <p class="titlebilet_text"><?php echo $bilet['Title'];?></p> 
                <br>
                <p class="graytext_p">Время пути</p>
                <p><?php echo $bilet['travel_time'];?></p>   
            </div>
            <div class="rightbilets">
                <p class="graytext_p">дата и время</p>
                <?php $biletdeptime=$bilet['DepartureDateTime'];
                $biletdeptime=substr($biletdeptime,0,-3);
                $biletDates=substr($biletdeptime,0,-5)
                ?>
                <p data-datehow="<?php echo ($biletDates)?>"><?php echo $biletdeptime?></p>
                <br>
                <form action="deleteBilets.php" method="POST">
                    <button id="buttondel" value="<?php echo $bilet['Bilets_id'];?>" name="btndel" type="submit" class="button_Buy">
                        <div class="form-submit__label">удалить</div>
                    </button>
                </form>
                
            </div>              
        </div>
    </div>
    <?php
    }?>      
    </div>
    
    <div id="notfounddiv" class="notfounddiv hide">ничего не найдено (</div>
    <script src="scryptRighntMenu.js"></script>
    <script src="scryptadd.js"></script>
    <script src="serchjs.js"></script>   
</body>
</html>