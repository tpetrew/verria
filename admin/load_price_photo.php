<?php 
session_start();


if(!isset($_SESSION["session_username"])) {
  header("location:login.php");
} else {
?>

<?php
$scale_array = array();
include "partials/left_bar.php";





    require_once("../includes/connection.php");



$item_id = $_SESSION['session_new_item_id'];


 // Название <input type="file">
$input_name = 'file';

// Разрешенные расширения файлов.
$allow = array('jpg', 'jpeg', 'png');

// Запрещенные расширения файлов.
$deny = array(
    'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
    'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
    'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi'
);

// Директория куда будут загружаться файлы.
$path =  '../uploads/';

if (isset($_FILES[$input_name])) {
    // Проверим директорию для загрузки.
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }

    // Преобразуем массив $_FILES в удобный вид для перебора в foreach.
    $files = array();
    $diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
    if ($diff == 0) {
        $files = array($_FILES[$input_name]);
    } else {
        foreach($_FILES[$input_name] as $k => $l) {
            foreach($l as $i => $v) {
                $files[$i][$k] = $v;
            }
        }        
    }    
    
    foreach ($files as $file) {
        $error = $success = '';

        // Проверим на ошибки загрузки.
        if (!empty($file['error']) || empty($file['tmp_name'])) {
            switch (@$file['error']) {
                case 1:
                case 2: $error = 'Превышен размер загружаемого файла.'; break;
                case 3: $error = 'Файл был получен только частично.'; break;
                case 4: $error = 'Файл не был загружен.'; break;
                case 6: $error = 'Файл не загружен - отсутствует временная директория.'; break;
                case 7: $error = 'Не удалось записать файл на диск.'; break;
                case 8: $error = 'PHP-расширение остановило загрузку файла.'; break;
                case 9: $error = 'Файл не был загружен - директория не существует.'; break;
                case 10: $error = 'Превышен максимально допустимый размер файла.'; break;
                case 11: $error = 'Данный тип файла запрещен.'; break;
                case 12: $error = 'Ошибка при копировании файла.'; break;
                default: $error = 'Файл не был загружен - неизвестная ошибка.'; break;
            }
        } elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
            $error = 'Не удалось загрузить файл.';
        } else {
            // Оставляем в имени файла только буквы, цифры и некоторые символы.
            $pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
            $name = mb_eregi_replace($pattern, '-', $file['name']);
            $name = mb_ereg_replace('[-]+', '-', $name);
            
            // Т.к. есть проблема с кириллицей в названиях файлов (файлы становятся недоступны).
            // Сделаем их транслит:
            $converter = array(
                'а' => 'a',   'б' => 'b',   'в' => 'v',    'г' => 'g',   'д' => 'd',   'е' => 'e',
                'ё' => 'e',   'ж' => 'zh',  'з' => 'z',    'и' => 'i',   'й' => 'y',   'к' => 'k',
                'л' => 'l',   'м' => 'm',   'н' => 'n',    'о' => 'o',   'п' => 'p',   'р' => 'r',
                'с' => 's',   'т' => 't',   'у' => 'u',    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
                'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',  'ь' => '',    'ы' => 'y',   'ъ' => '',
                'э' => 'e',   'ю' => 'yu',  'я' => 'ya', 
            
                'А' => 'A',   'Б' => 'B',   'В' => 'V',    'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
                'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',    'И' => 'I',   'Й' => 'Y',   'К' => 'K',
                'Л' => 'L',   'М' => 'M',   'Н' => 'N',    'О' => 'O',   'П' => 'P',   'Р' => 'R',
                'С' => 'S',   'Т' => 'T',   'У' => 'U',    'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
                'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',  'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
                'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
            );

            $name = strtr($name, $converter);
            $parts = pathinfo($name);

            if (empty($name) || empty($parts['extension'])) {
                $error = 'Недопустимое тип файла';
            } elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
                $error = 'Недопустимый тип файла';
            } elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
                $error = 'Недопустимый тип файла';
            } else {
                // Чтобы не затереть файл с таким же названием, добавим префикс.
                $i = 0;
                $prefix = '';
                while (is_file($path . $parts['filename'] . $prefix . '.' . $parts['extension'])) {
                      $prefix = '(' . ++$i . ')';
                }
                $name = $parts['filename'] . $prefix . '.' . $parts['extension'];

                // Перемещаем файл в директорию.
                if (move_uploaded_file($file['tmp_name'], $path . $name)) {
                    $image_path_db = "uploads/".$name."";
                    $success = 'Файл «' . $name . '» успешно загружен.';
                } else {
                    $error = 'Не удалось загрузить файл.';
                }
            }
        }
        
        // Выводим сообщение о результате загрузки.
        if (!empty($success)) {
            echo '<p>' . $success . '</p>';        
        } else {
            echo '<p>' . $error . '</p>';
        }
    }
}




if(isset($_POST["more"])){

    if(!empty($_POST['price'])) {
    $scale = $_POST['scale'];
    $price = $_POST['price'];
    $berry = $_POST['berry'];
    }

if(isset($_SESSION['scale_array'])) {
    $scale_array = $_SESSION['scale_array'];
} else $_SESSION['scale_array'] = array();



// $ingridients_array = array(  array("розы", 100 , 15),
//                              array("тюльпаны", 60 , 25),
//                              array("орхидеи", 180 , 7) 
//                 ); 
$scale_array[] = array($scale, $price, $image_path_db, $berry);

// $scale_array[0][0] = $reciep_ingridient;

$_SESSION['scale_array'] = $scale_array;


header('location: load_price_photo.php');

}


?>



<!-- Основные функции старницы выше -->
<div style="width: 100%; 
                height: 100vh; 
                display: flex; 
                background-color: #f1f1f1;
                align-items: center; 
                justify-content: center;
                flex-direction: column;
                " class="container mlogin">


<form enctype="multipart/form-data" method="post">
    <h1>Добавление размеров </h1>



   <p><input class="input-admin-new" type="text" name="price" size="100"  placeholder="Цена">
  </p>
   
   <p><input class="input-admin-new" type="text" name="berry" size="100"  placeholder="Количество ягод">
  </p>


    <p><input class="input-admin-new" type="text" name="scale" size="100"  placeholder="Размер или вид (xl, mini e.t.c)">
  </p>

<p><input class="input-admin-new" type="file" name="file[]" multiple></p>


  <p><input class="input-admin-new" name="more" type="submit" value="Продолжить"></p>
 </form>

 <p><a href="load_scale_end.php"><div class="input-admin-new" style = "display: flex; 
                background-color: #fff;
                align-items: center; 
                justify-content: center;">Закончить добавление</div></a></p>

</div>


</div>

<?php
}
?>