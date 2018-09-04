<?php

    if(isset($_POST['type']) && !empty (trim($_POST['type'])) ){
        $category = $_POST['type'];
        $values = $_POST['value'];
        $idz = $_POST['uid'];
        date_default_timezone_set('Asia/Dhaka'); //set default time zone to Dhaka 
        $dates = date ('Y-m-d');
        include_once 'master_db.php';    
        $db = new DB();

        if($category === 'prevDueMoney'){
            $db->updateCustomerDue($idz,2,$values);
        }
        else if ($category === 'prevDueJar'){
            $db->updateCustomerDue($idz,1,$values);
        }
        else if ($category ==='jarGiven'){
            $db->updateCustomerDelevery($idz,$dates,1,$values);
        }
        else if ($category === 'jarReceived'){
            $db->updateCustomerDelevery($idz,$dates,2,$values);
        }
        else if ($category === 'paymentToday'){
            $db->updateCustomerDelevery($idz,$dates,3,$values);
        }
        else if ($category === 'comment'){
            $db->updateCustomerDelevery($idz,$dates,4,$values);
        }
        else {
            echo "invalid";
        }
    }

?>