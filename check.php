<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'AviaBD');
if(!$link){
    die('ошибка подключения к базе данных');
}
$login = $_POST['login'];
    $pass = $_POST['pass'];
    $surnames = $_POST['surnames'];
    if(!$login || !$pass|| !$surnames){
        $error='вы не ввели данные';
    }
    if(!$error){
    $query= "INSERT INTO `User` (`User_Id`, `Role_id`, `Surname`, `login`, `password`) VALUES (NULL, '3', '$surnames', '$login', '$pass');";
    mysqli_query($link, $query);

    $result=$link->query("SELECT * FROM `User` WHERE `login` = '$login' AND `password` = '$pass'");
    $user=$result->fetch_assoc();

        $_SESSION['user']=[
            "id"=>$user['User_Id'],
            "role"=>$user['Role_id'],
            "surname"=>$user['Surname'],
            "login"=>$user['login']
        ];
        header('Location: ../logindex.php');
    
    //echo"$login";
    //$user=$query;
    //print_r($user);
        
    
   // header('Location: ../logindex.php');
    }
    else{ echo $error;exit;}
    mysqli_close($link);
?>