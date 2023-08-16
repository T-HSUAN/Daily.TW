<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");
	
	//執行sql指令並取得pdoStatement
	$sql = "SELECT t.trip_id, t.trip_name, t.trip_author, DATE_FORMAT(t.trip_date, '%Y / %c / %e') AS trip_date_new, t.trip_desc,  GROUP_CONCAT(DISTINCT r.region_name) AS trip_region, GROUP_CONCAT(DISTINCT pt.place_tag_name SEPARATOR ' #') AS trip_tag, GROUP_CONCAT(p.place_img1 SEPARATOR ',') AS trip_img
			FROM trip AS t
			JOIN trip_item AS ti ON t.trip_id = ti.trip_id
			JOIN place AS p ON ti.place_id = p.place_id
			JOIN region AS r ON p.region_id = r.region_id
			JOIN place_tag_connection AS ptc ON p.place_id = ptc.place_id
			JOIN place_tag AS pt ON ptc.place_tag_id = pt.place_tag_id
			GROUP BY t.trip_id
			ORDER BY rand()
			LIMIT 3
			";
	$otherTrip = $pdo->prepare($sql); 
    $otherTrip->execute();

	if( $otherTrip->rowCount() === 0 ){ //找不到
        //傳回空的JSON字串
        echo "{}";
    }else{ //找得到
        //取回一筆資料
        $otherTripRow = $otherTrip->fetchAll(PDO::FETCH_ASSOC);

		foreach ($otherTripRow as &$row) {
            $row['trip_img'] = explode(',', $row['trip_img']);
			$row['trip_img'] = $row['trip_img'][0];
        }

        //送出json字串
        echo json_encode($otherTripRow);
    }

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>