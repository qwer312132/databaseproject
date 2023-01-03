<?php
$res = array();
$test = array();
try {
    include '../db_conn.php';
    $name = $_POST["search"];
    $condition = $_POST["condition"];
    // try{
    //     $query=file_get_contents("../sql/view.sql");
    //     $query = str_replace("sname",$name,$query);
    //     $stmt =  $db->prepare($query);
    //     $stmt->execute();

    // }
    // catch(Exception $e){
    // }
    if ($condition != "avgup") {
        $query = sprintf("select * from laptop where %s = ?", $condition);
        $stmt = $db->prepare($query);
        $stmt->execute(array($name));
    } else {
        $query = sprintf("select * from laptop_%s_view where Price > all(select AVG(Price) from laptop_%s_view);", $name, $name);
        $stmt = $db->prepare($query);
        $stmt->execute();
    }

    $result = $stmt->fetchAll();
    $res["data"] = array();
    for ($i = 0; $i < count($result); $i++) {
        $row = array();
        $row["LaptopID"] = $result[$i]['LaptopID'];
        $row["LaptopName"] = $result[$i]['LaptopName'];
        $row["SupplierName"] = $result[$i]['SupplierName'];
        $row["Price"] = $result[$i]['Price'];
        $row["Warranty"] = $result[$i]['Warranty'];
        array_push($res["data"], $row);
    }
    if ($condition != "avgup") {
        $query = sprintf("select MIN(Price) from laptop where %s = ?", $condition);
        $stmt = $db->prepare($query);
        $stmt->execute(array($name));
        $result = $stmt->fetchAll();
        $res["min"] = $result[0]['MIN(Price)'];
        $query = sprintf("select MAX(Price) from laptop where %s = ?", $condition);
        $stmt = $db->prepare($query);
        $stmt->execute(array($name));
        $result = $stmt->fetchAll();
        $res["max"] = $result[0]['MAX(Price)'];
        $query = sprintf("select AVG(Price) from laptop where %s = ?", $condition);
        $stmt = $db->prepare($query);
        $stmt->execute(array($name));
        $result = $stmt->fetchAll();
        $res["avg"] = $result[0]['AVG(Price)'];
    } else {
        // $res["min"] = 0;
        // $res["max"] = 0;
        // $res["avg"] = 0;
        $query = sprintf("select MIN(Price) from laptop_%s_view;", $name);
        $stmt = $db->prepare($query);
        $stmt->execute(array());
        $result = $stmt->fetchAll();
        $res["min"] = $result[0]['MIN(Price)'];
        $query = sprintf("select MAX(Price) from laptop_%s_view;", $name);
        $stmt = $db->prepare($query);
        $stmt->execute(array());
        $result = $stmt->fetchAll();
        $res["max"] = $result[0]['MAX(Price)'];
        $query = sprintf("select AVG(Price) from laptop_%s_view;", $name);
        $stmt = $db->prepare($query);
        $stmt->execute(array());
        $result = $stmt->fetchAll();
        $res["avg"] = $result[0]['AVG(Price)'];
    }


    $res["status"] = 200;
    $res["message"] = "OK";
} catch (Exception $e) {
    $res["status"] = 500;
    $res["message"] = $e->getMessage();
    $res['data'] = [];
}
echo json_encode($res);
// echo json_encode($test);
?>