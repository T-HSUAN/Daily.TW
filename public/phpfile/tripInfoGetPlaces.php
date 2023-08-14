<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");
	
	//執行sql指令並取得pdoStatement
	$sql = "SELECT p.place_name, p.place_desc, p.place_img1, p.place_img2, p.place_img3, p.place_stay, p.place_addr, p.place_link
			FROM trip AS t
			JOIN trip_item AS ti on t.trip_id = ti.trip_id
			JOIN place AS p on ti.place_id = p.place_id
			WHERE t.trip_id = :trip_id;
			";
	$placeInfo = $pdo->prepare($sql); 
	$placeInfo->bindValue(":trip_id", $_GET["trip_id"]);
    $placeInfo->execute();

	if( $placeInfo->rowCount() === 0 ){ //找不到
        //傳回空的JSON字串
        echo "{}";
    }else{ //找得到
        //取回所有資料
        $placeInfoRow = $placeInfo->fetchAll(PDO::FETCH_ASSOC);
        //送出json字串
        echo json_encode($placeInfoRow);
    }

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>