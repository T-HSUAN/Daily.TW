<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=utf-8');

try {
    //引入連線工作的檔案
    require_once("connectDailyTW.php");
    
    $regionNames = explode(',', $_REQUEST['region_name']);
    $placeTagNames = explode(',', $_REQUEST['place_tag_name']);
    $regionPlaceholders = implode(',', array_fill(0, count($regionNames), '?'));
    $placeTagPlaceholders = implode(',', array_fill(0, count($placeTagNames), '?'));

    //執行sql指令並取得pdoStatement
    $sql = "SELECT r.region_name, r.region_weather, p.place_name, p.place_desc, p.place_img1, p.place_img2, p.place_img3, p.place_stay, p.place_addr, p.place_link
    FROM region r JOIN place p ON r.region_id = p.region_id
                    JOIN place_tag_connection ptc ON p.place_id = ptc.place_id
                    JOIN place_tag pt ON pt.place_tag_id = ptc.place_tag_id
    WHERE r.region_name IN ($regionPlaceholders)
    AND pt.place_tag_name IN ($placeTagPlaceholders)
    ORDER BY RAND();
    ";

    $planPlace = $pdo->prepare($sql);
    $planPlace->execute(array_merge($regionNames, $placeTagNames));
    $result = $planPlace->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);

} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    //echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>