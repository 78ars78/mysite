<?php
session_start();

$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['index'])) {
    $index = $input['index'];
    if (isset($_SESSION['breadcrumbs'][$index])) {
        // Keep only breadcrumbs up to the clicked index
        $_SESSION['breadcrumbs'] = array_slice($_SESSION['breadcrumbs'], 0, $index + 1);
        echo json_encode(['status' => 'success']);
        exit;
    }
}

echo json_encode(['status' => 'error']);
?>




