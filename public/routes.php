<?php

require "../vendor/autoload.php";

use App\Controllers\BoardController;

if (isset($_GET['action']) && !empty($_GET['action'])) {
    // If type is GET
} else if (isset($_POST['action']) && !empty($_POST['action'])) {
    // If type is POST
    if ($_POST['action'] == "move") {
        $result = BoardController::playerMove($_POST['id'], $_POST['field'], $_POST['difficulty']);

        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
