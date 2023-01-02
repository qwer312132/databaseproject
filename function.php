<?php
    function getID($db,$tname){
        $query = sprintf("select * from %s",$tname);
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
        $result = $stmt->fetchAll();
        $temp = array();
        for ($i = 0; $i < count($result); $i++) {
            array_push($temp, $result[$i]['LaptopID']);
        }
        $i = 0;
        while (in_array($i, $temp)) {
            $i = $i + 1;
        }
        return $i;
    }

    create function de()
    returns int
    begin
    

?>