<html>
   
   <head>
      <title>Stories</title>
   </head>
   
   <script>
   function confirmDeletion(){
      var confirmed = confirm("Are you sure you want to delete?");
      return confirmed;
}
   </script>
   
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
         
         echo "<h1>English </h1>";
         
         /* Get total number of records */
         $sql = "SELECT count(Story_ID) FROM Story".
          " Where Story_Lan='eng'";
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
         $sql = "SELECT Story_ID, Story_Title, Story_Lan ".
            "FROM Story".
            " Where Story_Lan='eng'".
            " LIMIT $offset, $rec_limit";
            
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
         
         while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
         {
            echo "Story ID :{$row['Story_ID']}  <br> ".
               "Story Title : {$row['Story_Title']} <br> ".
               "Story Lan: {$row['Story_Lan']} <br> ".
               "<a href='chapteredit.php?storyId={$row['Story_ID']}'>{$row['Story_Title']}</a><br>".
               "<a onclick= 'return confirmDeletion();' href='storydelete.php?storyId={$row['Story_ID']}'>Delete</a><br>".
                "<a href='storyedit.php?storyId={$row['Story_ID']}'>Edit</a><br>".
               "--------------------------------<br>";
         }
         
         if( $page > 0 )
         {
            $last = $page - 2;
            echo "<a href=\"$_PHP_SELF?page=$last\">Last 10 Stories</a> ";
            if( $rec_count>$rec_limit * ($page + 2) )
            echo "| <a href=\"$_PHP_SELF?page=$page\">Next 10 Stories</a>";
         }
         
         else if( $page == 0 && $rec_count>$rec_limit )
         {
            echo "<a href=\"$_PHP_SELF?page=$page\">Next 10 Stories</a>";
			}
			
         else if( $left_rec < $rec_limit && $rec_count >$rec_limit )
         {
            $last = $page - 2;
            echo "<a href=\"$_PHP_SELF?page=$last\">Last 10 Stories</a>";
         }
        
      ?>
      
   </body>
</html>