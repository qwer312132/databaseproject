<?php
     $res=array();
     try{
         $id = $_POST["id"];
 
         include '../db_conn.php';
         $query = ("DELETE FROM customer WHERE CUSTOMERID = ?");
         $stmt =  $db->prepare($query);
         $result = $stmt->execute(array($id));
         $res["status"] = 200;
         $res["message"] = "OK";
 
     }
     catch(Exception $e){
         $res["status"] = 500;
         $res["message"] = $e->getMessage();
     }
     echo json_encode($res);
?>