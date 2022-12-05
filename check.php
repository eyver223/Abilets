<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'AviaBD');
if(!$link){
    die('ошибка подключения к базе данных');
}
$login = $_POST['login'];
    $pass = $_POST['pass'];
    $surnames = $_POST['surnames'];
    $names=$_POST['names'];
    $emails=$_POST['emails'];
    $query2="SELECT * FROM `User` WHERE `login` = '$login' or `email` = '$emails'";
    $result=mysqli_query($link, $query2);
    if(!$login || !$pass|| !$surnames ||!$names || !$emails){
        ?><script> alert("вы не ввели данные")</script> <?
        $error='вы не ввели данные, вернитесь обратно на страницу регистрации';
        exit;
    }   
    else if($result->fetch_row()!=0){
        ?><script> alert("такой пользователь уже существует")</script> <?
        //header('Location: /registration.html');
        $er='такой пользователь уже существует, вернитесь обратно на страницу регистрации';
        exit;
        
    }
    else{
    $query= "INSERT INTO `User` (`User_Id`, `Role_id`, `Surname`, `Name`, `login`, `password`, `email`) VALUES (NULL, '3', '$surnames', ' $names', '$login', '$pass', '$emails');";
    mysqli_query($link, $query);

    
    $result=$link->query("SELECT * FROM `User` WHERE `login` = '$login' AND `password` = '$pass'");
    $user=$result->fetch_assoc();

        $_SESSION['user']=[
            "id"=>$user['User_Id'],
            "role"=>$user['Role_id'],
            "surname"=>$user['Surname'],
            "login"=>$user['login'],
            "Name"=>$user['Name'],
            "emails"=>$user['emails']
        ];
        header('Location: ../logindex.php');
    
    //echo"$login";
    //$user=$query;
    //print_r($user);
        
    
   // header('Location: ../logindex.php');
    }
   // else{ echo $error;exit;}
    mysqli_close($link);
?>