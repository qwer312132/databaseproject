<?php
    $res=array();
    try{
        $name = $_POST["search"];
       
        include '../db_conn.php';
        $query = ("select * from customer where CustomerName = ?");
        $stmt =  $db->prepare($query);
        $error= $stmt->execute(array($name));
        $result = $stmt->fetchAll();
        $res["data"] = array();
        for($i=0;$i<count($result);$i++){
            $row = array();
            $row["CustomerID"] = $result[$i]['CustomerID'];
            $row["CustomerName"] = $result[$i]['CustomerName'];
            $row["CustomerPhone"] = $result[$i]['CustomerPhone'];
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