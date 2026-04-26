<?php 
//Устанавливаем кодировку и вывод всех ошибок
//Объектно-ориентированный стиль
$mysqli = new mysqli('mysql', 'root', 's123123', 'arsen_new');
//Определяем переменную ID
$id = isset($_GET['id']) ? $_GET['id'] : null;
//Получаем массив нашего меню из БД в виде массива
//Функция построения дерева из массива от Tommy Lacroix
//Получаем подготовленный массив с данными



$cat  = getCat($mysqli); 
//Создаем древовидное меню
$tree = getTree($cat);
?> 
<div style="position: absolute;">
<div style="position: relative; color: green;  background-image: url(bg_transparent.png); z-index: 4; left:213px; top: -20px">
 
<? $kk=0;
//Получаем HTML разметку
$cat_menu = showCat($tree,$kk); 
//Получаем массив с крошками
$arr_brc = breadcrumb($cat, $id);
//Получаем строку с крошками
$brc = getBrc($arr_brc);
//Выводим хлебные крошки
echo $brc; ?>
</div></div>	<? 
//Выводим на экран меню
echo $cat_menu; //'<select><option value="0">Выбери '. $cat_menu .'</select>'; 


//Шаблон для вывода меню в виде дерева
function tplMenu($category,$kk){  $kk++;
	$menu = '<ul class="menu_ul" >
	<li>
	<table  width="205" border="0px" cellpadding="0" cellspacing="0"  id="coolmenu">
  <tr>
    <td width="205"  height="30" bgcolor=blue >
	
		<a  href="music_min.php?kk='.$kk.'&id='.$category['id'].'"><p class="menu"><strong><em>&#187;&nbsp;&nbsp;'.$category['title'].'</em></strong></p> 
		</a></td>
  </tr>
  </table>';  
		if(isset($category['childs'])){ 
			$menu.="<div style='z-index:6;' style='position:absolute; top:0px; left:205px;' class='menu-inner'>
			".showCat($category['childs'],$kk)."</div>"; 
		} 
	$menu .= '</li></ul>';  
	
	 return $menu;
}

/**
* Рекурсивно считываем наш шаблон
**/ 
function showCat($data,$kk){ 
	$string = '';
	
	foreach($data as $item){ 
		$string .=  tplMenu($item,$kk);
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




function getBrc($data){ 
	//Проверяем что массив не пуст
	if(!empty($data)) {

		$brc = $data;
		$brc_menu = '';  
		//Перебераем массив для построения хлебных крошек
			foreach ($brc as $id => $title) {  $kk=$kk+1; 
			 $brc_menu .= '<a style="color: green; align:left; text-decoration: none;" href="?kk='.$kk.'&id=' . $id . '">' . $title . '</a> / '; 
			} 
	 		
      
 /*      ?>
	  <div style="width: 50px; position:absolute; top:25px; left: 0px;">
	  <?     ?> </div> <? */
//Обрезаем последний слэш
		/* $brc_menu = rtrim($brc_menu, ' / '); */
//удаляем ссылку на последний элемент в крошках
	 	
 	} return preg_replace('#(.+)?<a.+>(.+)</a>$#', '$1$2', $brc_menu);
} 




function getCat($mysqli){
	$sql = 'SELECT * FROM music WHERE NOT parent="k" ORDER BY title';
	$res = $mysqli->query($sql);

	//Создаем масив где ключ массива является ID меню
	$cat = array();
	while($row = $res->fetch_assoc()){
		$cat[$row['id']] = $row; 
	}
	return $cat;
}



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




?>


