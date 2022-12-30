<?php session_start(); ?>
<?php
    $res=array();
    try{
        $useremail = $_POST["useremail"];
        $pass = $_POST["pass"];

        include '../db_conn.php';
        $query = ("select * from user where UserEmail = ?");
        $stmt =  $db->prepare($query);
        $error= $stmt->execute(array($useremail));
        $result = $stmt->fetchAll();

        if($result == NULL)
        {
            $res["status"] = 200;
            $res["message"] = "使用者不存在";
        }
        else if($result[0]["UserPassword"] != $pass)
        {
            $res["status"] = 200;
            $res["message"] = "密碼錯誤";
        }
        else
        {
            $res["status"] = 200;
            $res["message"] = "OK";
            $_SESSION['UserName'] = $result[0]["UserName"];
        }
    }
    catch(Exception $e){
        $res["status"] = 500;
        $res["message"] = $e->getMessage();
    }
    echo json_encode($res);
?>
