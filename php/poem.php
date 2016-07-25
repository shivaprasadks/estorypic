<html>
   
   <head>
      <title>Poem</title>
   </head>
   
   <body>

<?php

 	 $dbhost = 'localhost';
         $dbuser = 'estorypi_pavan';
         $dbpass = 'udupikrishna123';
         
         $poemId=$_GET["poemId"];
        
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
         if(! $conn )
         {
            die('Could not connect: ' . mysql_error());
         }
         mysql_select_db('estorypi_web');
         
         $sql = "SELECT Poem_Text FROM Poem where Poem_ID='$poemId'";
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
         
         $row = mysql_fetch_array($retval, MYSQL_ASSOC);
         
         echo "<div style='overflow-wrap: break-word'>Poem<br> <br> {$row['Poem_Text']}  <br> </div>";


?>

</body>
</html>