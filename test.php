<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        #body{
            margin: auto 100px;
        }
    </style>
</head>
<body id="body">
    <?php
        date_default_timezone_set('Asia/Dhaka');
        $day = (int) date('d');
       // print "day = ".$day."<br>";
        var_dump($day);
        $month =  date('m');
        
       // print "month = ".$month."<br>";

        $year =  date('Y');
        //echo $year;
        $today = date('d/m/y');
        $currentMonth = date ('F');

        $dates =  date('Y-m-d',strtotime("+1 days"));
        echo $dates;
        

    ?>
</body>
</html>



<?php
    if(!isset($_GET['id'])){
        header("location:home.php");
    }
    include_once 'master_db.php';    
    $cid = $_GET['id'];
    $db = new DB();
    $customerDetails = $db->getCustomerDetails($cid);
    $name = $customerDetails['customerName'];
    $rate = $customerDetails['customerRate'];
    $address = $customerDetails['customerAddress'];
    if ($address == "") {
        $address = "Not Given!";
    }
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
                <td>Address</td>
                <td>:</td>
                <td>".$address."</td>                            
            </tr>
            <tr>
                <td><button id='viewOrderBtn' onclick='showHistory()' class='btn btn-primary'>View Order History</button></td>
            <tr>                        
        </table>
        ";
    echo $output;
?>