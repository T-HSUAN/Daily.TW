<?php
header('Access-Control-Allow-Origin: *');
//設置 CORS（跨源資源共享）
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
try{
    require_once("connectDailyTW.php");
    
    $memid = $_POST["mem_id"];
    // $memid = 1;
    
        $sql = "select mem_id, mem_name, mem_email, mem_nickname, mem_birth, mem_sex,
		mem_img, mem_phone, mem_psw, mem_status
		from member
		where mem_id = :mem_id";
        $member = $pdo->prepare($sql);
        $member->bindValue(":mem_id", $memid);
        $member->execute();
        // where mem_id=:mem_id
        $memberRow = $member->fetch(PDO::FETCH_ASSOC);
        
        
        echo json_encode($memberRow);
        
}catch(Exception $e){
        // echo "連線失敗";
        echo json_encode(["連線失敗"]);
    }


?>