<?php 
	header('Access-Control-Allow-Origin:*');
	header("Content-Type:application/json;charset=utf-8");
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");
	
	//執行sql指令並新增資料
	$sql = "insert into feedback (`feedback_name`, `feedback_email`, `feedback_subject`, `feedback_cont`)
    values (:feedback_name, :feedback_email, :feedback_subject, :feedback_cont);";
    $feedback = $pdo->prepare($sql); 
    $feedback->bindValue(":feedback_name", $_POST["feedback_name"]);
    $feedback->bindValue(":feedback_email", $_POST["feedback_email"]);
    $feedback->bindValue(":feedback_subject", $_POST["feedback_subject"]);
    $feedback->bindValue(":feedback_cont", $_POST["feedback_cont"]);
    $feedback->execute();
	$msg = ["error" => false, "message" => "新增成功"];

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
	$message = "錯誤行號 : ". $e->getLine(). "錯誤原因 : ". $e->getMessage();
    $msg = ["error" => true, "message" => $message]; 
}
?>