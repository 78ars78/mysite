<? include("includes/db.php");
$echo = "<div class='table'>
<div class='tale-wrapper'>
            <div class='table-title'>Войти в панель администратора</div>
            <div class='table-content'>
                        <form method='post' id='login-form' class='login-form'>
                                      <input type='text' placeholder='Логин' class='input'
                                        name='login' required><br>
                                     <input type='password' placeholder='Пароль' class='input'
                                       name='password' required><br>
                                    <input type='submit' value='Войти' class='button'>
                      </form>
             </div>
</div>
</div>";



function login($db,$login,$password) {

                 //Обязательно нужно провести валидацию логина и пароля, чтобы
                  //  исключить вероятность инъекции

                 //Запрос в базу данных

                $loginResult = mysqli_query($db,"SELECT * FROM userlist WHERE login='$login'
                  AND password='$password' AND admin='1'");

                if(mysqli_num_rows($loginResult) == 1) {  //Если есть совпадение,
              

                                return true;

                } else {//Если такого пользователя не существует, данные стираются,
               //    а возвращается false

                                 unset($_SESSION['login'],$_SESSION['password']);

                                  return false;

              }

}

if(isset($_POST['login']) && isset($_POST['password'])) {

$_SESSION['login'] = $_POST['login'];

$_SESSION['password'] = $_POST['password'];

}

if(isset($_SESSION['login']) && isset($_SESSION['password'])) {

if(login($db,$_SESSION['login'],$_SESSION['password'])) {//Попытка авторизации

                //Тут будут проходить все операции

                $echo = null; //Обнуление переменной, чтобы удалить из вывода
                //   форму авторизации

}

}




if(isset($_GET['act'])) {$act = $_GET['act'];} else {$act = 'home';}
switch($act) {
case 'home':
             $article_result = mysqli_query($db,"SELECT * FROM articles");
             if(mysqli_num_rows($article_result) >= 1) {
                        while($article_array = mysqli_fetch_array($article_result)) {
                                     $articles .= "<div class='table-content__list-item'><a href='?                                    act=edit_article&id=$article_array[id]'>$article_array[id] |
                                     $article_array[title]</a></div>";
                          }
              } else {
                      $articles = "Статей пока нет";
              }
             $users_result = mysqli_query($db,"SELECT * FROM userlist");
              if(mysqli_num_rows($users_result) >= 1) {
                             while($users_array = mysqli_fetch_array($users_result)) {
                                          $users .= "<div class='table-content__list-item'><a href='?                                         act=edit_user&id=$users_array[id]'>$users_array[id] | 
                                          $users_array[login]</a></div>";
                               }
                } else {
                               $users = "Статей пока нет";
                }
                               $echo = "<div class='tables'>
                                           <div class='table'>
                                                        <div class='table-wrapper'>
                                                                            <div class='table-title'>Страницы</div>
                                                                            <div class='table-content'>
                                                                                           $articles
                                                                                           <a href='?act=add_article'                                                                                          class='table__add-button'                                                                                         id='add_article'>+</a>
                                                                              </div>
                                                          </div>
                                               </div>
                                              <div class='table'>
                                                        <div class='table-wrapper'>
                                                                        <div class='table-title'>Пользователи</div>
                                                                        <div class='table-content'>
                                                                                  $users
                                                                                 <a href='?act=add_user'                                                                                  class='table__add-button'
                                                                                   id='add_user'>+</a>
                                                                      </div>
                                                          </div>
                                         </div>
                      </div>";
break;



case 'edit_article':
   if(isset($_GET['id'])) {
   $id = $_GET['id'];
   $result = mysqli_query($db,"SELECT * FROM articles WHERE id='$id'");
   if(mysqli_num_rows($result) == 1) {
   if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['text'])) {
   //Тут должна быть валидация
   //Обновление таблицы
   $update = mysqli_query($db,"UPDATE articles SET title='$_POST[title]', description='$_POST[description]', text='$_POST[text]' WHERE id='$id'");
   if($update) {
   //Если обновление прошло успешно, получаются новые данные
   $result = mysqli_query($db,"SELECT * FROM articles WHERE id='$id'");
   $message = "Успешно обновлено!";
   }
   }
   $article = mysqli_fetch_array($result);//Получение информации в массив
   //Форма редактирования
   $echo = "<div class='table'>
   <div class='table-wrapper'>
   <div class='table-title'>Редактирование статьи</div>
   <div class='table-content'>
   <a href='?act=home'><- Вернуться</a><br>
   $message
   <form method='post' class='article-form'>
   <b>Название:</b> <input type='text' name='title' value='$article[title]'><br>
   <b>Описание:</b> <textarea name='description'>$article[description]</textarea><br>
   <b>Текст:</b> <textarea name='text'>$article[text]</textarea></br>
   <input type='submit' class='button' value='Сохранить'>
   </form>
   </div>
   </div>
   </div>";
   }
   }
   break;
   
   
   
   
   
   case 'add_user':
   if(isset($_POST['reglogin']) && isset($_POST['regpassword'])) {
   $check = mysqli_query($db,"SELECT * FROM userlist WHERE login='$_POST[reglogin]'");
   if(mysqli_num_rows($check) == 0) {
   $insert = mysqli_query($db,"INSERT INTO userlist (login,password,admin) VALUE ('$_POST[reglogin]','$_POST[regpassword]','$_POST[regadmin]')");
   if($insert) {
   $message = "Пользователь успешно добавлен!";
   } else {
   $message = "Ошибка! ".mysqli_error($db);
   }
   } else {
   $message = "Пользователь с таким логином уже существует!";
   }
   }
   $echo = "<div class='table'>
   <div class='table-wrapper'>
   <div class='table-title'>Новый пользователь</div>
   <div class='table-content'>
   <a href='?act=home'><- Вернуться</a><br>
   $message
   <form method='post' class='user-form'>
   <b>Логин:</b> <input type='text' name='reglogin' required><br>
   <b>Пароль:</b> <input type='text' name='regpassword' required><br>
   <b>Админ:</b> <input type='checkbox' name='regadmin'></br>
   <input type='submit' class='button' value='Добавить'>
   </form>
   </div>
   </div>
   </div>";
   break;



}








