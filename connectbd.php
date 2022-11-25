<?php
 $mysql = new mysqli('localhost', 'root', '', 'AviaBD');
 if($mysql->connect_errno) exit('ошибка подключения к бд');
 
?> 