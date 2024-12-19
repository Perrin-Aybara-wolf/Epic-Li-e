<?php

require_once 'connect_db.php';

$image_fieldname = "img";
$image = $_FILES[$image_fieldname];

// Потенциальные PHP-ошибки отправки файлов
$php_errors = array(
    1 => 'Превышен макс. размер файла, указанный в php.ini',
    2 => 'Превышен макс. размер файла, указанный в форме HTML',
    3 => 'Была отправлена только часть файла',
    4 => 'Файл для отправки не был выбран.'
);

($_FILES[$image_fieldname]['error'] === 0)
    or handle_error(
        "сервер не может получить выбранное Вами изображение.",
        $php_errors($_FILES[$image_fieldname]['error'])
    );

// Действительно ли это изображение?
@getimagesize($_FILES[$image_fieldname]['tmp_name'])
    or handle_error(
        "вы выбрали файл для своего фото, который не является изображением.",
        "{$_FILES[$image_fieldname]['tmp_name']} не является файлом изображения."
    );

for (
    $now = time();
    file_exists($upload_filename = $upload_dir . $now . '-' . $_FILES[$image_fieldname]['name']);
)
    $now++;
//проверяем, есть ли фото с похожим названием


$img_filename = mysqli_real_escape_string($con, $image['name']);
$img_info = getimagesize($image['tmp_name']);
$img_mime_type = mysqli_real_escape_string($con, $img_info['mime']);
$img_size = mysqli_real_escape_string($con, $image['size']);
$img_data = mysqli_real_escape_string($con, file_get_contents($image['tmp_name']));




$insert_image_sql = sprintf(
    "INSERT INTO `images` (`filename`, `mime_type`, `size`, `data`) VALUES ('%s','%s','%s','%s');",
    mysqli_real_escape_string($con, $image['name']),
    mysqli_real_escape_string($con, getimagesize($_FILES[$image_fieldname]['tmp_name'])['mime']),
    mysqli_real_escape_string($con, $_FILES[$image_fieldname]['size']),
    mysqli_real_escape_string($con, file_get_contents($image['tmp_name']))
);

mysqli_query($con, $insert_image_sql) or handle_error(
    "ошибка при добавлении картинки",
    mysqli_error($con)
);

mysqli_close($con);