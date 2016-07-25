<html>
<title>
Add Story
</title>

<script>
function validateForm() {
    var x = document.forms["storyForm"]["title"].value;
    if (x == null || x == "") {
        alert("Enter Story title");
        return false;
    }
}


</script>

 <h3> Content Language</h3>
 <form name="storyForm" action="submitstory.php" onsubmit="return validateForm()" method="post">
<select name="language">
  <option value="eng" selected>English</option>
  <option value="kan">Kannada</option>
</select>

<h3>Title</h3>
<input type="text" name="title">


<br><input type="submit" value="Add" name="Submit">
</form>

</html>