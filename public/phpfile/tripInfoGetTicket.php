<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");
	
	//執行sql指令並取得pdoStatement
	$sql = "SELECT p.place_img1, tk.ticket_name, pt.place_tag_name, tk.ticket_adult, tk.ticket_discount
			FROM trip AS t
			JOIN trip_item AS ti ON t.trip_id = ti.trip_id
			JOIN place AS p ON ti.place_id = p.place_id
			JOIN place_tag_connection AS ptc on p.place_id = ptc.place_id
			JOIN place_tag AS pt on ptc.place_tag_id = pt.place_tag_id
			JOIN ticket AS tk ON p.place_id = tk.place_id
			WHERE t.trip_id = :trip_id
			ORDER BY rand()
			LIMIT 3;
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