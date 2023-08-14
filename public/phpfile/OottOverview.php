<?php 
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json;charset=utf-8");

try {
    require_once("connectDailyTW.php");

    $sql = "SELECT 
                ot.oott_id, 
                ot.oott_img, 
                ot.oott_date, 
                m.mem_name, 
                m.mem_img,
                GROUP_CONCAT(s.style_name SEPARATOR ' #') AS concatenated_style_name
            FROM oott ot
            JOIN oott_style_connection osc ON ot.oott_id = osc.oott_id
            JOIN style s ON osc.style_id = s.style_id
            JOIN member m ON ot.mem_id = m.mem_id 
            GROUP BY ot.oott_id;";
            
    $products = $pdo->query($sql); 
    $prodRows = $products->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($prodRows);
} catch (Exception $e) {
    echo json_encode(array("error" => $e->getMessage()));
}
?>
