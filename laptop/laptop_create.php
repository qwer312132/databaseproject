<?php
$res = array();
try {
    $lname = $_POST["lname"];
    $sname = $_POST["sname"];
    $price = $_POST["price"];
    $war = $_POST["war"];
    include '../db_conn.php';
    $query = ("SELECT LaptopID FROM laptop");
    $stmt = $db->prepare($query);
    $result = $stmt->execute();
    $result = $stmt->fetchAll();
    $temp = array();
    for ($i = 0; $i < count($result); $i++) {
        array_push($temp, $result[$i]['LaptopID']);
    }
    $i = 0;
    while (in_array($i, $temp)) {
        $i = $i + 1;
    }

    $query = ("INSERT INTO laptop VALUES (?,?,?,?,?)");
    $stmt = $db->prepare($query);
    $result = $stmt->execute(array($i, $lname, $sname, $price, $war));
    $res["status"] = 200;
    $res["message"] = "OK";
} catch (Exception $e) {
    $res["status"] = 500;
    $res["message"] = $e->getMessage();
}
echo json_encode($res);
?>