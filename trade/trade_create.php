<?php
    $res = array();
    try {
        $sid  = $_POST["sid"];
        $lid = $_POST["lid"];
        $tdate = $_POST["tdate"];
        include '../db_conn.php';
        $query = ("SELECT TradeID FROM trade");
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
        $result = $stmt->fetchAll();
        $temp=array();
        for($i=0;$i<count($result);$i++){
            array_push($temp,$result[$i]['TradeID']);
        }
        $i = 0;
        while (in_array($i,$temp)) {
            $i = $i + 1;
        }

        $query = ("INSERT INTO trade VALUES (?,?,?,?)");
        $stmt = $db->prepare($query);
        $result = $stmt->execute(array($i, $sid, $lid, $tdate));
        $res["status"] = 200;
        $res["message"] = "OK";
    } catch (Exception $e) {
        $res["status"] = 500;
        $res["message"] = $e->getMessage();
    }
    echo json_encode($i);
?>