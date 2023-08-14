<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
try {
//引入連線工作的檔案
require_once("connectDailyTW.php");

    if(isset($_GET['oottId'])){
        $oottId = $_GET['oottId'];

        //執行sql指令並取得pdoStatement
        $sql = "select 
                ot.oott_id,
                ot.oott_img,
                ot.oott_desc,
                ot.oott_season,
                GROUP_CONCAT(DISTINCT style_name SEPARATOR ' #') AS concatenated_style_name,
                GROUP_CONCAT(DISTINCT place_tag_name SEPARATOR ' #') AS concatenated_place_tag_name,
                ot.oott_img_feedback,
                ot.oott_desc_feedback,
                ot.oott_style_feedback,
                ot.oott_type_feedback,
                ot.oott_season_feedback
                
                from oott ot
                join oott_style_connection osc on ot.oott_id = osc.oott_id
                join style s on osc.style_id = s.style_id
                join oott_place_connection opc on ot.oott_id = opc.oott_id
                join place_tag pt on opc.place_tag_id = pt.place_tag_id
                join member m on ot.mem_id = m.mem_id 
                where ot.oott_id = ?
                GROUP BY ot.oott_id";

        $stmt = $pdo->prepare($sql); 
        $stmt -> execute([$oottId]);
        $postDetails = $stmt -> fetch(PDO::FETCH_ASSOC);

        if($postDetails){
            echo json_encode($postDetails);
        } else {
            echo json_encode(array("error" => "Post not found"));
        }
    }  else {
        echo json_encode(array("error" => "No oottId provided"));
    }


} catch (Exception $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
//echo "系統暫時不能正常運行，請稍後再試<br>";	
}
?>