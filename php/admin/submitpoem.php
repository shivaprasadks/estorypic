<?php

$title=$_POST["title"];
$lan=$_POST["language"];
$poemtext=$_POST["poemtext"];

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
         
          $sql = "INSERT into Poem".
          "(Poem_Title,Poem_Text, Poem_Lan) VALUES ('$title','$poemtext', '$lan')";
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
         
echo "success<br>";


?>