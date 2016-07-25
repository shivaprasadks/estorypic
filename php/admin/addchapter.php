<html>
<title> Add Chapter</title>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<h3> Select Language </h3>

<form action="submitchapter.php" method="POST" name="storyForm" onsubmit="return validateForm()">
<script>


function onLanguageSelect(){
  var myselect = document.getElementById("language");
  var b=myselect.options[myselect .selectedIndex].value;
  window.location="addchapter.php?lang="+b;
}


function validateForm() {
    var x = document.forms["storyForm"]["chapterText"].value;
    if (x == null || x == "") {
        alert("Enter Chapter Text");
        return false;
    }
    
    var x = document.forms["storyForm"]["chapterTitle"].value;
    if (x == null || x == "") {
        alert("Enter Chapter Title"); 
        return false;
    }
    
    var myselect = document.getElementById("story");
  	var x=myselect.options[myselect .selectedIndex].value;
  	
    if(x=="default") {
        alert("Select story");
        return false;
    }
}

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("$imgInp").change(function(){
    alert("ll");
        readURL(this);
    });


</script>


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
         
         $lang=$_GET['lang'];
         
         if(null==$lang)
         	$lang="eng";
         
         echo "<select onChange='onLanguageSelect()' id='language'>
    		<option value='eng' "; if($lang=="eng") echo "selected=selected"; echo "  >English</option>
   		 <option value='kan' "; if($lang=="kan") echo "selected=selected"; echo "  >Kannada</option>
		</select>";
        
         
         
echo "<h3>Select story</h3>";


$sql = "SELECT Story_Title, Story_ID".
            " FROM Story where Story_Lan='$lang'";
            
         $retval = mysql_query( $sql, $conn );
         
         if(! $retval )
         {
            die('Could not get data: ' . mysql_error());
         }
         
         echo '<select id="story" name="storyId">';
         echo "<option value='default' selected='selected'>---</option>";
         while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
         {
            echo '<option value="' . htmlspecialchars($row['Story_ID']) . '">' 
        . htmlspecialchars($row['Story_Title']) 
        . '</option>';
         }
         echo '</select>';

?>

<h3> Chapter title </h3>
<input name="chapterTitle" id ="chapterTitle" type="text"/>

<h3> Chapter Text</h3>

<textarea id ="chapterText" style="width:100%" rows=5 name="chapterText"></textarea>

<input type='file' id="imgInp" />
    <img id="preview" src="#" alt="your image" />

<input type="submit" value="Submit"/>
</form>
</body>
</html>