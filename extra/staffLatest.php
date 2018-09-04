<?php
    if (isset($_GET['id'])) {
        $staffid = $_GET['id'];
    }
    else {
        header("location: home.php");
    }
?>
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
        <div id="output" class="container">
            <div class="row">
                <table id="table">
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
        <input style="display:none;" id="staffid" value="<?php echo $staffid; ?>"/>
</section>

<script src="js/jquery.freezeheader.js"></script>
 <script>
        $(document).ready(function () {
            //show data while loading is complete  
            retriveData();
            $("#table").freezeHeader({ 'offset': '80px' });
        })

        $(".btn_print").hover(function(){
            $(this).css("color", "antiquewhite");
            }, function(){
            $(this).css("color", "#F1C422");
        });          
     
        /* to scroll only table*/
        

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

        //to load the data
        function retriveData(){
            var stid = $('#staffid').val();
           // console.log(stid);
            $.ajax({    //create an ajax request to getData.php
                url: "getData.php?id="+stid,             
                dataType: "html",   //expect html to be returned                
                success: function(response){                    
                    $("#table").html(response); 
                    //alert(response);
                }
            });
        }
        
        //to detect the change of the table
        $('#table').on('change', '.prevDueMoney, .prevDueJar,.jarGiven,.jarReceived,.paymentToday,.comment', function(event) {
            var className = $(this).attr("class");//get the class name from the changed element
            var idName = $(this).attr("id");//get the id name from the changed element            
            var value = $(this).val();
            var userID = $(this).closest('tr').find('td:eq(0)').text();  //get the id of the current row
            //console.log(elem);
            className = className.split(" ").splice(-1).toString(); //to get the last part of the class name
            //var string = "class:"+className+"value:"+value+"id:"+userID+"end";
            //alert(string);
            updateData(className,value,userID);
        });

        //to update data
        function updateData(attributName, attributeValue,id){
            var request = $.ajax({
                url: "update.php",
                method: "POST",
                data: { 
                    type: attributName,
                    value: attributeValue,
                    uid: id
                 },
                dataType: "html"
            });
            request.done(function(data) {
              // $("#table").html(data); 
                retriveData(); //after update it will retrive the new data;                
            });    
        }

 </script>
</body>
</html>