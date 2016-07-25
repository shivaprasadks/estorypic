<?php

$storyId=$_POST["storyId"];
$chapterText=$_POST["chapterText"];
$chapterTitle=$_POST["chapterTitle"];

//echo $storyId."<br>".$chapterText."<br>".$chapterTitle;


$dbhost = 'localhost';
         $dbuser = 'estorypi_pavan';
         $dbpass = 'udupikrishna123';
         
       
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
         if(! $conn )
         {
            die('Could not connect: ' . mysql_error());
         }
         mysql_select_db('estorypi_web');
         
          $sql = "INSERT into Chapter".
          "(Chapter_Title, Chapter_Text) VALUES ('$chapterTitle', '$chapterText')";
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
         
         $chapterId=mysql_insert_id();
         
         $sql = "INSERT into Storychap_rel".
          "(Story_ID, Chapter_ID) VALUES ('$storyId', '$chapterId')";
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
         
         
echo "success<br>";

?>