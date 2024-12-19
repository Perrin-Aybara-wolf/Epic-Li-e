<?php
$name = trim($_REQUEST['name']);

function change_f($str)
{
    echo str_replace('ф', 'ФФФ', $str);
}

?>


<html>

<head>
    <!-- <link href="../../css/phpMM.css" rel="stylesheet" type="text/css" /> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
    <div id="header">
        <h1>PHP & MySQL: The Missing Manual</h1>
    </div>
    <div id="example">
        <ol>
            <?php
            foreach ($_REQUEST as $key => $v) {
                echo "<li>" . $key . ' === ' . $v . "</li>";
                // Специальный значок => сообщает PHP, что вам нужен ключ
                // $key, а затем значение $value, прикрепленное к ключу
            }
            ?>

        </ol>
    </div>
    <div id="content">
        <h1>Привет, <?php change_f($name); ?>!</h1>
        <!-- trim убирает лишние пробелі в начале, середине (больше одного) и конце строки -->
        <p>Рады приветствовать вас. Добро пожаловать в начало вашей одиссеи
            в мире PHP-программирования.</p>
        </form>
    </div>
    <div id="footer"></div>
</body>

</html>