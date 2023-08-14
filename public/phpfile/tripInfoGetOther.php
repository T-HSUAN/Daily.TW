<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");
	
	//執行sql指令並取得pdoStatement
	$sql = "SELECT p.place_img1, r.region_name,  GROUP_CONCAT(DISTINCT pt.place_tag_name SEPARATOR ' #') AS concatenated_tag_name, t.trip_name, t.trip_desc, t.trip_author, t.trip_date
			FROM trip AS t
			JOIN trip_item AS ti ON t.trip_id = ti.trip_id
            JOIN place AS p ON ti.place_id = p.place_id
            JOIN region AS r ON p.region_id = r.region_id
            JOIN place_tag_connection AS ptc ON p.place_id = ptc.place_id
            JOIN place_tag AS pt ON ptc.place_tag_id = pt.place_tag_id
			WHERE t.trip_id != :trip_id
			GROUP BY p.place_id
			ORDER BY rand()
			LIMIT 3;
			";
	$otherTrip = $pdo->prepare($sql); 
	$otherTrip->bindValue(":trip_id", $_GET["trip_id"]);
    $otherTrip->execute();

	if( $otherTrip->rowCount() === 0 ){ //找不到
        //傳回空的JSON字串
        echo "{}";
    }else{ //找得到
        //取回一筆資料
        $otherTripRow = $otherTrip->fetch(PDO::FETCH_ASSOC);
        //送出json字串
        echo json_encode($otherTripRow);
    }

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>