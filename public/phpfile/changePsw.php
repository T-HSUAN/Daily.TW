<?php
header('Access-Control-Allow-Origin:*');
//設置 CORS（跨源資源共享）
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
try {
    require_once("connectDailyTW.php");

    $memid = $_POST["mem_id"];
    $newpsw = $_POST["new_psw"];
    // $memid = "1";
    // $mempsw = "test123";


    $sql = "update member
        set mem_psw=:new_psw
        where mem_id=:mem_id";
        // where mem_id=1";
    $member = $pdo->prepare($sql);

    $member->bindValue(":mem_id", $memid);
    $member->bindValue(":mem_psw", $newpsw);
    $member->bindValue(":mem_id", $memid);
    $member->bindValue(":mem_psw", $newpsw);
    $member->execute();
    echo json_encode(["密碼修改成功！"]);
} catch (Exception $e) {
    // echo "連線失敗";
    echo json_encode(["Something went wrong...!We're truely sorry QQ"]);
    // echo json_encode([$e]);
}
?>