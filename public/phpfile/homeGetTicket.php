<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");
	
	//執行sql指令並取得pdoStatement
	$sql = "SELECT t.ticket_id, p.place_img1, t.ticket_name, GROUP_CONCAT(DISTINCT r.region_name) AS region, GROUP_CONCAT(DISTINCT pt.place_tag_name SEPARATOR ' #') AS tag, t.ticket_adult, t.ticket_discount, ROUND(t.ticket_adult * t.ticket_discount * 0.1) AS final_price
			FROM ticket AS t
			JOIN place AS p ON t.place_id = p.place_id
			JOIN region AS r ON p.region_id = r.region_id
			JOIN place_tag_connection AS ptc ON p.place_id = ptc.place_id
			JOIN place_tag AS pt ON ptc.place_tag_id = pt.place_tag_id
			WHERE t.ticket_discount is NOT NULL AND t.ticket_status = 1
			GROUP BY t.ticket_id
			ORDER BY rand()
			LIMIT 4;
			";
	$ticketInfo = $pdo->prepare($sql); 
    $ticketInfo->execute();

	if( $ticketInfo->rowCount() === 0 ){ //找不到
        //傳回空的JSON字串
        echo "{}";
    }else{ //找得到
        //取回所有資料
        $ticketInfoRow = $ticketInfo->fetchAll(PDO::FETCH_ASSOC);
        //送出json字串
        echo json_encode($ticketInfoRow);
    }

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>