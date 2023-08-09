<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");
	
	//執行sql指令並取得pdoStatement
	$sql = "select * from trip 
            join trip_item
            on trip.trip_id = trip_item.trip_id
            join place 
            on trip_item.place_id = place.place_id
            join region
            on place.region_id = region.region_id
            join place_tag_connection
            on place.place_id = place_tag_connection.place_id
            join place_tag
            on place_tag_connection.place_tag_id = place_tag.place_tag_id
            group by trip.trip_id;
            ";
            
	$products = $pdo->query($sql); 
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($prodRows);

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>