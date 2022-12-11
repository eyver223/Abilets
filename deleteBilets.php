<?
    include "connectbd.php"; 
$BiletsID=$_POST['btndel'];
mysqli_select_db($mysql, $db);
echo $BiletsID;
$querydel = "DELETE FROM Bilets WHERE `Bilets`.`Bilets_id` = '$BiletsID'";
$res = mysqli_query($mysql, $querydel);
if($res){
    header( "refresh:5;url = adminPages.php" ); 
    echo 'Билет был удалён. Вы будете перенаправлены примерно через 5 секунд. Если нет, нажмите <a href=" adminPages.php">ЗДЕСЬ</a>.'; 
}
else{
    header( "refresh:5;url = adminPages.php" ); 
    echo 'Произошла ошибка. Вы будете перенаправлены примерно через 5 секунд. Если нет, нажмите <a href=" adminPages.php">ЗДЕСЬ</a>.'; 
}


?>