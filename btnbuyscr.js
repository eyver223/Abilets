//const btnbuy=document.getElementById('buttonBuy');
//const mb=document.getElementById('mainBilets');

$('.buttonBuy').on('click', addto);
function addto(){
    var id = $(this).attr('data-id'); 
    console.log(id);
}
