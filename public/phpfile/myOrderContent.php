<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");

	//執行sql指令並取得pdoStatement
	$sql = "SELECT t.ticket_name, i.ticket_adult_count, i.ticket_ex_count, i.total
			FROM ord AS o
			JOIN item AS i ON o.ord_id = i.item_id
			JOIN ticket AS t ON i.item_ticket_id = t.ticket_id
			WHERE o.ord_id = :ord_id
			";
		
	$itemInfo = $pdo->prepare($sql); 
	$itemInfo->bindValue(":ord_id", $_GET["ord_id"]);
	$itemInfo->execute();
	
	if( $itemInfo->rowCount() === 0 ){ //找不到
		//傳回空的JSON字串
		echo "{}";
	}else{ //找得到
		//取回資料
		$itemInfoRow = $itemInfo->fetchAll(PDO::FETCH_ASSOC);
		//送出json字串
		echo json_encode($itemInfoRow);
	}

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>