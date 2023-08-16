<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

try {
    //引入連線工作的檔案
    require_once("connectDailyTW.php");

    //執行sql指令並取得pdoStatement
    $sql = "SELECT r.region_name, r.region_weather, p.place_name, p.place_desc, p.place_img1, p.place_img2, p.place_img3, p.place_stay, p.place_addr, p.place_link, GROUP_CONCAT(pt.place_tag_name SEPARATOR ',') AS place_tag_group
    FROM region r JOIN place p ON r.region_id = p.region_id
                    JOIN place_tag_connection ptc ON p.place_id = ptc.place_id
                    JOIN place_tag pt ON pt.place_tag_id = ptc.place_tag_id
                    GROUP BY p.place_name;";

    $products = $pdo->query($sql); 
    $prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($prodRows);

} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    //echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>