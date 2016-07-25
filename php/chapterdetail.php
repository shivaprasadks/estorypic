<html>
   
   <head>
      <title>Story</title>
   </head>
   
   <body>

<?php

 	 $dbhost = 'localhost';
         $dbuser = 'estorypi_pavan';
         $dbpass = 'udupikrishna123';
         
         $chapterId=$_GET["chapterId"];
        
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
         if(! $conn )
         {
            die('Could not connect: ' . mysql_error());
         }
         mysql_select_db('estorypi_web');
         
         $sql = "SELECT Chapter_Text FROM Chapter where Chapter_ID='$chapterId'";
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
         
         $row = mysql_fetch_array($retval, MYSQL_ASSOC);
         
         echo "<div style='overflow-wrap: break-word'>Story<br> <br> {$row['Chapter_Text']}  <br> </div>";


?>

</body>
</html>