<?php
	include_once 'logincheck.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Staff Details</title>
    <?php include_once 'navbarresource.php'; ?>
    <?php include_once 'datepickerresource.php'; ?>
    <link rel="stylesheet" href="css/style-body.css">
</head>
<body id="body">
    <?php include 'navigationbar.php'; ?>
    <section class="py-5" style="margin-top:60px;">
        <div class="container">
            <div class="row">
				<div class="col-sm-3" align="left">
                    <h6>Find Staff Details</h6>                    
	            </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 my-1">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Name</div>
                        </div>
                        <select  id="sID"  required name="sID" class="custom-select col-form-label-md" value="-1">
                            <option disabled selected value="-1">select staff...</option>
                            <?php
                                include_once 'master_db.php';
                                $db = new DB();
                                $result = $db->getAllStaff();
                                if($result->num_rows >0){
                                    while($raw = $result->fetch_assoc()){
                                        $sid = $raw['staffID'];
                                        $sname = $raw['staffName']; ?>
                                        <option value="<?php echo $sid; ?>"><?php echo $sname; ?></option> <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3 my-1" id="typeOfDetails" style="display:none;">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Type</div>
                        </div>
                        <select  id="detailsType"  required name="detailsType" class="custom-select col-form-label-md" value="-1">
                            <option disabled selected value="-1">select type...</option>
                            <option value="1">Yearly</option>
                            <option value="2">Monthly</option>
                            <option value="3">Daily</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3" id="typeOfDate" style="display:none;">
                    <div class="input-group date" data-provide="fulldate" >
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="dateType" >Date:</div>
                        </div>
                        <input class="fulldate form-control" id="date" type="text" placeholder ="select date" >
                    </div>
                </div>
                
                <div class="col-sm-3" id="find" style="display:none;">
                    <button id="findBtn" name="submfindBtn" type="submit" class="btn btn-primary">Find</button>
                </div>
            </div>
            <div class="form-group row" style="margin-top: 50px; display:none;" id="outputdiv">
                <div class="col-sm-6 my-1">
                    <div align="center" style='color:#239B56; font-size: 22px;' id="sName">Staff Name: Rahim</div>
                </div>
                <div class="col-sm-6">
                    <div align="center" style='color:#239B56; font-size: 22px;' id="detailsDate">Date: 20/05/2018</div>
                </div>
                <div class="col-sm-12 my-1" align="center" id="output"></div>
            </div>
        </div>
    </section>
    
    <script>
        var typeOfDetails = -1;
        var staffName = "";
        $('#sID').on('change', function() {
            var staffid = this.value;
            staffName = $('#sID option:selected').text();

            if(staffid != -1){
                $('#typeOfDetails').show();
            }
            else {
                $('#typeOfDetails').hide();
            }
        })

        $('#detailsType').on('change', function() {
            var type = parseInt(this.value);
            typeOfDetails = type;
            //console.log(typeOfDetails);
            
            if(type != -1){
                $('#typeOfDate').show();
                $('.fulldate').datepicker('setDate', null);
                $('.fulldate').datepicker('remove');
                switch (type) {
                    case 1:
                        $('#dateType').text("Year: ");
                        $('.fulldate').datepicker({
                            format: "yyyy",
                            startView: "years",
                            minViewMode: "years",
                            autoclose: true
                        });
                        break;
                    case 2:
                        $('#dateType').text("Month & Year: ");
                        $('.fulldate').datepicker({
                            format: "yyyy-mm",
                            startView: "months", 
                            minViewMode: "months",
                            autoclose: true
                        });
                        break;
                    case 3:
                        $('#dateType').text ("date: ");
                        $('.fulldate').datepicker({
                            format: "yyyy-mm-dd",
                            startDate: '-10y',
                            autoclose: true
                        });
                        break;                                                                                  
                    default:
                        break;  
                }
            }
            else {
                $('#typeOfDate').hide();

            }
        })

        $('#date').on('change', function() {
            var type = this.value;
            if(type != ""){
                var day = $('.fulldate').datepicker('getDate').getDate();  
                $('#getDate').text(day);
                var month = $('.fulldate').datepicker('getDate').getMonth()+1; // +1 as it starts from 0
                $('#getMonth').text(month);  
                var year = $('.fulldate').datepicker('getDate').getFullYear();
                $('#getYear').text(year); 
                $('#getValue').text(type);
                $('#find').show();
            }
            else 
                $('#find').hide();
            
        })

        function outputDevStyleAndNaming(day,month,year) {
            const monthNames = ["zero","January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            $('#sName').text("Staff Name: "+staffName); 
            switch (typeOfDetails) {
                case 1:
                    $('#detailsDate').text("Year: "+year);                
                    break;
                case 2:
                    $('#detailsDate').text("Month: "+monthNames[month]+" ("+year+")"); 
                    break;
                case 3:
                    $('#detailsDate').text("Date: "+day+" "+monthNames[month]+" "+year);
                    break;
            
            }

            
        }
        $('#findBtn').on('click',function(e){
            e.preventDefault();
            var sid = $('#sID').val();
            sid = parseInt(sid);
            //console.log("working on click!");
            //console.log("id: "+sid);
            //console.log("type: "+typeOfDetails);
            var day = $('.fulldate').datepicker('getDate').getDate();  
            var month = $('.fulldate').datepicker('getDate').getMonth()+1; // +1 as it starts from 0
            var year = $('.fulldate').datepicker('getDate').getFullYear();
            if (sid != -1) {
                outputDevStyleAndNaming(day,month,year)
                retriveDetails(sid,day,month,year);          
            }
            
        });

        //to update data
        function retriveDetails(sid,day,month,year){
            var request = $.ajax({
                url: "getstaffdetails.php",
                method: "POST",
                data: { 
                    id: sid,
                    type: typeOfDetails,
                    day: day,
                    month: month,
                    year: year
                 },
                dataType: "html"
            });
            request.done(function(data) {
                $('#outputdiv').show();
                $("#output").html(data); 
            });    
        }
    </script>
</body>
</html>