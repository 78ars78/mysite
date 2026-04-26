<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />


<?php




//Объектно-ориентированный стиль
$mysqli = new mysqli('localhost', 'php', '12345', 'arsen_new1');



/*
 * Это "официальный" объектно-ориентированный способ сделать это
 * однако $connect_error не работал вплоть до версий PHP 5.2.9 и 5.3.0.
 */
if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}




//Определяем переменную ID
$id = isset($_GET['id']) ? $_GET['id'] : null;

//Получаем массив нашего меню из БД в виде массива
function getCat($mysqli){
	$sql = 'SELECT * FROM music ORDER BY sort';
	$res = $mysqli->query($sql);

	//Создаем масив где ключ массива является ID меню
	$cat = array();
	while($row = $res->fetch_assoc()){
		$cat[$row['id']] = $row;
	}
	return $cat;
}

//Функция построения дерева из массива от Tommy Lacroix
function getTree($dataset) {
	$tree = array();

	foreach ($dataset as $id => &$node) {    
		//Если нет вложений
		if (!$node['parent']){
			$tree[$id] = &$node;
		}else{ 
			//Если есть потомки то перебераем массив
            $dataset[$node['parent']]['childs'][$id] = &$node;
		}
	}
	return $tree;
}

//Получаем подготовленный массив с данными
$cat  = getCat($mysqli); 

//Создаем древовидное меню
$tree = getTree($cat);

//Шаблон для вывода меню в виде дерева
function tplMenu($category){
	
	
	
	
//	function tplMenu($category){
//	$menu = '<ul class="menu_ul">
//	<li>
//	<table width="150px" border="0px" cellpadding="0" cellspacing="0"  id="coolmenu" >
//  <tr>
//    <td width="15" height="30">
//	
//		<a href="?id='.$category['id'].'"><p class="menu"><strong><em>&#187;&nbsp;&nbsp;'.$category['title'].'</em></strong></p>
//		</a></td>
//  </tr>
//  </table>';
//		
//		if(isset($category['childs'])){
//			$menu.='<ul class="menu-inner">
//			<li>'.showCat($category['childs']).'</li></ul>';
//		}
//	$menu .= '</li></ul>';
//	
//	return $menu;
//}	
	
	
	if ($category['parent']==0) {
	
	$menu = '<div class="menu_ul">
	
	<table border="0px"  cellpadding="0" cellspacing="0"  id="coolmenu">
  <tr>
    <td bgcolor=yellow>
	
		<a  href="?id='.$category['id'].'"><p class="menu"><strong><em>&#187;&nbsp;&nbsp;'.$category['title'].'</em></strong></p>
		</a></td>
  </tr>
  </table>'; 
		
	if(isset($category['childs'])){
			$menu .= '
			<table  align="left" style="position:absolute; top:175px; left:205px;" class="menu-inner" border="0px"  cellpadding="0" cellspacing="0" ><tr><td>2'. showCat($category['childs']) .'</td></tr></table>';
		}
	$menu .= '</div>';
	
	return $menu;
	}  
	
	else
	/*if ($category['parent']<15)*/
	
	
	{
		
		$menu = '
	<div id="line_block">
	<table id="coolmen" style="margin: 0px; padding: 0px;" border="0px"  cellpadding="0" cellspacing="0"  >
  <tr >
    <td >
	
		<a   href="?id='.$category['id'].'"><strong><em>3&nbsp;&nbsp;'.$category['title'] .'</em></strong>
		</a></td>
  </tr>
  </table>';
	
	
		
		if(isset($category['childs'])){
			$menu .= '<div id="line_block"><table id="coolmen1" style=" text-align-last: left;
            margin: 0px; "  border="0px"  cellpadding="0" cellspacing="0"  ><tr><td>'. showCat($category['childs']) .'</td></tr></table></div>';
		}
		
		
		
		
		
		
	$menu .= '</div>';
	
	return $menu;
	
	
	}}

 /*
 Меню для админки в виде выподающего списка
 function tplMenu($category,$str)
 {   
    if($category['parent'] == 0)
       $menu = "<option value='".$category['id']."'>".$category['title']."</option>";
    else   
       $menu = "<option value='".$category['id']."'> ".$str." ".$category['title']."</option>";
    
	if(isset($category['childs']))
	{
		$i = 1;
		for($j = 0; $j < $i; $j++){
			$str .= '>';
		}		  
		$i++;
		
		$menu .= showCat($category['childs'], $str);
	}
    $menu .= '';
    return $menu;
 }*/




/**
* Рекурсивно считываем наш шаблон
**/ 
function showCat($data, $str = null){
	$string = '';
	$str = $str; 
	foreach($data as $item){
		$string .=  tplMenu($item, $str);
	}
	return $string;
}

/**
 * @param $cat array
 * @param $id int
 * @return array
 * Получаем массив для хлебных крошек
 */
function breadcrumb($cat, $id){
	//Проверяем что ID это число
	if(!intval($id)) return false;

	//Создаем пустой массив
	$brc = array();

	//Перебираем полученый массив с меню
	for($i = 0; $i < count($cat); $i++){
		//Проверяем что мы не нашли родителя и не массив пуст
		if($id != 0 and !empty($cat[$id])){
			//Ищим родителя
			$brc[$cat[$id]['id']] = $cat[$id]['title'];
			$id = $cat[$id]['parent'];
		}
		//Останавливаем цикл
		else break;
	}
	//Возвращаем перевернутый массив с сохранением ключей
	return array_reverse($brc, true);
}

/**
 * @param $data array
 * @return string
 * Выводим хлебные крошки
 */
?> 
	<div style="position:inherit ; color: gray">
 <div style="position: absolute; left: 152px; top: 153px">
 
 	<?
function getBrc($data){ 
	//Проверяем что массив не пуст
	if(empty($data)){
		return false;
	}else {
		$brc = $data;
		$brc_menu = '';
		//Перебераем массив для построения хлебных крошек
			foreach ($brc as $id => $title) {
			 $brc_menu .= '<a style="align:left; color: green; text-decoration: none;" href="?id=' . $id . '">' . $title . '</a> / '; 
		
		}  

		//Обрезаем последний слэш
		$brc_menu = rtrim($brc_menu, ' / ');

		//удаляем ссылку на последний элемент в крошках
		return preg_replace('#(.+)?<a.+>(.+)</a>$#', '$1$2', $brc_menu);
 	} 
} 

//Получаем HTML разметку
$cat_menu = showCat($tree);

//Получаем массив с крошками
$arr_brc = breadcrumb($cat, $id);

//Получаем строку с крошками
$brc = getBrc($arr_brc);

//Выводим хлебные крошки
echo $brc;
	 ?>	</div></div>	<? 
//Выводим на экран меню
echo $cat_menu; //'<select><option value="0">Выбери '. $cat_menu .'</select>'; 

?>