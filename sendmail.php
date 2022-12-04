<?
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
    $res['Cost'];
    if($check){
        $res['Cost']+500; 
    }
    else{
        $res['Cost'];
    }
   $title= $res['Title'];

    $to=trim($email);
    $from="aviamagazine@mail.ru";
    $message="$surname $name, спасибо за покупку билета - '$title'. покажите это письмо в нашем офисе.\nДетали заказа";
    $headers="FROM: aviamagazine@mail.ru" . "\r\n" .
    "Reply-To: $to" . "\r\n" . 
    "X-Mailer: PHP/" . phpversion();
    if(mail($email, "Покупка на сайте 'Avia.ru'", $message, $headers)){
        echo 'sender';
    }
    else{
        echo 'not sender'; 
    }
}
 

?>