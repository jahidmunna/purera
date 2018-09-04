<?php

    include_once 'master_db.php';   
    $id = $_POST["query"]; 
    $db = new DB();
    $customerids = $db->getAllCustomers();
    $data = array();
    if($customerids->num_rows >0){
        while($row = $customerids->fetch_assoc()){
            $data[] = $row['customerID'];
        }
        echo json_encode($data);
    }
?>


