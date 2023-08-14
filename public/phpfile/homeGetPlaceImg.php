<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");
	
	//執行sql指令並取得pdoStatement
	$sql = "SELECT place_img1
			FROM place
			ORDER BY rand()
			LIMIT 6;
			";
	$placeImg = $pdo->prepare($sql); 
    $placeImg->execute();

	if( $placeImg->rowCount() === 0 ){ //找不到
        //傳回空的JSON字串
        echo "{}";
    }else{ //找得到
        //取回所有資料
        $placeImgRow = $placeImg->fetchAll(PDO::FETCH_ASSOC);
        //送出json字串
        echo json_encode($placeImgRow);
    }

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>