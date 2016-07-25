<html>
<title>
Add Poem
</title>

<script>
function validateForm() {
    var x = document.forms["storyForm"]["title"].value;
    if (x == null || x == "") {
        alert("Enter Story title");
        return false;
    }
    var x = document.forms["storyForm"]["poemtext"].value;
    if (x == null || x == "") {
        alert("Enter Story title");
        return false;
    }
}


</script>

 <h3> Content Language</h3>
 <form name="storyForm" action="submitpoem.php" onsubmit="return validateForm()" method="post">
<select name="language">
  <option value="eng" selected>English</option>
  <option value="kan">Kannada</option>
</select>

<h3>Poem Title</h3>
<input type="text" name="title">

<h3>Poem text</h3>
<textarea id ="poemText" style="width:100%" rows=5 name="poemtext"></textarea>


<br><input type="submit" value="Add" name="Submit">
</form>

</html>