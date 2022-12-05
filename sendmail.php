<?
include "logindex.php"; 
$link = mysqli_connect('localhost', 'root', '', 'AviaBD');
if(!$link){
    die('ошибка подключения к базе данных');
}
$check=$_POST['checkb'];
 $btn=$_POST['btnbuyandsend'];
 $surname=$_POST['surname'];
 $name=$_POST['name'];
 $email=$_POST['email'];
$query=mysqli_query($link, "SELECT * FROM `Bilets` WHERE `Bilets_id`='$btn'");
$res=$query->fetch_assoc();
if(!$query){
    echo "error";
}
else{
    $cost=0;
    $cityfrom=$res['CountryCityFrom_id'];
    $querycityfr=mysqli_query($link, "SELECT * FROM `CountryCity` WHERE `CountryCity_id`= $cityfrom");
    $rescityfr=$querycityfr->fetch_assoc();
   $namefrom= $rescityfr['Name'];

   $citywhere=$res['CountryCityWhere_id'];
   $querycityWh=mysqli_query($link, "SELECT * FROM `CountryCity` WHERE `CountryCity_id`= $citywhere");
   $rescitywh=$querycityWh->fetch_assoc();
  $namewhere= $rescitywh['Name'];
  $dateb=$res['DepartureDateTime'];
  $Times=$res['travel_time'];
    if($check){
       $cost= $res['Cost']+500; 
    }
    else{
        $cost= $res['Cost'];
    }
   $title= $res['Title'];

    $to=trim($email);
    $from="aviamagazine@mail.ru";
    $message="$surname $name, спасибо за покупку билета - '$title'. Покажите это письмо в нашем офисе.\nДетали заказа:\nНазвание:'$title'\nЦена: $cost ₽\nОткуда: $namefrom\nКуда: $namewhere\n Дата и время: $dateb / время пути: $Times";
    $headers="FROM: aviamagazine@mail.ru" . "\r\n" .
    "Reply-To: $to" . "\r\n" . 
    "X-Mailer: PHP/" . phpversion();
    if(mail($email, "Покупка на сайте 'Avia.ru'", $message, $headers)){
        header('Location: thank-you.html');
    }
    else{
        echo 'not sender'; 
    }
}
?>