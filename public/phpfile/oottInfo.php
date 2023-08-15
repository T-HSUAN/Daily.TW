<?php 
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json;charset=utf-8");

try {
    require_once("connectDailyTW.php");

   //執行sql指令並取得pdoStatement
   $sql = "select 
    ot.oott_id, 
    ot.oott_img, 
    DATE_FORMAT(ot.oott_date, '%Y/%m/%d') AS oott_date, 
    ot.oott_desc,
    ot.oott_view,
    m.mem_name, 
    m.mem_img,
    GROUP_CONCAT(style_name SEPARATOR ' #') AS concatenated_style_name
    from oott ot
    join oott_style_connection osc on ot.oott_id = osc.oott_id
    join style s on osc.style_id = s.style_id
    join member m on ot.mem_id = m.mem_id 
    WHERE ot.oott_id = :oott_id
    GROUP BY ot.oott_id;
    ";
         
    $oottInfo = $pdo->prepare($sql); 
	$oottInfo->bindValue(":oott_id", $_GET["oott_id"]);
	$oottInfo->execute();
	
	if( $oottInfo->rowCount() === 0 ){ //找不到
		//傳回空的JSON字串
		echo "{}";
	}else{ //找得到
		//取回資料
		$oottInfoRow = $oottInfo->fetch(PDO::FETCH_ASSOC);
		//送出json字串
		echo json_encode($oottInfoRow);
	}

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>
