<?php
     $res=array();
     try{
         $name = $_POST["name"];
         $phone = $_POST["phone"];
 
         include '../db_conn.php';
         $query = ("INSERT INTO customer VALUES (?,?,?)");
         $stmt =  $db->prepare($query);
         $result = $stmt->execute(array(0,$name,$phone));
         $res["status"] = 200;
         $res["message"] = "OK";
 
     }
     catch(Exception $e){
         $res["status"] = 500;
         $res["message"] = $e->getMessage();
     }
     echo json_encode($res);
?>