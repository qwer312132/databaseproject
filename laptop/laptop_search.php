<?php
    $res=array();
    $test=array();
    try{
        include '../db_conn.php';
        $name = $_POST["search"];
        $condition =$_POST["condition"];
        array_push($test,$name);
        array_push($test,$condition);
        $query = sprintf("select * from laptop where %s = ?",$condition);
        $stmt =  $db->prepare($query);
        $stmt->execute(array($name));
        $result = $stmt->fetchAll();
        $res["data"] = array();
        for($i=0;$i<count($result);$i++){
            $row = array();
            $row["LaptopID"] = $result[$i]['LaptopID'];
            $row["LaptopName"] = $result[$i]['LaptopName'];
            $row["SupplierName"] = $result[$i]['SupplierName'];
            $row["Price"] = $result[$i]['Price'];
            $row["Warranty"] = $result[$i]['Warranty(year)'];
            array_push($res["data"],$row);
        }
        $query = sprintf("select MIN(Price) from laptop where %s = ?",$condition);
        $stmt =  $db->prepare($query);
        $stmt->execute(array($name));
        $result = $stmt->fetchAll();
        $res["min"] = $result;
        $res["status"] = 200;
        $res["message"] = "OK";
    }
    catch(Exception $e){
        $res["status"] = 500;
        $res["message"] = $e->getMessage();
    }
    echo json_encode($res);
    // echo json_encode($test);
?>