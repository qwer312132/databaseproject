<?php
    $res=array();
    try{
        include '../db_conn.php';
        $name = $_POST["search"];
        $condition =$_POST["condition"];
        $query = sprintf("SELECT * FROM customer,laptop,trade,supplier WHERE %s = ? AND
        customer.CustomerID = trade.CustomerID AND
        laptop.LaptopID = trade.LaptopID AND
        laptop.SupplierName = supplier.SupplierName
        ",$condition);
        $stmt =  $db->prepare($query);
        $stmt->execute(array($name));
        $result = $stmt->fetchAll();
        $res["data"] = array();
        for($i=0;$i<count($result);$i++){
            $row = array();
            $row["TradeID"] = $result[$i]['TradeID'];
            $row["TradeDate"] = $result[$i]["TradeDate"];
            $row["CustomerName"] = $result[$i]['CustomerName'];
            $row["CustomerPhone"] = $result[$i]['CustomerPhone'];
            $row["LaptopName"] = $result[$i]['LaptopName'];
            $row["Warranty"] = $result[$i]['Warranty'];
            $row["SupplierName"] = $result[$i]['SupplierName'];
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
?>