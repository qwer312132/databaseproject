<?php
    $res = array();
    try {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        include '../db_conn.php';
        $query = ("SELECT CustomerID FROM customer");
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
        $result = $stmt->fetchAll();
        $temp=array();
        for($i=0;$i<count($result);$i++){
            array_push($temp,$result[$i]['CustomerID']);
        }
        $i = 0;
        while (in_array($i,$temp)) {
            $i = $i + 1;
        }

        $query = ("INSERT INTO customer VALUES (?,?,?)");
        $stmt = $db->prepare($query);
        $result = $stmt->execute(array($i, $name, $phone));
        $res["status"] = 200;
        $res["message"] = "OK";
    } catch (Exception $e) {
        $res["status"] = 500;
        $res["message"] = $e->getMessage();
    }
    echo json_encode($i);
?>