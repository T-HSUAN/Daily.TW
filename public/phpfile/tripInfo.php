<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");
	
	//執行sql指令並取得pdoStatement
	$sql = "select t.trip_name, t.trip_author, t.trip_date, t.trip_view, t.trip_desc, p.place_name, p.place_desc, p.place_img1, p.place_img2, p.place_img3, p.place_stay, p.place_addr, pt.place_tag_name
			from trip AS t
			join trip_item AS ti on t.trip_id = ti.trip_id
			join place AS p on ti.place_id = p.place_id
			join place_tag_connection AS ptc on p.place_id = ptc.place_id
			join place_tag AS pt on ptc.place_tag_id = pt.place_tag_id;
			";
	$trips = $pdo->query($sql); 
	$tripRows = $trips->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($tripRows);

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>