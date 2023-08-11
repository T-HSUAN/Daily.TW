<?php 
	header('Access-Control-Allow-Origin:*');// 允许的前端域名
	header("Content-Type:application/json;charset=utf-8");
    header('Access-Control-Allow-Headers: Content-Type'); // 允许的请求头类型
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");
	
	//執行sql指令並取得pdoStatement
	$sql = "select * from ticket";
	$tickets = $pdo->query($sql); 
	$ticketRows = $tickets->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($ticketRows, JSON_NUMERIC_CHECK);

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>