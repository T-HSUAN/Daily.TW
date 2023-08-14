<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");
	
	//執行sql指令並取得pdoStatement
	$sql = "SELECT t.trip_name, GROUP_CONCAT(p.place_img1 SEPARATOR ',') AS concatenated_place_name, GROUP_CONCAT(p.place_name SEPARATOR ',') AS concatenated_place_name
			FROM trip AS t
			JOIN trip_item AS ti on t.trip_id = ti.trip_id
			JOIN place AS p on ti.place_id = p.place_id
			WHERE t.trip_status = 1 AND t.trip_ref = 0
            GROUP BY t.trip_id
			ORDER BY rand()
			LIMIT 6
			";
	$tripInfo = $pdo->prepare($sql); 
    $tripInfo->execute();

	if( $tripInfo->rowCount() === 0 ){ //找不到
        //傳回空的JSON字串
        echo "{}";
    }else{ //找得到
        //取回所有資料
        $tripInfoRow = $tripInfo->fetchAll(PDO::FETCH_ASSOC);
        //送出json字串
        echo json_encode($tripInfoRow);
    }

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>