<?  /* $categ = isset($_GET['categ']) ? $_GET['categ'] : 0; */
if (isset($_GET['parent'])) {$parent=$_GET['parent']; if ($parent=='') {$parent=0;}}
if (isset($_GET['tit'])) {$title=$_GET['tit']; /* if ($title=='') {$title=10;} */}








?>




<?  
print <<<HERE
	<center><form name="form1" id="form1" action="add_cat.php" method="POST">
	<label>title<br>
  <input value="" placeholder="введи название" type="text" name="title" id="title" >
  </label>  <br>

  <input value="$parent"  type="hidden" name="parent" id="parent" >
  <br>
	
      <input type="hidden" id="id" name="id" value="$id">
  <button type="submit" name="submit" id="submit"  value="submit">вставить</button>
	</form ></center>

  
	 
HERE;
?>