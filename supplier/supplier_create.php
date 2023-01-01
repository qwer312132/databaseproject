<?php
    $res = array();
    try {
        $sname = $_POST["sname"];
        $saddress = $_POST["saddress"];
        $sphone = $_POST["sphone"];
        include '../db_conn.php';

        $query = ("INSERT INTO supplier VALUES (?,?,?)");
        $stmt = $db->prepare($query);
        $result = $stmt->execute(array($sname, $saddress, $sphone));
        $res["status"] = 200;
        $res["message"] = "OK";
    } catch (Exception $e) {
        $res["status"] = 500;
        $res["message"] = $e->getMessage();
    }
    echo json_encode($res);
?>