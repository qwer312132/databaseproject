<?php
    $res=array();
    $test=array();
    try{
        include '../db_conn.php';
        $name = $_POST["search"];
        $condition =$_POST["condition"];
        array_push($test,$name);
        array_push($test,$condition);
        $query = sprintf("select * from supplier where %s = ?",$condition);
        $stmt =  $db->prepare($query);
        $stmt->execute(array($name));
        // $query = ("select * from customer where CustomerName = 'A'");
        // $stmt =  $db->prepare($query);
        // $result=$stmt->execute();
        $result = $stmt->fetchAll();
        $res["data"] = array();
        for($i=0;$i<count($result);$i++){
            $row = array();
            $row["SupplierName"] = $result[$i]['SupplierName'];
            $row["SupplierAddress"] = $result[$i]['SupplierAddress'];
            $row["SupplierPhone"] = $result[$i]['SupplierPhone'];
            array_push($res["data"],$row);
        }
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