<?php
header('Access-Control-Allow-Origin:*');
//設置 CORS（跨源資源共享）
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
try{
    require_once("connectDailyTW.php");

    $images = $_FILES['mem_img'];
    switch($_FILES["mem_img"]["error"]){
        case UPLOAD_ERR_OK:
            $dir = "../profileImg/"; //指定所要上傳的路徑
            if(file_exists($dir)===false){
                mkdir($dir); //make directory
            }
            
            $from = $_FILES["mem_img"]["tmp_name"];

            // Get the last inserted ID (編號)
            $lastInsertedId = $pdo->lastInsertId();

            // Construct the new filename as ID.png
            $newFilename = $lastInsertedId . '.png';

            $to = "$dir/" . $newFilename;
            copy($from, $to);
            echo "上傳成功<br>";
            break;
        case UPLOAD_ERR_INI_SIZE:
            echo "上傳檔案太大, 不能超過". ini_get("upload_max_filesize") ."<br>";
            break;
        case UPLOAD_ERR_FORM_SIZE:
            echo "上傳檔案太大, 不能超過". $_POST["MAX_FILE_SIZE"] ."<br>";
            break;
        case UPLOAD_ERR_PARTIAL:
            echo "上傳檔案不完整, 請重送<br>";
            break;
        case UPLOAD_ERR_NO_FILE:
            echo "没送檔案過來<br>";
            break;
        default:
            echo "請通知網站維護人員<br>";
    }

    // `mem_img`,

    // :mem_img,
    $sql = "INSERT INTO member 
        (`mem_name`, `mem_nickname`, `mem_phone`, `mem_email`, `mem_psw`, `mem_sex`, `mem_birth`, `mem_img`)
        VALUES
        (:mem_name, :mem_nickname, :mem_phone, :mem_email, :mem_psw, :mem_sex, :mem_birth, :mem_img)
        ON DUPLICATE KEY UPDATE
        `mem_name` = VALUES(`mem_name`),
        `mem_nickname` = VALUES(`mem_nickname`),
        `mem_phone` = VALUES(`mem_phone`),
        `mem_sex` = VALUES(`mem_sex`),
        `mem_birth` = VALUES(`mem_birth`),
        `mem_img` = VALUES(`mem_img`),
        `mem_psw` = VALUES(`mem_psw`)";

    $MemAdd = $pdo->prepare($sql);
    $MemAdd -> bindValue(":mem_name", $_POST['sign_name']);
    $MemAdd -> bindValue(":mem_nickname", $_POST['sign_nickname']);
    $MemAdd -> bindValue(":mem_birth", $_POST['mem_birth']);
    $MemAdd -> bindValue(":mem_sex", $_POST['mem_sex']);
    $MemAdd -> bindValue(":mem_img", $to);
    $MemAdd -> bindValue(":mem_phone", $_POST['sign_phone']);
    $MemAdd -> bindValue(":mem_email", $_POST['sign_email']);
    $MemAdd -> bindValue(":mem_psw", $_POST['sign_psw']);
    $MemAdd -> execute();
    

    echo "Success"; // 返回成功消息给前端
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
