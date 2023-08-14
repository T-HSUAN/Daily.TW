<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try {
    //引入連線工作的檔案
    require_once("connectDailyTW.php");

    //執行sql指令並取得pdoStatement
    $sql = "SELECT r.region_name, GROUP_CONCAT(pt.place_tag_name SEPARATOR ' #') AS place_tag_name, t.ticket_name, t.ticket_adult
    FROM region r JOIN place p ON r.region_id = p.region_id
                    JOIN place_tag_connection ptc ON p.place_id = ptc.place_id
                    JOIN place_tag pt ON pt.place_tag_id = ptc.place_tag_id
                    JOIN ticket t ON t.place_id = p.place_id
    WHERE r.region_name IN ('臺北', '基隆')
    AND pt.place_tag_id IN ('2', '5', '8')
    GROUP BY place_name;
    ";

    //尚未改帶變數
    $tagAdd = $pdo->prepare($sql);
    $tagAdd -> bindValue(":place_tag_name", $_POST['place_tag_name']);
    $tagAdd -> bindValue(":place_tag_desc", $_POST['place_tag_desc']);
    $tagAdd -> execute();

} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    //echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>