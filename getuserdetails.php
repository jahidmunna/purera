<?php
    if(!isset($_GET['id'])){
        header("location:home.php");
    }

    function emptyCheck($data){
        if ($data == "") {
            $data = "Not Given";
        }
        return $data;
    }
    include_once 'master_db.php';    
    $cid = $_GET['id'];
    $db = new DB();
    $customerDetails = $db->getCustomerDetails($cid);
    $name = $customerDetails['customerName'];
    $rate = $customerDetails['customerRate'];
    $phone = emptyCheck($customerDetails['customerPhone']); 
    $email = emptyCheck($customerDetails['customerEmail']);
    $staffNumber = $customerDetails['customerCorrospondingStaff'];
    $staffDetails = $db->getstaffdetailsByID($staffNumber);
    $staffName = $staffDetails['staffName'];
    $address = emptyCheck($customerDetails['customerAddress']);
    $customerdueDetails = $db->getCustomerDue($cid);
    $dueMoney = $customerdueDetails['duemoney'];
    $output= "
        <table>
            <tr>
                <td style='color:#239B56; font-size: 22px;'>Customer Details</td>
            <tr>
            <tr>
                <td>ID Number</td>
                <td>:</td>
                <td>".$cid."</td>                            
            </tr>

            <tr>
                <td>Name</td>
                <td>:</td>
                <td>".$name."</td>                            
            </tr>
            <tr>
                <td>Pay Per Bottle</td>
                <td>:</td>
                <td>".$rate." tk</td>                            
            </tr>
            <tr>
                <td>Total Due</td>
                <td>:</td>
                <td>".$dueMoney." tk</td>                            
            </tr>
            <tr>
                <td>Staff Name</td>
                <td>:</td>
                <td>".$staffName."</td>                            
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td>".$phone."</td>                            
            </tr>
            <tr>
                <td>Address</td>
                <td>:</td>
                <td>".$address."</td>                            
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>".$email."</td>                            
            </tr>
            <tr>
                <td><button id='viewOrderBtn' onclick='showHistory()' class='btn btn-primary'>View Order History</button></td>
            <tr>                        
        </table>
        ";
    echo $output;
?>