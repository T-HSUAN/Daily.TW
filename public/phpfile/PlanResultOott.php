<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try {
    //引入連線工作的檔案
    require_once("connectDailyTW.php");

    //執行sql指令並取得pdoStatement
    $sql = "SELECT o.oott_img, DATE_FORMAT(o.oott_date, '%Y / %c / %e') AS oott_date, m.mem_name, m.mem_img, GROUP_CONCAT(s.style_name SEPARATOR ' #') AS style_name
    FROM oott o JOIN oott_style_connection osc ON o.oott_id = osc.oott_id
                    JOIN member m ON m.mem_id = o.mem_id
                    JOIN style s ON osc.style_id = s.style_id
    WHERE m.mem_sex IN ('女')
    AND s.style_id IN (1, 2, 3)
    GROUP BY m.mem_name
    ORDER BY RAND();
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