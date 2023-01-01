<?php
     $res=array();
     try{
         $sname = $_POST["sname"];
 
         include '../db_conn.php';
         $query = ("DELETE FROM supplier WHERE SupplierName = ?");
         $stmt =  $db->prepare($query);
         $result = $stmt->execute(array($sname));
         $res["status"] = 200;
         $res["message"] = "OK";
 
     }
     catch(Exception $e){
         $res["status"] = 500;
         $res["message"] = $e->getMessage();
     }
     echo json_encode($res);
?>