<?php
    if(!isset($_GET['id'])){
        header("location:home.php");
    }
    include_once 'master_db.php';    
    $staffid = $_GET['id'];
    $db = new DB();
    $staffDetails = $db->getstaffdetailsByID($staffid);
    if($staffid != $staffDetails['staffID']){
        echo "invalid staff number";
        return;
    }
    $staffName = $staffDetails['staffName'];
    date_default_timezone_set('Asia/Dhaka');
    $date = date('d/m/Y');
    $output = "
            <div class= 'row'>
                <table id='table'>
                    <thead>
                        <tr>
                            <th colspan='4' style='text-align:left;padding-left:12px; color: #F1C422;'>Date: ".$date."</th>
                            <th colspan='5' style='text-align:left;color: #F1C422;'>Name: ".$staffName."</th>
                            <th colspan='1'><button  type='button' id='btn_print' class='btn_print' onclick= 'window.print()'>Print</button></th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Previous Due Money</th>
                            <th>Previous Due Jar</th>
                            <th>Jar Given</th>
                            <th>Jar Received</th>
                            <th>Jar Due</th>                        
                            <th>Total taka</th>
                            <th>Payment Today</th>
                            <th>Due Money</th>
                            <th>Comment</th>                        
                        </tr>
                    </thead>";    
        $output2 = $output ; //copy the table html
    $result = $db->getAllCustomerDetailsWithCorrespondingStaff($staffid);
    if($result->num_rows >0){
        $dates =  date('Y-m-d');        
        $output .= "<tbody>";
        $totalAmount  = $totalDueAmount =  $totalPayment = $totalGivenJar =  $totalDueJar =  $totalJarReceived = 0;
        while($raw = $result->fetch_assoc()){
            $cid = $raw['customerID'];
            $customerDue = $db->getCustomerDue($cid);
            $prevDueMoney = $customerDue['duemoney'];
            $prevDueJar = $customerDue['duejar'];
            $customerDeleveryDetails = $db->getCustomerDelevery($cid, $dates);
            $givenJar = $customerDeleveryDetails['jarGiven'];
            $receivedJar = $customerDeleveryDetails['jarReceive'];
            $dueJar = $givenJar + $prevDueJar - $receivedJar;
            $customerDetails = $db->getCustomerDetails($cid);
            $rate = $customerDetails['customerRate'];
            $totalTaka = ($rate * $givenJar) + $prevDueMoney;
            $payToday = $customerDeleveryDetails['paymentToday'];
            $dueMoney = $totalTaka - $payToday;
            $comment = $customerDeleveryDetails['commentIFany'];
            $db->setCustomerDue($cid,$dates,$dueJar,$dueMoney);
            
            $totalAmount += $totalTaka;
            $totalDueAmount += $dueMoney;
            $totalPayment += $payToday;            
            $totalGivenJar += $givenJar;
            $totalDueJar += $dueJar;
            $totalJarReceived += $receivedJar;
            
            
            $output .= 
                "<tr>
                    <td>".$cid."</td>
                    <td><input name='prevDueMoney' id='prevDueMoney'  type='number' class='form-control col-form-label-sm prevDueMoney' value='".$prevDueMoney."'></td>
                    <td><input name='prevDueJar'  id='prevDueJar' type='number' class='form-control col-form-label-sm prevDueJar' value='".$prevDueJar."'></td>  
                    <td><input name='jarGiven' id='jarGiven' type='number' class='form-control col-form-label-sm jarGiven' value='".$givenJar."'></td>
                    <td><input name='jarReceived' id='jarReceived' type='number' class='form-control col-form-label-sm jarReceived' value='".$receivedJar."'></td>                        
                    <td><div id='dueJar' class='dueJar'>".$dueJar."</div></td>
                    <td><div id='totalTaka' class='totalTaka'>".$totalTaka."</div></td>
                    <td><input name='paymentToday' id='paymentToday' type='number' class='form-control col-form-label-sm paymentToday' value='".$payToday."'></td>                        
                    <td><div id='dueMoney' class='dueMoney'>".$dueMoney."</div></td>
                    <td><input name='comment' id='comment' type='text' class='form-control col-form-label-sm comment' value='".$comment."'></td>
                </tr>";
        }
        $output .= 
                    "</tbody>
                </table>                             
            </div>
            <div class= 'row' style= 'margin-top:10px;'>
                <table>
                    <thead >
                        <tr style='border:0px;'>
                            <th colspan='4' style='text-align:left;padding-left:12px; color: #F1C422;'>Total amount: ".$totalAmount."tk</th>
                            <th colspan='3' style='text-align:center; color: #F1C422;'>Total due amount: ".$totalDueAmount."tk</th>
                            <th colspan='3' style='text-align:right; color: #F1C422; padding-right:12px;'>Total payment: ".$totalPayment."tk</th>
                        </tr>
                        <tr>
                            <th colspan='4' style='text-align:left;padding-left:12px; color: #F1C422;'>Total given jar: ".$totalGivenJar."</th>
                            <th colspan='3' style='text-align:center; color: #F1C422;'>Total due jar: ".$totalDueJar."</th>
                            <th colspan='3' style='text-align:right; color: #F1C422; padding-right:12px;'>Total jar received: ".$totalJarReceived."</th>
                        </tr>
                    </thead>
                </table>       
            </div>"; 
    }
    else{
        $output2 .= "<tbody>
                        <tr>
                            <td colspan='10' style='text-align:center;color: red;'>No data found</td>
                        </tr>
                    </tbody>
                </table>                             
            </div>";
            $output = $output2;
    }

    echo $output;
?>