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
    <link rel="stylesheet" href="css/style-staff-last.css">
    <link rel="stylesheet" href="css/w3.css">
</head>
<body>
<!-- Navigation Bar -->
<?php include 'navigationbar.php'; ?>
<section class="py-5" style="margin-top:20px;">
        <div id="output" class="container"></div>
        <input style="display:none;" id="staffid" value="<?php echo $staffid; ?>"/>
</section>

<script src="js/jquery.freezeheader.js"></script>
<script src="js/jquery.stickytableheaders.min.js"></script>


 <script>

        $(document).ready(function () {
            //show data while loading is complete  
            $("table").stickyTableHeaders();
            
            retriveData();
        })

        $(".btn_print").hover(function(){
            $(this).css("color", "antiquewhite");
            }, function(){
            $(this).css("color", "#F1C422");
        });          
     
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
                url: "getDatalast.php?id="+stid,             
                dataType: "html",   //expect html to be returned                
                success: function(response){                    
                    $("#output").html(response); 
                    //alert(response);
                 //   $("#table").freezeHeader({ 'offset': '80px' });
                 $("table").stickyTableHeaders();
                }
            });
        }
        
        //to detect the change of the table
        $('#output').on('change', '.prevDueMoney, .prevDueJar,.jarGiven,.jarReceived,.paymentToday,.comment', function(event) {            
            var className = $(this).attr("class");//get the class name from the changed element
            var value = $(this).val();
            var userID = $(this).closest('tr').find('td:eq(0)').text();  //get the id of the current row
            className = className.split(" ").splice(-1).toString(); //to get the last part of the class name
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
                retriveData(); 
            });    
        }

 </script>
</body>
</html>