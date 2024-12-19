<?php
require_once "../scripts/connect_db.php";

$con = connection('Epic_Life');



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
        $php_errors[$_FILES[$image_fieldname]['error']]
    );

// Действительно ли это изображение?
@getimagesize($_FILES[$image_fieldname]['tmp_name'])
    or handle_error(
        "вы выбрали файл для своего фото, который не является изображением.",
        "{$_FILES[$image_fieldname]['tmp_name']} не является файлом изображения."
    );

$upload_dir = SITE_ROOT . "/UPLOADS/IMG/";

for (
    $now = time();
    file_exists($upload_filename = $upload_dir . $now . '-' . $_FILES[$image_fieldname]['name']);
)
    $now++;
//проверяем, есть ли фото с похожим названием


@mysqli_query(
    $con,
    sprintf("INSERT INTO `Items`(`name`, `description`, `img_full_path`, `price_gold`, `price_diamond`)
VALUES ('%s', '%s', '%s', %s, %s );",
        preg_replace('/\s+/', ' ', $_REQUEST['name']),
        preg_replace('/\s+/', ' ', $_REQUEST['description']),
        $upload_filename,
        $_REQUEST['price_gold'],
        $_REQUEST['price_diamond']
    )
) or handle_error("что-то не так с запросом sql", mysqli_error($con));
mysqli_close($con);

@move_uploaded_file($image['tmp_name'], $upload_filename)
    or handle_error(
        "возникла проблема сохранения вашего изображения в его постоянном месте.",
        "ошибка, связанная с правами доступа при перемещении файла в {$upload_filename}"
    );

echo "good";