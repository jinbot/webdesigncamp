<?php
require("dbcon.php");
$id = 0;
$act = "";
$title = "";
$content = "";
$count = 0;
if( isset( $_POST['id'] ) ) { $id = (int)$_POST['id']; }
if( isset( $_POST['act'] ) ) { $act = $_POST['act']; }
if( isset( $_POST['title'] ) ) { $title = $_POST['title']; }
if( isset( $_POST['content'] ) ) {	$content = $_POST['content']; }

if( $act == "update" ){
	if( $id && $title && $content ) {
		$sql = "update news set ";
		$sql .= " title='{$title}', content='{$content}', date=now() ";
		$sql .= " where id={$id}";
		$rs = $db->query($sql);
		$count = $rs->rowCount();
	}
} else if( $act == "insert" ) {
	if( $title && $content ) {
		$sql = "insert into news set ";
		$sql .= " title='{$title}', content='{$content}', date=now() ";
		$rs = $db->query($sql);
		$count = $rs->rowCount();
	}
}

echo $count;