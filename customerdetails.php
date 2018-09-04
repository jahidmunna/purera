<?php
	include_once 'logincheck.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer Details</title>
    <?php include_once 'navbarresource.php'; ?>
    <link rel="stylesheet" href="css/style-body.css">
    <link rel="stylesheet" href="css/style-customerdetails.css">
    <script src="js/bootstrap3-typeahead.min.js"></script>
</head>
<body id="body">
    <?php include 'navigationbar.php'; ?>
    <section class="py-5" style="margin-top:50px;">
        <div class="container">
            <div class="row">
				<div class="col-sm-3" align="left">
                    <h6>Find Customer Details</h6>                    
	            </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="inlineFormInputGroupUserID">ID</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">ID</div>
                        </div>
                        <input name="uid" type="number" class="typeahead form-control" data-provide="typeahead"  id="inlineFormInputGroupUserID" autocomplete="off" placeholder="user id" required>
                    </div>
                </div>
                <div class="col-sm-1">
                    <button id="submitbtn" name="submitbtn" type="submit" class="btn btn-primary">Find</button>
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="row">
                <div class="col-sm-6 my-1">
                    <div id="output"></div>
                </div>
                <div class="col-sm-6" id="output2"></div>
            </div>

            
        </div>

       
    </section>
    

    <script>
        $(document).ready(function(){
            //to show the customer id suggestions
            $('#inlineFormInputGroupUserID').typeahead({
                source: function(query, result){
                    $.ajax({
                        url:"fetchuserid.php",
                        method:"POST",
                        data:{query:query},
                        dataType:"json",
                        success:function(data){
                            result($.map(data, function(item){
                                return item;
                            }));
                        }
                    })
                }
            });        
        });
        //to detech whether user id name typing is done and enter button is pressed 
         $('#inlineFormInputGroupUserID').keydown(function (e){
            if(e.keyCode == 13){  // (e.keyCode == 13) is enter key
                if($(this).val() !="")
                    $('#submitbtn').click(); //this indirectly click the submitbtn button
            }
        })
        
        var validUserID;
        //if submit button is pressed data will be inserted in the database
        $('#submitbtn').on('click',function(e){
            e.preventDefault();
            var uid = $('#inlineFormInputGroupUserID').val();
           // console.log(uid);
            
            if (uid != "") {
                validUserID = uid;
                retriveDetails (uid); //function for inserting data in the db            
            }
         //   console.log('working');
            
        });

        function retriveDetails(uid){
           // console.log(stid);
            $.ajax({    //create an ajax request to getData.php
                url: "getuserdetails.php?id="+uid,             
                dataType: "html",   //expect html to be returned                
                success: function(response){                    
                    $("#output").html(response); 
                    $("#output").show();
                    $("#output2").hide();
                 //   alert(response);
                }
            });
        }
        
        function showHistory(){
            var uid = validUserID;
            $.ajax({    //create an ajax request to getData.php
                url: "getuserorderhistory.php?id="+uid,             
                dataType: "html",   //expect html to be returned                
                success: function(response){                    
                    $("#output2").html(response); 
                    $("#output2").show();
                 //   alert(response);
                }
            });
            
        }

    </script>

    
</body>
</html>