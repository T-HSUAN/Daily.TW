<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");
	
	//執行sql指令並取得pdoStatement
	$sql = "SELECT tk.ticket_id, p.place_img1, tk.ticket_name, GROUP_CONCAT(DISTINCT r.region_name) AS region, GROUP_CONCAT(DISTINCT pt.place_tag_name SEPARATOR ' #') AS tag, tk.ticket_adult, tk.ticket_discount, ROUND(tk.ticket_adult * COALESCE(tk.ticket_discount, 10) * 0.1) AS final_price
			FROM trip AS t
			JOIN trip_item AS ti ON t.trip_id = ti.trip_id
			JOIN place AS p ON ti.place_id = p.place_id
			JOIN region AS r ON p.region_id = r.region_id
			JOIN place_tag_connection AS ptc on p.place_id = ptc.place_id
			JOIN place_tag AS pt on ptc.place_tag_id = pt.place_tag_id
			JOIN ticket AS tk ON p.place_id = tk.place_id
			WHERE t.trip_id = :trip_id AND tk.ticket_status = 1
			GROUP BY tk.ticket_id
			ORDER BY rand()
			LIMIT 4;
			";
	$ticketData = $pdo->prepare($sql); 
	$ticketData->bindValue(":trip_id", $_GET["trip_id"]);
    $ticketData->execute();
  
	if( $ticketData->rowCount() === 0 ){ //找不到
        //傳回空的JSON字串
        echo "{}";
    }else{ //找得到
        //取回所有資料
        $ticketDataRow = $ticketData->fetchAll(PDO::FETCH_ASSOC);
        //送出json字串
        echo json_encode($ticketDataRow);
    }

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>