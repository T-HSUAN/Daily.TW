<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try {
    //引入連線工作的檔案
    require_once("connectDailyTW.php");

    //執行sql指令並取得pdoStatement
    $sql = "SELECT o.oott_id, o.oott_img, DATE_FORMAT(o.oott_date, '%Y / %c / %e') AS oott_date_new, m.mem_nickname, m.mem_img, m.mem_sex, GROUP_CONCAT(s.style_name SEPARATOR ' #') AS concatenated_style_name
    FROM oott o JOIN oott_style_connection osc ON o.oott_id = osc.oott_id
                    JOIN member m ON m.mem_id = o.mem_id
                    JOIN style s ON osc.style_id = s.style_id
    WHERE o.oott_status = 1
    GROUP BY o.oott_id;
    ";
    $oottInfo = $pdo->prepare($sql); 
    $oottInfo->execute();

    if( $oottInfo->rowCount() === 0 ){ //找不到
        //傳回空的JSON字串
        echo "{}";
    }else{ //找得到
        //取回所有資料
        $oottInfoRow = $oottInfo->fetchAll(PDO::FETCH_ASSOC);
        //送出json字串
        echo json_encode($oottInfoRow);
    }

} catch (Exception $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    //echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>