<?php
     $res=array();
     try{
        $id = $_POST["id"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
 
        include '../db_conn.php';
        $query = ("UPDATE customer set CustomerName = ?, CustomerPhone = ? WHERE CustomerID = ?");
        $stmt =  $db->prepare($query);
        $result = $stmt->execute(array($name,$phone,$id));
        $res["status"] = 200;
        $res["message"] = "OK";
     }
     catch(Exception $e){
         $res["status"] = 500;
         $res["message"] = $e->getMessage();
     }
     echo json_encode($res);
