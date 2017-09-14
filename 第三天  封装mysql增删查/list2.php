<?php
require "MySql.class.php";
$db = new MySql('localhost',3306,'root','','sun');

$sql = "SELECT * FROM sun_article";
$list = $db->getAll($sql);

var_dump($list);
var_dump($db->error);