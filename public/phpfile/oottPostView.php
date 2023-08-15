<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;charset=utf-8');

$targetDir = __DIR__ . '/../oottImg/';

try {
    require_once 'connectDailyTW.php';

    if (!empty($_FILES['photo']['name'])) {
        $pdo->beginTransaction();

        // Sanitize user inputs
        $memId = $_POST['memId'];
        $oottDesc = $_POST['oottDesc'];
        $oottSeason = $_POST['oottSeason'];
        $styleId = $_POST['styleId'];
        $placeId = $_POST['placeId'];

        $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $newFileName = uniqid() . '.' . $extension;
        $targetFile = $targetDir . $newFileName;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
            $sql = "INSERT INTO oott (`mem_id`, `oott_img`, `oott_desc`, `oott_season`) VALUES (:mem_id, :file_name, :oott_desc, :oott_season)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':mem_id', $memId);
            $stmt->bindValue(':file_name', $newFileName, PDO::PARAM_STR);
            $stmt->bindValue(':oott_desc', $oottDesc);
            $stmt->bindValue(':oott_season', $oottSeason);
            $stmt->execute();

            $oottId = $pdo->lastInsertId();

            // Insert into oott_style_connection
            $sql2 = "INSERT INTO oott_style_connection (`oott_id`, `style_id`) VALUES (:oott_id, :style_id)";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->bindValue(':oott_id', $oottId);
            $stmt2->bindValue(':style_id', $styleId);
            $stmt2->execute();

            // Insert into oott_place_connection
            $sql3 = "INSERT INTO oott_place_connection (`oott_id`, `place_tag_id`) VALUES (:oott_id, :place_id)";
            $stmt3 = $pdo->prepare($sql3);
            $stmt3->bindValue(':oott_id', $oottId);
            $stmt3->bindValue(':place_id', $placeId);
            $stmt3->execute();

            $pdo->commit();

            $response = [
                'status' => 'success',
                'message' => 'Both INSERTs were successful.',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Error uploading file.',
            ];
        }
    } else {
        $response = [
            'status' => 'error',
            'message' => 'No file uploaded.',
        ];
    }
} catch (Exception $e) {
    $pdo->rollback();
    $response = [
        'status' => 'error',
        'message' => 'An error occurred: ' . $e->getMessage(),
    ];
}

echo json_encode($response);
?>
