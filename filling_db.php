<?php
    include_once "db_connect.php";
   
  
    for($i=1; $i<=1000; $i++){
        $sql3 = "INSERT INTO `goods`(`id`, `code`, `name`, `brand`, `type`, `color`, `price`, `discount`, `upload_date`) 
        VALUES ({$i},'art-{$i}','product_{$i}','brand_{$i}','type','color_{$i}','100','0','2018-01-01')";
        $res = $conn->query($sql3);        
    }
   
 ?> 