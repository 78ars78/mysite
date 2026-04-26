<? include("blocks/bd.php"); if (isset($_GET['k'])) {$k=$_GET['k'];}
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en"><head><title>¬ыпадающее меню</title>
	<link href="style7.css" rel="stylesheet" type="text/css">
  <style type="text/css"> body,td,th {	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; }  </style>
<style>
  .menu_ul{
         padding: 0px;     
      text-align: left; 
    list-style-type: none;
     margin: 0px 0px;
	
  }
  
	
  /*.menu_ul > li:hover:before { 
	 margin-left: 185px; margin-top: -3px;
    color: black;
	  font-size: 25px;
	   content : '>'; 	      
    position: absolute; 
	  }
 */
		  
  .menu-inner{ 
	display:none;   }
  .menu_ul > li:hover > .menu-inner{  
   	display: block;   position:absolute;
	/*box-shadow: 0 0 7px 0 rgba(0,0,0,0.6);*/
   }
  
</style>
</head>





	
  


<body cellspacing="0" cellpadding="0" topmargin="0" leftmargin="0" align="left" background="img/Wooden.jpg">
	<table  topmargin="0" width="100%" leftmargin="0"   border="0" cellpadding="0" cellspacing="0" align="center" >
	<tr><td>	
		<?	include("blocks/header.php"); ?>
			
		</td></tr><tr><td>
		<table style="border-bottom: none; border-left:none; border-right:none; border-top: none;" border="0px" topmargin="0" leftmargin="0"  cellpadding="0" cellspacing="0" 
	 bgcolor="white"  bordercolor="black" width="100%" align= "center">
		</td></tr><tr width="100%" >
		<td valign="top" width="205" bgcolor=" #cdcdcd"><? include("blocks/lefttd.php"); ?>
	</td><td valign="top">
		
<? if ($i==1) {echo "автообои";}
		if ($i==2) {echo "мотообои";} if ($i==3) {echo "музыка";} 
		?>
	</td></tr></table></table>
	 <center>
	 <? include("blocks/footer.php"); ?></center><br><br><br><br><br><br><br><br>
</body>
</html>
