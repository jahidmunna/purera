<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Today's details</title>
    <?php include_once 'navbarresource.php'; ?>
    <link rel="stylesheet" href="css/style-body.css">
    <link rel="stylesheet" href="css/style-staff.css">
    <link rel="stylesheet" href="css/w3.css">
</head>
<body id="body">
<!-- Navigation Bar -->
<?php include 'navigationbar.php'; ?>
<section class="py-5" style="margin-top:20px;">
        <div class="container">
            <div class="row">
                <table id="table">
                    <thead>
                        <tr>
                            <th colspan="2" style="text-align:left;padding-left:12px; color: #F1C422;">Date: 25/05/2018</th>
                            <th colspan="6" style="text-align:left; color: #F1C422;">Name: Munna</th>
                            <th colspan="1" ><button id="btn_Save" onclick="saveClicked()">Save</button></th>
                            <th colspan="1"><button  type="button" id="btn_print"class="btn_print" onclick="window.print()">Print</button></th>
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
                    </thead>
                    <tbody>
                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                       
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>101</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>

                        <tr>
                            <td>111</td>
                            <td>520tk</td>
                            <td>10</td>
                            <td><input name="jarGiven" type="number" class="form-control col-form-label-sm"></td>
                            <td><input name="jarReceived" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20</td>
                            <td>220tk</td>
                            <td><input name="paymentToday" type="number" class="form-control col-form-label-sm"></td>                        
                            <td>20tk</td>
                            <td><input name="comment" type="text" class="form-control col-form-label-sm"></td>                        
                        </tr>
                    </tbody>
                </table>                             
            </div>
            <div class="row" style="margin-top:10px;">
                <table>
                    <thead >
                        <tr style="border:0px;">
                            <th colspan="4" style="text-align:left;padding-left:12px; color: #F1C422;">Total amount: 510tk</th>
                            <th colspan="3" style="text-align:center; color: #F1C422;">Total due amount: 500tk</th>
                            <th colspan="3" style="text-align:right; color: #F1C422; padding-right:12px;">Total payment: 100tk</th>
                        </tr>
                        <tr>
                            <th colspan="4" style="text-align:left;padding-left:12px; color: #F1C422;">Total given jar: 220</th>
                            <th colspan="3" style="text-align:center; color: #F1C422;">Total due jar: 100</th>
                            <th colspan="3" style="text-align:right; color: #F1C422; padding-right:12px;">Total jar received: 120</th>
                        </tr>
                    </thead>
                </table>       
            </div>
        </div>
</section>
<script src="js/jquery.freezeheader.js"></script>
 <script>
        
        $('#btn_Save').css( 'cursor', 'pointer' );  
        $(".btn_print").hover(function(){
            $(this).css("color", "antiquewhite");
            }, function(){
            $(this).css("color", "#F1C422");
        });          
     
        /* to scroll only table*/
        $(document).ready(function () {
            $("#table").freezeHeader({ 'offset': '80px' });
        })

        /* if scroll print option disable */        
        $(window).scroll(function() {            
            var height = $(window).scrollTop();
            if(height  > 10) {
                disablePrint();
            }
            else{
                enablePrint();
            }
        });

        function enablePrint() {
            // $(".btn_print").hide();
            $('.btn_print').prop("disabled", false);
            $(".btn_print").css("color", "#F1C422");
        
        }
        function disablePrint() {
            //$(".btn_print").show();            
            $('.btn_print').prop("disabled", true);
            $(".btn_print").css("color", "#666666");
        }

        function saveClicked(){
            console.log("clicked!");
        }

 </script>
</body>
</html>