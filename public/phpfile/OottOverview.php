<?php 
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json;charset=utf-8");

try {
    require_once("connectDailyTW.php");

   //執行sql指令並取得pdoStatement
   $sql = "select 
    ot.oott_id, 
    ot.oott_img, 
    ot.oott_date, 
    m.mem_name, 
    m.mem_img,
    GROUP_CONCAT(style_name SEPARATOR ' #') AS concatenated_style_name
    from oott ot
    join oott_style_connection osc on ot.oott_id = osc.oott_id
    join style s on osc.style_id = s.style_id
    join member m on ot.mem_id = m.mem_id 
    GROUP BY ot.oott_id;
    WHERE ot.oott_id = :mem_id
    ";
         
 $products = $pdo->query($sql); 
 $prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($prodRows);



} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>
