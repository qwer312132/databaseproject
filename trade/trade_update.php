<?php
     $res=array();
     try{
        $tid = $_POST["tid"];
        $cid = $_POST["cid"];
        $lid = $_POST["lid"];
        $tdate = $_POST["tdate"];
 
        include '../db_conn.php';
        $query = ("UPDATE trade set CustomerID = ?, LaptopID = ?, TradeDate = ? WHERE TradeID = ?");
        $stmt =  $db->prepare($query);
        $result = $stmt->execute(array($cid,$lid,$tdate,$tid));
        $res["status"] = 200;
        $res["message"] = "OK";
     }
     catch(Exception $e){
         $res["status"] = 500;
         $res["message"] = $e->getMessage();
     }
     echo json_encode($res);
