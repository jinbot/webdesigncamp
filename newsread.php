<?php
require("dbcon.php");
$id= 0;
$data = "";
if (isset($_GET['id'])){

	$id=(int)$_GET['id'];
}
if ($id){
	$sql = "select * from news where id={$id}";
	$rs = $db->query($sql);
	$data = $rs->fetch(PDO::FETCH_ASSOC);
	$data = json_encode($data);
}
echo $data;
// foreach($data as $row) {
// 	echo "<p>";
// 	echo $row['title'];
// 	echo "...";
// 	echo $row['date'];
// 	echo "</p>";
// }
