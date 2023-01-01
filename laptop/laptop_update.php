<?php
     $res=array();
     try{
        $id = $_POST["id"];
        $lname = $_POST["lname"];
        $sname = $_POST["sname"];
        $price = $_POST["price"];
        $war = $_POST["war"];
        include '../db_conn.php';
        $query = ("UPDATE laptop set LaptopName = ?, SupplierName = ?, Price = ?, Warranty = ? WHERE LaptopID = ?");
        $stmt =  $db->prepare($query);
        $stmt->execute(array($lname,$sname,$price,$war,$id));
        $res["status"] = 200;
        $res["message"] = "OK";
     }
     catch(Exception $e){
         $res["status"] = 500;
         $res["message"] = $e->getMessage();
     }
     echo json_encode($res);
