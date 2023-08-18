<?php 
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json;charset=utf-8");

try {
    require_once("connectDailyTW.php");

    // 執行sql指令並取得pdoStatement
    $sql = "SELECT 
        ot.oott_id, 
        ot.oott_img, 
        DATE_FORMAT(ot.oott_date, '%Y/%m/%d') AS oott_date,
        m.mem_name, 
        m.mem_img,
        GROUP_CONCAT(style_name SEPARATOR ' #') AS concatenated_style_name
        FROM oott ot
        JOIN oott_style_connection osc ON ot.oott_id = osc.oott_id
        JOIN style s ON osc.style_id = s.style_id
        JOIN member m ON ot.mem_id = m.mem_id 
        GROUP BY ot.oott_id
        LIMIT 3"; // 限制结果数量为3
         
    $products = $pdo->query($sql); 
    $prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($prodRows);
} catch (Exception $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    //echo "系統暫時不能正常運行，請稍後再試<br>";    
}
?>
