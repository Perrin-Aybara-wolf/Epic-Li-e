<?php

session_start();

require_once '../scripts/connect_db.php';
$con = connection('Epic_Life');

$data = [
    'name' => trim($_REQUEST['name']),
    'email' => trim($_REQUEST['e-mail']),
    'password' => trim($_REQUEST['password']),
    're_password' => trim($_REQUEST['re-password'])
];


$query = sprintf("INSERT INTO `Users`(`name`, `email`, `password`)
VALUES ('%s','%s','%s')", preg_replace("/(\\\\r|\\\\t|\\\\n| )+/", ' ', $data['name']), $data['email'], $data['password']);

@mysqli_query($con, $query) or handle_error(
    "ошибка при добавлении пользователя",
    mysqli_error($con)
);

$last_id = mysqli_insert_id($con);

@mysqli_query($con, "CREATE DATABASE `User_{$last_id}`")
    or handle_error(
        "ошибка при создании бд",
        mysqli_error($con)
    );

mysqli_close($con);

$con = connection("User_{$last_id}");


// @mysqli_query($con, 'CREATE TABLE `Zadachi`(
//     id int NOT NULL AUTO_INCREMENT,
//     name varchar(20) NOT NULL,
//     status int NOT NULL,
//     PRIMARY KEY (id)
//     )')
//     or handle_error(
//         "ошибка при создании таблицы задач",
//         mysqli_error($con)
//     );

@mysqli_query($con, "CREATE TABLE `Data` (
        Name varchar(30) not null DEFAULT 'hero',
        Email varchar(30) not null UNIQUE CHECK (Email != ''),
        Age INT DEFAULT 18,
        Foto MEDIUMBLOB,
        First_come_in date not null,
        Last_come_in date not null,
        Group_progress_id int,
        Days_with_us int not null,
        Serias_days int not null,
        Hp int not null,
        Fight_Soul int not null,
        Head_id int,
        Eyes_id int,
        Sex_id int,
        Hair_id int,
        Body_id int,
        Left_arm_id int,
        Right_arm_id int,
        Foot_id int,
        Shoes_id int,
        Skin_id int,
        GM int DEFAULT 0,
        DM int DEFAULT 0
        )")
    or handle_error(
        "ошибка при создании таблицы с данными пользователя",
        mysqli_error($con)
    );

@mysqli_query($con, "CREATE TABLE `Inventory`(thing_id int NOT NULL)")
    or handle_error(
        "ошибка при создании таблицы с инвентарём",
        mysqli_error($con)
    );

@mysqli_query($con, "CREATE TABLE `Taskes`(
        id int NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (id),
        sub_id int DEFAULT NULL,
        Column_num int NOT NULL,
        Name varchar(30) not null DEFAULT 'Безымянная',
        Description varchar(100) DEFAULT 'Без описания',
        Seria_now int DEFAULT 0,
        Max_seria int DEFAULT 0,
        Datetime_start datetime DEFAULT NULL,
        Datetime_finish datetime DEFAULT NULL,
        Сomplexity int not null DEFAULT 0,
        Rep_days_week SET( '1', '2', '3', '4', '5', '6', '7' ) DEFAULT NULL,
        Rep_val int DEFAULT NULL,
        Val_to_rep varchar(10) DEFAULT NULL
)")
    or handle_error(
        "error create TABLE Taskes",
        mysqli_error($con)
    );


@mysqli_query($con, "CREATE TABLE `Statistic`(
        id int NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (id),
        Taskes_id int NOT NULL,
        Status TINYINT(1),
        Date_set DATE,
        Time_start Time DEFAULT NULL,
        Time_finish Time DEFAULT NULL,
        Datetime_completed DATETIME
)")
    or handle_error(
        "ошибка при создании таблицы статистики",
        mysqli_error($con)
    );

// Чтобы при перетаскивании дела вверх/вниз оно помнило свою позицию в списке, нужно менять их id местами, и тогда бд будет возвращать их в порядке возрастания.

// header("Location: ../Show_profile/index.php?user_id={$last_id}");

mysqli_close($con);

$_SESSION['user_id'] = $last_id;
header("Location: ../Show_profile/index.php");
