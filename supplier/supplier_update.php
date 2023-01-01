<?php
     $res=array();
     try{
        $sname = $_POST["sname"];
        $saddress = $_POST["saddress"];
        $sphone = $_POST["sphone"];
 
        include '../db_conn.php';
        $query = ("UPDATE supplier set SupplierAddress = ?, SupplierPhone = ? WHERE SupplierName = ?");
        $stmt =  $db->prepare($query);
        $result = $stmt->execute(array($saddress,$sphone,$sname));
        $res["status"] = 200;
        $res["message"] = "OK";
     }
     catch(Exception $e){
         $res["status"] = 500;
         $res["message"] = $e->getMessage();
     }
     echo json_encode($res);
