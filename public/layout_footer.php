


<hr width="99.8%" align="center" color="#ffffff"><font color="#FFFFFF"><center>Designed by Arsen. 2024</center></font><hr width="99.8%"  align="center" color="#ffffff">







<script> 
let me, menu;   
class PopMenu { 
   constructor(menu) { 
    this.menu=menu;
   }   
   doShow() {  
document.getElementById(this.menu).style.visibility="visible";
   }
   doHide() {
document.getElementById(this.menu).style.visibility="hidden";   }
}

</script> 




<?
/* include_once "config/database.php";
include_once "product.php";

// создаём экземпляры классов БД и объектов
$database = new Database();
$db = $database->getConnection();
$product = new Product($db);

 */




class Menu {  public $e, $menu, $top1, $left1;

public function menu_min() { 
  $database = new Database();
  $db = $database->getConnection();
  $product = new Product($db);
?> 

<div id="<? echo $this->menu; ?>" onMouseOver="me = new PopMenu('<? echo $this->menu; ?>');
me.doShow();" onMouseOut="me.doHide();" 
style="z-index: 9; position:absolute; top:<? echo $this->top1; ?>px; left:<? echo $this->left1; ?>px; visibility:hidden"><div id="coolmenu7" style="position: relative;">
<table width="200px" border="1px" height="100px" cellspacing="0" cellpadding="0">
        <?
$stmt8 = $product->vmenu($this->e);
while ($row8 = $stmt8->fetch(PDO::FETCH_ASSOC)) {
extract($row8);
printf( "<tr><td scope='row'><p align=left><a href='#'>%s</a></p></td></tr>",$row8["menu"]);}
echo "</table></div></div>";

} 
}



$class=new Menu();
$class->e=1;
$class->menu='menu1';
$class->top1=100;
$class->left1=500;
$class->menu_min();

$class1=new Menu();
$class1->e=2;
$class1->menu='menu2';
$class1->top1=100;
$class1->left1=600;
$class1->menu_min();

$class2=new Menu();
$class2->e=3;
$class2->menu='menu3';
$class2->top1=100;
$class2->left1=700;
$class2->menu_min();

?>


<table  border="0" cellspacing="0" cellpadding="0">
  <tr>

    <td><div id="coolmenu6" style="position: absolute; left: 500px; top: 80px; ">
 <div style="position: relative; "><a href="#" style="color: aqua"  onMouseOver ="me = new PopMenu('menu1');
me.doShow();" onMouseOut="me.doHide();">Дебет</a></div></div></td>

    <td><div id="coolmenu6" style="position: absolute; left: 600px; top: 80px; ">
 <div style="position: relative; "><a href="#" style="color:red" onMouseOver="me = new PopMenu('menu2');
me.doShow();" onMouseOut="me.doHide()">Кредит</a></div></div></td>

    <td><div id="coolmenu6" style="position: absolute; left: 700px; top: 80px; ">
 <div style="position: relative; "><a href="#" onMouseOver="me = new PopMenu('menu3');
me.doShow();" onMouseOut="me.doHide()">Баланс</a></div></div></td>
  </tr>
  
</table>



</div>


<!-- /container -->

<!-- jQuery (необходим для Bootstrap JavaScript) -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->

<!-- bootstrap JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

<!-- bootbox JavaScript -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script> -->

</body>

</html>