include("includes/db.php");
$width = 400;
$height = 200;
$canv = imagecreatetruecolor($width, $height);
//Цвета
$white = imagecolorallocate($canv, 255, 255, 255);
$gray = imagecolorallocate($canv, 150, 150, 150);
$black = imagecolorallocate($canv, 0, 0, 0);
$red = imagecolorallocate($canv, 255, 0, 0);
$blue = imagecolorallocate($canv, 0, 0, 255);
imagefill($canv,0,0,$white);
//Рисуется квадрат
imagerectangle($canv, 15, 5, $width-5, $height-15, $gray);
//Горизонтальные линии
for($i = 1; $i <= 5; $i++) {
imageline($canv, 15, $height-$i*35, $width-5, $height-$i*35, $gray);
}
//Вертикальные линии
for($i = 1; $i <= 15; $i++) {
imageline($canv, 15+($i*30), 5, 15+($i*30), $height-15, $gray);
}
//Получение статистики из базы данных
$stats_result = mysqli_query($db,"SELECT * FROM statistics");
if($stats_result) {
$last_y = [0,0];
$x = 15;
//Рисуется график
while($stats = mysqli_fetch_array($stats_result)) {
imageline($canv, $x, ($height-15)-$last_y[0], $x+30, ($height-15)-($stats['views']/10), $red);
imageline($canv, $x, ($height-15)-$last_y[1], $x+30, ($height-15)-($stats['comments']/10), $blue);
$last_y[0] = $stats['views']/10;
$last_y[1] = $stats['comments']/10;
$x += 30;
}
} else {echo mysqli_error($db);}
//Вывод изображения
header("Content-type: image/png");
imagepng($canv);
//Освобождение памяти
imagedestroy($canv);




?>




<!DOCTYPE html>
<html>
<head>
             <title>Админка</title>
             <link rel="stylesheet" href="admin.css">
</head>
<body>
             <div class='wrapper'>
                           <main class='main' id='main'>
                                          <?echo $echo;?>
                          </main>
             </div>


<div class='table'>
<div class='table-wrapper'>
<div class='table-title'>Статистика</div>
<div class='table-content'>
<img src='stats.php' class='statistics-img'> <br>
Красный: просмотры <br>
Синий: комментарии <br>
 1 шаг — 1 день
</div>
</div>
</div>



</body>
</html>