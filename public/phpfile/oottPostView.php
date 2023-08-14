<?php
// upload.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = 'oottImg/';
    $uploadedFile = $_FILES['photo'];
    $targetPath = $targetDir . basename($uploadedFile['name']);

    if (move_uploaded_file($uploadedFile['tmp_name'], $targetPath)) {
        echo json_encode(['message' => 'File uploaded successfully']);
    } else {
        echo json_encode(['error' => 'Error uploading file']);
    }
}
?>
