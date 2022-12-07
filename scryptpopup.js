const openPopUp = document.getElementById('open_pop_up');
const closePopUp= document.getElementById('pop_up_close');
const popUp=document.getElementById('pop_up');

openPopUp.addEventListener('click',function(e){
e.preventDefault();
popUp.classList.add('active');
})
closePopUp.addEventListener('click', () => {
popUp.classList.remove('active');
})



/*document.querySelector("#buttonSearch").onclick = function(){
  document.getElementById("page-bilets_list").innerHTML = "";
  
}
*/
/*document.querySelector("#buttonSearch").onclick = function(){
    var selectFrom = document.getElementById("selectFrom");
    var selectWhere = document.getElementById("selectWhere");
    var selecDate = document.getElementById("datew");
    var textSelectWere = selectWhere.options[selectWhere.selectedIndex].text;
    var textSelectFrom = selectFrom.options[selectFrom.selectedIndex].text; 
    var datetext=selecDate.value;
    if(textSelectFrom=="откуда" ){
        
    } 
     if(textSelectWere=="куда"){
      
    } 
    if(datetext.length<=0){
      
    }   
    else
    {
    document.getElementById("page-bilets_list").innerHTML = "";  
    alert(textSelectFrom);
    alert(textSelectWere);

    }
  }
  */
//  const buttonSearch = document.getElementById('buttonSearch');
//buttonSearch.addEventListener('click',function(e){
  //  e.preventDefault();
  //  document.getElementById("mainBilets").remove();
  //  })












/*

  <script >
    document.querySelector("#buttonSearch").onclick = function(){
        alert("wqeqwwwwwwww");
    var selectFrom = document.getElementById("selectFrom");
    var selectWhere = document.getElementById("selectWhere");
    var selecDate = document.getElementById("datew");
    var textSelectWere = selectWhere.options[selectWhere.selectedIndex].text;
    var textSelectFrom = selectFrom.options[selectFrom.selectedIndex].text; 
    var datetext=selecDate.value;
    
    
    //document.getElementById("page-bilets_list").innerHTML = ""; 
    <?php
    $biletmasSort= mysqli_query($mysql, "SELECT * FROM `Bilets`, `CountryCityFrom`, `CountryCityWhere` WHERE `Bilets`.`CountryCityFrom_id`=`CountryCityFrom`.`CountryCityFrom_id` AND `Bilets`.`CountryCityWhere_id`=`CountryCityWhere`.`CountryCityWhere_id` AND `CountryCityFrom`.`NameFrom`='Уфа'");
    while ($bilet2=mysqli_fetch_assoc($biletmasSort)){?>
      <?php
    echo '<div id="page-bilets_list" class="page-bilets_list">
    <div id="mainBilets" class="mainBilets">
        <div class="BiletsD">
            <div class="leftbilets">
                <p class="costbilet"><?php echo $bilet2["Cost"];?> ₽</p>
                <div class="whereFromClass">
                    <p class="graytext_p">откуда</p>
                    <p class="graytext_p">куда</p>
                    <p><?php echo $bilet2["NameFrom"];?> </p>
                    <p><?php echo $bilet2["NameWhere"]; ?></p>
                </div>                    
            </div>
            <div class="centrebilets">
                <p class="titlebilet_text"><?php echo $bilet2["Title"];?></p> 
                <br>
                <p class="graytext_p">Время пути</p>
                <p><?php echo $bilet2["travel_time"];?></p>   
            </div>
            <div class="rightbilets">
                <p class="graytext_p">дата и время</p>
                <?php $biletdeptime=$bilet2["DepartureDateTime"];
                $biletdeptime=substr($biletdeptime,0,-3);
                ?>
                <p><?php echo $biletdeptime?></p>
                <br>
                <button id="buttonBuy" type="submit" class="button_Buy">
                    <div class="form-submit__label">Купить</div>
                </button>
            </div>              
        </div>
    </div>
    </div>';
    ?>

    <?php
    }
    ?>
    
    alert("wqeqw");
    }    
         
    
    </script>  
    */