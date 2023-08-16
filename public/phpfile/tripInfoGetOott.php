<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");
	
	//執行sql指令並取得pdoStatement
	$sql = "SELECT o.oott_img, o.oott_date, m.mem_nickname, m.mem_img, GROUP_CONCAT(DISTINCT s.style_name SEPARATOR ' #') AS concatenated_style_name
			FROM trip AS t
			JOIN trip_item AS ti ON t.trip_id = ti.trip_id
			JOIN place AS p ON ti.place_id = p.place_id
			JOIN place_tag_connection AS ptc ON p.place_id = ptc.place_id
			JOIN place_tag AS pt ON ptc.place_tag_id = pt.place_tag_id
			JOIN oott_place_connection AS opc ON pt.place_tag_id = opc.place_tag_id
			JOIN oott AS o ON opc.oott_id = o.oott_id
			JOIN oott_style_connection osc ON o.oott_id = osc.oott_id
			JOIN style s ON osc.style_id = s.style_id
			JOIN member m ON o.mem_id = m.mem_id
			WHERE t.trip_id = :trip_id
			GROUP BY o.oott_id
			ORDER BY rand()
			LIMIT 3;
			";
	$oottData = $pdo->prepare($sql); 
	$oottData->bindValue(":trip_id", $_GET["trip_id"]);
    $oottData->execute();
  
	if( $oottData->rowCount() === 0 ){ //找不到
        //傳回空的JSON字串
        echo "{}";
    }else{ //找得到
        //取回所有資料
        $oottDataRow = $oottData->fetchAll(PDO::FETCH_ASSOC);
        //送出json字串
        echo json_encode($oottDataRow);
    }

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>