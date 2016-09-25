<?php
require("dbcon.php");
$id= 0;
$count = "";
if (isset($_POST['id'])){

	$id=(int)$_POST['id'];
}
if ($id){
	$sql = "delete  from news where id={$id}";
	$rs = $db->query($sql);
	
	$count = $rs->rowCount();
}
echo $count;
// foreach($data as $row) {
// 	echo "<p>";
// 	echo $row['title'];
// 	echo "...";
// 	echo $row['date'];
// 	echo "</p>";
// }
