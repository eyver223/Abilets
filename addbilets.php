<?
include "connectbd.php"; 
$Title=$_POST['title'];
$Cost =$_POST['cost'];
$CountryCityFrom=$_POST['CountryCityFrom'];
$CountryCityWhere=$_POST['CountryCityWhere'];
$inputdatetime=$_POST['inputdatetime'];
$time=$_POST['time'];
if($CountryCityFrom==$CountryCityWhere){
    header( "refresh:5;url = adminPages.php" );
    echo "Нельзя выбрать одинаковые города. Окно закроется автоматически через 5 секунд или нажмите <a href='adminPages.php'>СЮДА</a>.";
}
else{
    $queryinsert="INSERT INTO `Bilets`(`Bilets_id`, `Title`, `Cost`, `CountryCityFrom_id`, `CountryCityWhere_id`, `DepartureDateTime`, `travel_time`) VALUES (NULL,'$Title','$Cost','$CountryCityFrom','$CountryCityWhere','$inputdatetime','$time');";
    $msli=mysqli_query($mysql, $queryinsert);
    if($msli)
    {
        header( "refresh:3;url = adminPages.php" );
        echo"Успешно, Окно закроется автоматически через 3 секунд или нажмите <a href='adminPages.php'>СЮДА</a>."; 
    }
    else{
        header( "refresh:5;url = adminPages.php" );
        echo"произошла внутренняя ошибка, Окно закроется автоматически через 5 секунд или нажмите <a href='adminPages.php'>СЮДА</a>."; 
    }

    
}


?>