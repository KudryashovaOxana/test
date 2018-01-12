<?php

 include "db_connect.php";
 include_once "filling_db.php";

?>
  <!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Тестовое задание</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Goods</h1>
<?php
    $countView = 10;
    if(isset($_GET['page'])){
        $pageNum = (int)$_GET['page'];
    }else{
        $pageNum = 1;
    }
    $startIndex = ($pageNum - 1)*$countView;
    
  $sql = "SELECT * FROM goods LIMIT $startIndex, $countView";
  $result = $conn->query($sql);
  
  echo "<table> <tr>";
  for($i = 0; $i < $conn->field_count; $i++)
			{
				$field_info = $result->fetch_field();
				echo "<th><a href=index.php>{$field_info->name}</a></th>";
			}
			
			echo '</tr>';
    while ($row = $result->fetch_row()) {
    echo "<tr>";
				foreach($row as $_column) {
					echo "<td>{$_column}</td>";
				}
				echo "</tr>";
    }
    echo "</table>";
    
    $sql2 = "SELECT COUNT(*) FROM goods ";
    $result2 = $conn->query($sql2);
    while($row2 = $result2->fetch_row()){
        $countAllRecords = $row2[0];
    }
    $countAllRecords = 1000;
    $str_pag = ceil($countAllRecords/$countView);
   
   for ($i = 1; $i <= $str_pag; $i++){
	echo "<a href=index.php?page=".$i."> | ".$i." </a>";
}

$conn->close();
 ?> 
 </body>
 </html>
