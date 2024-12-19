<?php
session_start();

require_once '../scripts/connect_db.php';

$con = connection("User_" . auth()->user()->id);
// Если дата, возвращённая сервером, плюс заявленное им же приращивание <= сегодня ==> создаём новую строку в статистике
// с подвязкой к этому делу с dataset + rep и повторяем цикл добавления до тех пор, пока условие истинно

$query = "CALL upd_rep_period();";
if (mysqli_error($con) !== '') {
    $query = "DROP PROCEDURE IF EXISTS upd_rep_period";
    @mysqli_query($con, $query) or handle_error('проблема с процедурой обновления истории', mysqli_error($con));
    $query = "
--DELIMITER $$
CREATE PROCEDURE upd_rep_period()
BEGIN
CREATE TEMPORARY TABLE IF NOT EXISTS tmp_tb AS
    SELECT
        task_id as t_id,
        MAX(date_set) as d_set,
        rep_val,
        val_to_rep,
        IF(datetime_finish < NOW(), datetime_finish, NOW()) AS Dead_date,
        DATE_FORMAT(datetime_start, '%H:%i:%s') AS T_start,
        DATE_FORMAT(datetime_finish, '%H:%i:%s') AS T_finish
    FROM Statistic, Tasks
    WHERE
        Tasks.id = task_id AND
        rep_days_week IS NULL AND
        rep_val IS NOT NULL
	GROUP BY t_id
	HAVING d_set < NOW();

    lvl_1: WHILE (SELECT COUNT(t_id) FROM tmp_tb) > 0 DO
        SET @t_id = (SELECT MAX(t_id) FROM tmp_tb),
        @last_date = (SELECT d_set FROM tmp_tb WHERE t_id = @t_id),
        @rep = (SELECT rep_val FROM tmp_tb WHERE t_id = @t_id),
        @vtrep = (SELECT val_to_rep FROM tmp_tb WHERE t_id = @t_id),
        @T_start = (SELECT T_start FROM tmp_tb WHERE t_id = @t_id),
        @T_finish = (SELECT T_finish FROM tmp_tb WHERE t_id = @t_id),
        @dead_date = (SELECT Dead_date FROM tmp_tb WHERE t_id = @t_id);

        CASE
            WHEN @vtrep = 1 THEN
            lvl_2: WHILE DATE_ADD(@last_date, INTERVAL @rep DAY) <= @dead_date DO
                SET @last_date = DATE_ADD(@last_date, INTERVAL @rep DAY);

                INSERT INTO `Statistic`(`task_id`, `status`, `date_set`,`time_start`,`time_finish`)
                VALUE (@t_id, 0, @last_date, @T_start, @T_finish);

            END WHILE lvl_2;
            WHEN @vtrep = 2 THEN
            lvl_2: WHILE DATE_ADD(@last_date, INTERVAL @rep MONTH) <= @dead_date DO
                SET @last_date = DATE_ADD(@last_date, INTERVAL @rep MONTH);

                INSERT INTO `Statistic`(`task_id`, `status`, `date_set`,`time_start`,`time_finish`)
                VALUE (@t_id, 0, @last_date, @T_start, @T_finish);

            END WHILE lvl_2;
            WHEN @vtrep = 3 THEN
            lvl_2: WHILE DATE_ADD(@last_date, INTERVAL @rep YEAR) <= @dead_date DO
                SET @last_date = DATE_ADD(@last_date, INTERVAL @rep YEAR);

                INSERT INTO `Statistic`(`task_id`, `status`, `date_set`,`time_start`,`time_finish`)
                VALUE (@t_id, 0, @last_date, @T_start, @T_finish);

            END WHILE lvl_2;
        END CASE;
        DELETE FROM tmp_tb WHERE t_id = @t_id;
    END WHILE lvl_1;

END;";
    @mysqli_query($con, $query) or handle_error('проблема с процедурой обновления истории', mysqli_error($con));

    $query = "CALL upd_rep_period();";
    @mysqli_query($con, $query) or handle_error('проблема с процедурой обновления истории', mysqli_error($con));
}
//============================================================================================================================
$query = "CALL upd_rep_week();";
if (mysqli_error($con) !== '') {
    $query = "DROP PROCEDURE IF EXISTS upd_rep_week";
    @mysqli_query($con, $query) or handle_error('проблема с процедурой обновления истории', mysqli_error($con));
    $query = "
CREATE PROCEDURE upd_rep_week()
BEGIN
CREATE TEMPORARY TABLE IF NOT EXISTS tmp_tb AS
    SELECT
        task_id as t_id,
        MAX(date_set) as d_set,
        rep_days_week as rep_w,
        IF(datetime_finish < NOW(), datetime_finish, NOW()) AS Dead_date,
        DATE_FORMAT(datetime_start, '%H:%i:%s') AS T_start,
        DATE_FORMAT(datetime_finish, '%H:%i:%s') AS T_finish
    FROM Statistic, Tasks
    WHERE
        Tasks.id = task_id AND
        rep_days_week IS NOT NULL AND
        rep_val IS NULL
	GROUP BY t_id
	HAVING d_set < NOW();

    lvl_1: WHILE (SELECT COUNT(t_id) FROM tmp_tb) > 0 DO
        SET @t_id = (SELECT MAX(t_id) FROM tmp_tb),
        @last_date = (SELECT d_set FROM tmp_tb WHERE t_id = @t_id),
        @rep = (SELECT rep_w FROM tmp_tb WHERE t_id = @t_id),
        @T_start = (SELECT T_start FROM tmp_tb WHERE t_id = @t_id),
        @T_finish = (SELECT T_finish FROM tmp_tb WHERE t_id = @t_id),
        @dead_date = (SELECT Dead_date FROM tmp_tb WHERE t_id = @t_id);

        lvl_2: WHILE DATE_ADD(@last_date, INTERVAL 1 DAY) <= @dead_date DO
            SET @last_date = DATE_ADD(@last_date, INTERVAL 1 DAY);
            IF (FIND_IN_SET(DAYOFWEEK(@last_date), @rep)) THEN
                INSERT INTO `Statistic`(`task_id`, `status`, `date_set`,`time_start`,`time_finish`)
                VALUE (@t_id, 0, @last_date, @T_start, @T_finish);
            END IF;
        END WHILE lvl_2;
        DELETE FROM tmp_tb WHERE t_id = @t_id;
    END WHILE lvl_1;

END;";
    @mysqli_query($con, $query) or handle_error('проблема с процедурой обновления истории', mysqli_error($con));

    $query = "CALL upd_rep_week();";
    @mysqli_query($con, $query) or handle_error('проблема с процедурой обновления истории', mysqli_error($con));
}
mysqli_close($con);

// SELECT * FROM `Statistic` ORDER BY `task_id`, `date_set`