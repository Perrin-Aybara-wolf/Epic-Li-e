<?php

require_once 'app_config.php';

$error_message = $_REQUEST['error_message'];
if (!isset($error_message)) {
    $error_message = "вы здесь оказались из-за сбоя в работе программы.";
}

if (isset($_REQUEST['system_error_message'])) {
    $system_error_message = preg_replace("/\\\\/", '',
    $_REQUEST['system_error_message']); } else {
    $system_error_message = "Сообщения о системных ошибках отсутствуют.";
    }
?>
<html lang="ru">

<head>
    <link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
    <div id="header">
        <h1>PHP & MySQL: The Missing Manual</h1>
    </div>
    <div id="example">Страница ошибки</div>
    <div id="content">
        <h1>Нам очень жаль...</h1>

        <?php
        debug_print("<hr />");
        debug_print("<p>Было получено следующее сообщение об ошибке системного уровня:<b>
        {$system_error_message}</b></p>");
        ?>
    </div>
    <div id="footer"></div>
</body>

</html>



<!-- <p><img src="../images/error.jpg" class="error" />...но произошел небольшой
            сбой. Вероятно, <span class="error_message"><?php echo $error_message; ?></span></p>
        <p> Не волнуйтесь, мы в курсе происходящего и предпримем все
            необходимые меры. Если же вы хотите связаться с нами и узнать подробности
            произошедшего или вас что-нибудь беспокоит в сложившейся ситуации, пришлите
            нам <a href="mailto:info@yellowtagmedia.com">сообщение</a>, и мы непременно
            откликнемся.</p>
        <p>А сейчас, если вы желаете вернуться на страницу, ставшую причиной
            проблемы, то можете <a href="javascript:history.go(-1);">щелкнуть здесь.</a>
            Если возникнет такая же проблема, то вы можете вернуться на страницу чуть
            позже. Уверены, что к тому времени мы во всем разберемся. Еще раз спасибо...
            надеемся на ваше скорое возвращение. И еще раз извините за причиненные
            неудобства.</p> -->