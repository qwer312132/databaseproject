<?php
    $res=array();
    try{
        $name = $_POST["name"];
        $useremail = $_POST["useremail"];
        $pass = $_POST["pass"];

        include '../db_conn.php';
        $query = ("INSERT INTO user VALUES (?,?,?,?)");
        $stmt =  $db->prepare($query);
        $result = $stmt->execute(array(0,$name,$useremail,$pass));
        $res["status"] = 200;
        $res["message"] = "OK";

    }
    catch(Exception $e){
        $res["status"] = 500;
        $res["message"] = $e->getMessage();
    }
    echo json_encode($res);

?>
