<?php
session_start();

require_once '../scripts/connect_db.php';

    $con = connection('Epic_Life');
    $query = "SELECT `price_gold`, `price_diamond` FROM `Items`";
    $result = @mysqli_query($con, $query) or handle_error("наш программист наложал с sql запросом", mysqli_error($con));
    mysqli_close($con);

    $cards = null;

    for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
        $cards[$i] = $row;
    }

    echo json_encode($cards);