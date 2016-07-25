<?php

require_once 'config/dbconfig.php';

$db = getDatabase();
$language = $_GET['language'];
$skip =  $_GET['skip'];
$limit=  $_GET['limit'];

if(null == $skip)
	$skip = 0;

if(null == $limit)
	$limit = 5;

if(null == $language)
	$stories= $db->select("Story", "*", ["LIMIT" => [$skip, $limit]]);
else
	$stories= $db->select("Story", "*", ["Story_Lan" => $language,"LIMIT" => [$skip, $limit]]);

print_r(json_encode($stories));
//echo $db->last_query();



?>