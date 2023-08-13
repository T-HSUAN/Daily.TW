<?php
header('Access-Control-Allow-Origin:*');
//設置 CORS（跨源資源共享）
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
try{
    require_once("connectDailyTW.php");


    //`mem_birth`,
    // `mem_sex`,
    // `mem_img`,

    // :mem_birth,
    // :mem_sex,
    // :mem_img,
    $sql = "INSERT INTO member 
        (`mem_name`, `mem_nickname`, `mem_phone`, `mem_email`, `mem_psw`)
        VALUES
        (:mem_name, :mem_nickname, :mem_phone, :mem_email, :mem_psw)
        ON DUPLICATE KEY UPDATE
        `mem_name` = VALUES(`mem_name`),
        `mem_nickname` = VALUES(`mem_nickname`),
        `mem_phone` = VALUES(`mem_phone`),
        `mem_psw` = VALUES(`mem_psw`)";

    $MemAdd = $pdo->prepare($sql);
    $MemAdd -> bindValue(":mem_name", $_POST['sign_name']);
    $MemAdd -> bindValue(":mem_nickname", $_POST['sign_nickname']);
    // $MemAdd -> bindValue(":mem_birth", $_POST['mem_birth']);
    // // $MemAdd -> bindValue(":mem_sex", $_POST['mem_sex']);
    // // $MemAdd -> bindValue(":mem_img", $_POST['mem_img']);
    $MemAdd -> bindValue(":mem_phone", $_POST['sign_phone']);
    $MemAdd -> bindValue(":mem_email", $_POST['sign_email']);
    $MemAdd -> bindValue(":mem_psw", $_POST['sign_psw']);
    $MemAdd -> execute();
    

    echo "Success"; // 返回成功消息给前端
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
