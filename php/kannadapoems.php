<html>
   
   <head>
      <title>Kannada Poems</title>
   </head>
   
   <body>
      <?php
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
         
         echo "<h1>Kannada</h1>";
         
         /* Get total number of records */
         $sql = "SELECT count(Poem_ID) FROM Poem".
          " Where Poem_Lan='kan'";
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
         $row = mysql_fetch_array($retval, MYSQL_NUM );
         $rec_count = $row[0];
         
         if( isset($_GET{'page'} ) )
         {
            $page = $_GET{'page'} + 1;
            $offset = $rec_limit * $page ;
         }
         else
         {
            $page = 0;
            $offset = 0;
         }
         
         $left_rec = $rec_count - ($page * $rec_limit);
         $sql = "SELECT Poem_ID, Poem_Title, Poem_Lan ".
            "FROM Poem".
            " Where Poem_Lan='kan'".
            " LIMIT $offset, $rec_limit";
            
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
         
         while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
         {
            echo "Story ID :{$row['Poem_ID']}  <br> ".
               "Story Title : {$row['Poem_Title']} <br> ".
               "Story Lan: {$row['Poem_Lan']} <br> ".
               "<a href='poem.php?poemId={$row['Poem_ID']}'>{$row['Poem_Title']}</a><br>".
               "--------------------------------<br>";
         }
         
         if( $page > 0 )
         {
            $last = $page - 2;
            echo "<a href=\"$_PHP_SELF?page=$last\">Last 10 Poems</a> ";
            if( $rec_count>$rec_limit * ($page + 2) )
            echo "| <a href=\"$_PHP_SELF?page=$page\">Next 10 Poems</a>";
         }
         
         else if( $page == 0 && $rec_count>$rec_limit )
         {
            echo "<a href=\"$_PHP_SELF?page=$page\">Next 10 Poems</a>";
			}
			
         else if( $left_rec < $rec_limit && $rec_count >$rec_limit )
         {
            $last = $page - 2;
            echo "<a href=\"$_PHP_SELF?page=$last\">Last 10 Poems</a>";
         }
        
      ?>
      
   </body>
</html>