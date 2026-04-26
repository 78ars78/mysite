<?// Определяем переменную parent_id
 $parent_id = isset($_GET['parent_id']) ? $_GET['parent_id'] : null;

function breadcrumb($cat, $parent_idid){
//Проверяем что parent_ID это число
if(!intval($parent_idid)) return false;

//Создаем пустой массив
$brc = array();

//Перебираем полученый массив с меню
for($i = 0; $i < count($cat); $i++){
    //Проверяем что мы не нашли родителя и не массив пуст
    if($parent_id != 0 and !empty($cat[$parent_id])){
        //Ищем родителя
        $brc[$cat[$id]['parent_id']] = $cat[$parent_id]['title'];
        $parent_id = $cat[$parent_id]['parent'];
    }
    //Останавливаем цикл
    else break;
}
//Возвращаем перевернутый массив с сохранением ключей
return array_reverse($brc, true);
}

?>