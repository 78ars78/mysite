<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">



<div id="coolmenu4"><a href="index.php"></a></div><br>

			<strong><center>---Музыка---</center></strong>	
							

	<div id="coolmenu5"><a href="index.php?i=3"></a>	
					</div>
				
					

<?	if ($i==3) {$sql1= 'SELECT * FROM music'; $result1=mysqli_query($link,$sql1);
		$row1 = mysqli_fetch_array($result1); 
		do {  printf( "<p align=left>&nbsp&nbsp&nbsp&nbsp<a style='color:#424242; text-decoration: none;' href='#'>%s</a></p>",$row1["author"]);} 
	while ($row1=mysqli_fetch_array($result1)); } ?> 

<br>



<strong><center>---Обои---</center></strong>
<div id="coolmenu1"><a href="index.php?i=1"></a></div>
<?	if ($i==1) {$sql1="SELECT * FROM auto_razr WHERE j=0 ORDER BY id";
				$result1=mysqli_query($link,$sql1); 
				$row1= mysqli_fetch_array($result1); 
$k=1;
	do {  printf( "<p align=left>&nbsp&nbsp&nbsp&nbsp<a style='color:#424242; text-decoration: none;' href='auto_min1.php?i=1&j=$k'>%s</a></p>",$row1["razr"]);
	
		if (isset($j) && $j ==$k) {$sql2="SELECT * FROM auto_razr WHERE j='$k' ORDER BY id";		   
	   $result2=mysqli_query($link,$sql2);
	 	$row2 = mysqli_fetch_array($result2); 
	$m=1;
	do { if($m==$n) {printf( "<p align=left><a style='margin-left:30px; background-color:grey; color:white; text-decoration: none;' href='auto_min1.php?i=1&j=$k&l=$m'>%s</a></p>",$row2["razr"]);} else {
	printf( "<p align=left><a style='margin-left:30px; color:green; text-decoration: none;' href='auto_min1.php?i=1&j=$k&l=$m'>%s</a></p>",$row2["razr"]);	}
		
		
		   $m=$m+1;
	   } while ($row2=mysqli_fetch_array($result2));}
		
	$k=$k+1; 
		
	   } while ($row1=mysqli_fetch_array($result1)); }
		
		
	 ?>
				
				<div id="coolmenu2">
			<?	$sql21="SELECT * FROM moto_razr ORDER BY id";
			 $result21=mysqli_query($link,$sql21);
	$row21 = mysqli_fetch_array($result21); 	?>
					
					<a href="moto_min.php?i=2<?
			   do {
  printf("&jl2[]=%s", $row21["jl"]); } while($row21 = mysqli_fetch_array($result21));?>"></a>	
					</div>
					
	<form action="moto_min.php" method="post">
	 <table> <?
  
	$sql1="SELECT * FROM moto_razr ORDER BY id"; $result1=mysqli_query($link,$sql1);
	$row1 = mysqli_fetch_array($result1); 
	  $h=1;
		do { if (isset($jl1)) {
			if (in_array("$row1[jl]", $jl1) and (!isset($jl2))) {
    
	 printf("<left><font color=#424242><input id='$h' type='checkbox' checked='checked' name='jl[]' value='%s'><label for='$h' >%s</label></font></left>",$row1["jl"], $row1["razr"]); }
		else {	printf("<left><font color=#424242><input id='$h' type='checkbox' name='jl[]' value='%s'><label for='$h' >%s</label></font></left>",$row1["jl"], $row1["razr"]);}}
		
		else {  printf("<left><font color=#424242><input id='$h' type='checkbox' name='jl[]' value='%s'><label for='$h' >%s</label></font></left>",$row1["jl"], $row1["razr"]); 
		   }
		
			
		
		$m=$row1["jl"]; $sql5="SELECT * FROM moto WHERE jl=$m"; 
		$result5=mysqli_query($link,$sql5);
		$mm=mysqli_num_rows($result5); echo "<font color='red'>".$mm."<br></font>";
			 
			$h=$h+1; } 
	
		
	while ($row1=mysqli_fetch_array($result1));  ?>		
	</table> <center><br>
		<input type="submit" class='sbutton' value="Применить фильтр"></center>
    
	
   </form>	

<br>

	
			<? $sql21="SELECT * FROM moto_razr";
    $result21=mysqli_query($link,$sql21); 
	$row21 = mysqli_fetch_array($result21); 	?>
					
					<a style=" text-decoration: none; color: black" href="moto_min.php?i=2<?
			   do {
  printf("&jl2[]=%s", $row21["jl"]); } while($row21 = mysqli_fetch_array($result21));?>"><center><img src="img/wn2_0.jpg">  Cбросить фильтр <img src="img/wn2_0.jpg"></center></a>	
					<br>


	
	
				