<?php
     $res=array();
     try{
         $tid = $_POST["tid"];
 
         include '../db_conn.php';
         $query = ("DELETE FROM trade WHERE TradeID = ?");
         $stmt =  $db->prepare($query);
         $result = $stmt->execute(array($tid));
         $res["status"] = 200;
         $res["message"] = "OK";
 
     }
     catch(Exception $e){
         $res["status"] = 500;
         $res["message"] = $e->getMessage();
     }
     echo json_encode($res);
?>