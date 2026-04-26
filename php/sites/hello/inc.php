<font color="#0596FF"><a href="#" >1920х1080</a><br><a href="#">1366x768</a></font>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
 <td <? if(isset($n)) { if ($n==1) {echo "1";} else echo "2"; }  ?>>
	     <a href="index.php">главная</a></td>
 <td width="25%"  <? if(isset($n)) { if ($n==2) {	echo "class='nav_a'";} else echo "class='nav_t'"; }  ?>>
	     <a href="subscribe.php">рассылка</a></td>
 <td width="25%"  <? if(isset($n)) { if ($n==3) {	echo "class='nav_a'";} else echo "class='nav_t'"; }  ?>>
	     <a href="goodies.php">товары</a></td>
 <td width="25%"  <? if(isset($n)) { if ($n==4) {	echo "class='nav_a'";} else echo "class='nav_t'"; }  ?>>
         <a href="about.php">о нас</a></td>
 </tr>
</table>