var btnserch=document.getElementById('buttonSearch');
var selectFrom = document.getElementById("selectFrom");
var selectWhere = document.getElementById("selectWhere");
const mainB=document.getElementById('mainBilets');
const nt=document.getElementById('notfounddiv');
$(function(){
    btnserch.addEventListener('click',function(e){
        e.preventDefault();
        var textSelectWere = selectWhere.options[selectWhere.selectedIndex].text;
        var textSelectFrom = selectFrom.options[selectFrom.selectedIndex].text; 
       // var datetext=selecDate.value;
       $('[data-fr], [data-wh]').each(function(){
            let fro =$(this).data('fr');
            let whe =$(this).data('wh');
            if(textSelectFrom!="откуда" && textSelectWere!="куда")
            {
                if(fro !=textSelectFrom || whe !=textSelectWere){
                    $(this).addClass('hide');
                }
                else{
                $(this).removeClass('hide'); 
                }
            }
            else{
                if(textSelectFrom!="откуда"){
                    if(fro !=textSelectFrom){
                        $(this).addClass('hide');
                        console.log("скрытие откуда");
                    }
                    else{
                        $(this).removeClass('hide');
                        console.log("показать откуда");
                    }
                }
                if(textSelectWere!="куда"){
                    console.log("выбрано куда");                
                    if(whe !=textSelectWere){
                        $(this).addClass('hide');
                        console.log("скрытие куда");
                    }
                    else{
                        $(this).removeClass('hide');
                        console.log("показ куда");  
                    }
                }  
            }               
        });
        var hd= $('#page-bilets_list').height();
       if(hd<=0){
        $('#notfounddiv').removeClass('hide')
       }
       else{
       $('#notfounddiv').addClass('hide')
       } 
    });
});
    



