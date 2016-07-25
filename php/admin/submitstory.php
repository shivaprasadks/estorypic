<?php

$title=$_POST["title"];
$lan=$_POST["language"];

echo $title."<br>".$lan."<br>";

$dbhost = 'localhost';
         $dbuser = 'estorypi_pavan';
         $dbpass = 'udupikrishna123';
         
         $rec_limit = 10;
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
         if(! $conn )
         {
            die('Could not connect: ' . mysql_error());
         }
         mysql_select_db('estorypi_web');
         
          $sql = "INSERT into Story".
          "(Story_Title, Story_Lan) VALUES ('$title', '$lan')";
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
         
echo "success<br>";

echo "<a href='addchapter.php'>Add Chapter</a>";



?>