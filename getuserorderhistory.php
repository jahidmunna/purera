<?php
    if(!isset($_GET['id'])){
        header("location:home.php");
    }
    include_once 'master_db.php';    
    $cid = $_GET['id'];
    $db = new DB();
    $res = $db->getCustomerDeleveryHistory($cid);
    $output = "";
    if($res->num_rows >0){
        $output = "
            <table class= 'table table-striped'>
                <thead>
                    <center><h5 style='color:#239B56; font-size: 22px;'>Order History</h5></center>
                    <tr>
                        <th scope='col'>Date</th>
                        <th scope='col'>Jar Received</th>
                        <th scope='col'>Jar Given</th>
                        <th scope='col'>Money Paid</th>                                
                    </tr>
                </thead>
            <tbody>
        ";
        while($raw = $res->fetch_assoc()){
            $date = $raw['date'];
            $date = date( "d/m/Y", strtotime ( $date ) );
            $jarReceived = $raw['jarGiven']; //from customer prospective it's receive
            $jarGiven = $raw['jarReceive']; // and it's given
            $paid = $raw['paymentToday'];

            $output .= "
                <tr>
                    <td>".$date."</td>
                    <td>".$jarReceived."</td>                                
                    <td>".$jarGiven."</td>
                    <td>".$paid." tk</td>
                </tr>";
        }
        $output .="
            </tbody>
        </table>";
    }
    echo $output;
?>