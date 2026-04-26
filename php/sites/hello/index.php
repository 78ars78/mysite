<? include("blocks/bd.php");
if (isset($_GET['i'])) {$i=$_GET['i'];} else $i='';
if (isset($_GET['j'])) {$j=$_GET['j'];}
if (isset($_GET['l'])) {$l=$_GET['l'];}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ru"><head>
	
	<meta charset='utf-8'>
	
	<title></title>
  <link href="style7.css" rel="stylesheet" type="text/css">
  <style type="text/css">
  body,td,th {	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; }  </style>
</head>
<body cellspacing="0" cellpadding="0" topmargin="0" leftmargin="0" align="left" background="img/Wooden.jpg">
	<table  topmargin="0" width="100%" leftmargin="0"   border="0" cellpadding="0" cellspacing="0" align="center" >
	<tr><td>	
		<?	include("blocks/header.php"); ?>
		</td></tr><tr><td>
		<table style="border-bottom: none; border-left:none; border-right:none; border-top: none;" border="0px" topmargin="0" leftmargin="0"  cellpadding="0" cellspacing="0" 
	 bgcolor=" white"  bordercolor="black" width="100%" align= "center">
		</td></tr><tr width="100%" >
		<td valign="top" width="205" border="10px" bgcolor=" #cdcdcd"><? include("blocks/lefttd.php"); ?>
	</td><td valign="top" style="z-index: 2; position: relative;">
		<? if ($i==1) {echo "автообои";}
		if ($i==2) {echo "мотообои";} if ($i==3) {echo "музыка";} 
		?>
	</td></tr></table><? include("blocks/footer.php"); ?></table>
	 <center>
		 
		 
		 
		 
		 </center><br><br><br><br><br><br><br><br>
</body>
</html>
