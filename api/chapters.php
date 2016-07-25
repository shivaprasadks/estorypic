<?php

require_once 'config/dbconfig.php';

$db = getDatabase();
$storyid= $_GET['storyid'];

$skip =  $_GET['skip'];
$limit=  $_GET['limit'];
$storyId = $_GET['storyid'];

$con=mysqli_connect("localhost","estorypi_pavan","udupikrishna123","estorypi_web");

if(null == $skip)
	$skip = 0;

if(null == $limit)
	$limit = 5;
	
if(null == $storyId ){	
	$query = " SELECT * 
	FROM  `Chapter` 
	WHERE Chapter_ID
	IN (
	
	SELECT Chapter_ID
	FROM Storychap_rel
	)
	LIMIT $skip , $limit
	 ";	
 }else{
 $query = " SELECT * 
	FROM  `Chapter` 
	WHERE Chapter_ID
	IN (
	
	SELECT Chapter_ID
	FROM Storychap_rel
	WHERE Story_ID =$storyId 
	)
	LIMIT $skip , $limit
	 ";	
 }
	
	
$data= mysqli_query($con,$query);
$chapters= array();
while($r = mysqli_fetch_assoc($data)) {
    $chapters[] = $r;
}
print json_encode($chapters);
//echo $db->last_query();

?>