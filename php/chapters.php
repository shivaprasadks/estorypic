<html>
   
   <head>
      <title>Chapters</title>
   </head>
   
   <body>
      <?php
          $dbhost = 'localhost';
         $dbuser = 'estorypi_pavan';
         $dbpass = 'udupikrishna123';
         
         $rec_limit = 10;
         $storyId=$_GET["storyId"];
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
         if(! $conn )
         {
            die('Could not connect: ' . mysql_error());
         }
         mysql_select_db('estorypi_web');
         
         /* Get total number of records */
         $sql = "SELECT COUNT( Chapter_ID ) 
		FROM Chapter `Chapter` 
		WHERE Chapter.Chapter_ID
		IN (
		SELECT Chapter_ID
		FROM  Storychap_rel 
		WHERE  Story_ID =  '$storyId'
		)";
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
         $sql = "SELECT Chapter_ID, Chapter_Title
		FROM  `Chapter` 
		WHERE Chapter.Chapter_ID
		IN (
		SELECT Chapter_ID
		FROM  `Storychap_rel` 
		WHERE  `Story_ID` =  '$storyId'
		)
		LIMIT $offset , $rec_limit
		";
            
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval )
         {
            die('Could kk not get data: ' . mysql_error());
         }
         
         while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
         {
            echo "ChapID :{$row['Chapter_ID']}  <br> ".
               "Chapt_Title : {$row['Chapter_Title']} <br> ".
               "<a href='chapterdetail.php?chapterId={$row['Chapter_ID']}'>{$row['Chapter_Title']}</a><br>".
               "--------------------------------<br>";
         }
         
         if( $page > 0 )
         {
            $last = $page - 2;
            echo "<a href=\"$_PHP_SELF?page=$last&storyId=$storyId\">Last 10 Chapters</a> ";
             if( $rec_count>$rec_limit * ($page + 2) )
            echo "| <a href=\"$_PHP_SELF?page=$page&storyId=$storyId\">Next 10 Chapters</a>";
         }
         
         else if( $page == 0 && $rec_count>$rec_limit)
         {
            echo "<a href=\"$_PHP_SELF?page=$page&storyId=$storyId\">Next 10 Chapters</a>";
			}
			
         else if( $left_rec < $rec_limit && $rec_count>$rec_limit)
         {
            $last = $page - 2;
            echo "<a href=\"$_PHP_SELF?page=$last&storyId=$storyId\">Last 10 Chapters</a>";
         }
         
         mysql_close($conn);
      ?>
      
   </body>
</html>