<?php 
	header('Access-Control-Allow-Origin:*');// 允许的前端域名
	header("Content-Type:application/json;charset=utf-8");
    header('Access-Control-Allow-Headers: Content-Type'); // 允许的请求头类型
try {
	//引入連線工作的檔案
	require_once("connectDailyTW.php");
	
	//執行sql指令並取得pdoStatement
    $sql = "SELECT
    t.ticket_id AS 'id',
    t.ticket_name AS 'Name',
    r.region_name AS 'location',
    CONCAT('#', GROUP_CONCAT(DISTINCT pt.place_tag_name SEPARATOR '#')) AS Tags,
    p.place_desc,
    p.place_addr AS 'addr',
    p.place_link AS 'addr_link',
    p.place_img1 AS 'img',
    t.ticket_adult AS 'price_adult',
    t.ticket_ex AS 'price_ex',
    t.ticket_discount AS 'discount',
    t.ticket_desc AS 'desc',
    t.ticket_notice AS 'notice',
    t.ticket_date AS 'date',
    t.ticket_status AS 'status',
    t.ticket_top AS 'top',
    '0' AS 'count_adult', -- 添加一個虛擬欄位，用來計算數量
    '0' AS 'count_ex', -- 添加一個虛擬欄位，用來計算數量
    '0' AS 'subtotal', -- 添加一個虛擬欄位，用來計算小計
    TRUE AS 'selected' -- 添加一個虛擬欄位，用來確認購物車勾選狀態
    FROM
        ticket t 
    JOIN
        place p ON t.place_id = p.place_id
    JOIN
        place_tag_connection ptc ON p.place_id = ptc.place_id
    JOIN
        place_tag pt ON ptc.place_tag_id = pt.place_tag_id
    JOIN
        region r ON p.region_id = r.region_id
    GROUP BY
        t.ticket_id;";
	$ticketList = $pdo->query($sql); 
	$ticketRows = $ticketList->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($ticketRows, JSON_NUMERIC_CHECK);

} catch (Exception $e) {
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>