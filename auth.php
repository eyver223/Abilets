<?php
    session_start();
    if(!$_SESSION['user']){
        header('Location: index.php');
    }
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    if(!$login || !$pass){
        $error='вы не ввели данные';
    }
    
    $mysql = new mysqli('localhost', 'root', '', 'AviaBD');
    $result=$mysql->query("SELECT * FROM `User` WHERE `login` = '$login' AND `password` = '$pass'");
    $user=$result->fetch_assoc();
    if(!$user){
        exit();
        header('Location: /index.php');       
    }
    else{
        $_SESSION['user']=[
            "id"=>$user['User_Id'],
            "role"=>$user['Role_id'],
            "Surname"=>$user['Surname'],
            "Name"=>$user['Name'],
            "login"=>$user['login'],
            "email"=>$user['email']
        ];
        if($_SESSION['user']['role']==1){
            header('Location: /adminPages.php');
        }
        else if($_SESSION['user']['role']==2){
            header('Location: /managerPages.php');
        }
        else{
            header('Location: logindex.php');
        }
        
    }
    //$user- Array ( [User_Id] => 1 [Role_id] => 1 [Surname] => Шанев [login] => admin [password] => admin )
    //echo"$user";
   // print_r($user);
   
    
    $mysql->close();
?>
