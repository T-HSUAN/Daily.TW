<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");
	
	//執行sql指令並取得pdoStatement
	$sql = "SELECT DISTINCT pt.place_tag_name
			FROM trip AS t
			JOIN trip_item AS ti on t.trip_id = ti.trip_id
			JOIN place AS p on ti.place_id = p.place_id
			JOIN place_tag_connection AS ptc on p.place_id = ptc.place_id
			JOIN place_tag AS pt on ptc.place_tag_id = pt.place_tag_id
			WHERE t.trip_id = :trip_id AND pt.place_tag_status = 1;
			";
	$tripTags = $pdo->prepare($sql); 
	$tripTags->bindValue(":trip_id", $_GET["trip_id"]);
    $tripTags->execute();
  
	if( $tripTags->rowCount() === 0 ){ //找不到
        //傳回空的JSON字串
        echo "{}";
    }else{ //找得到
        //取回所有資料
        $tripTagsRow = $tripTags->fetchAll(PDO::FETCH_ASSOC);
        //送出json字串
        echo json_encode($tripTagsRow);
    }

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>