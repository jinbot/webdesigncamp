<?php
require("dbcon.php");
$sql = "select id,title,date from news order by date desc limit 10";
$rs = $db->query($sql);
$data = $rs->fetchAll(PDO::FETCH_ASSOC);
$data = json_encode($data);
echo $data;
// foreach($data as $row) {
// 	echo "<p>";
// 	echo $row['title'];
// 	echo "...";
// 	echo $row['date'];
// 	echo "</p>";
// }
