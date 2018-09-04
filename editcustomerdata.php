<?php
	include_once 'logincheck.php';
?>
<?php
    if (isset($_GET['id'])) {
        include_once 'master_db.php';    
        $cid = $_GET['id'];
        $db = new DB();
        $customerDetails = $db->getCustomerDetails($cid);
        $cname = $customerDetails['customerName'];
        $rate = $customerDetails['customerRate'];
        $staffNumber = $customerDetails['customerCorrospondingStaff'];
        $staffDetails = $db->getstaffdetailsByID($staffNumber);
        $staffName = $staffDetails['staffName'];
        $phone = $customerDetails['customerPhone'];                    
        $address = $customerDetails['customerAddress'];
        $email = $customerDetails['customerEmail'];
    }
    else {
        header("location: home.php");
    }
    if(isset($_POST['submitbtn'])){
        $customerphone = $customeremail = $customeraddress = "";
        $customerid = $cid;
        $customerrate = $_POST['cRate'];
        $customername = $_POST['cName'];
        $customerstaffnumber = $_POST['cStaff'];
        $customerphone = $_POST['cPhone'];
        $customeraddress = $_POST['cAddress'];
        $customeremail = $_POST['cEmail'];
        $db = new DB();
        $res = $db->customerUpdateInfoById($customerid,$customerrate,$customername,$customerstaffnumber,$customerphone,$customeremail,$customeraddress);
        if($res === true){ //insert successful
            header("location: editcustomer.php");
        }
        else{ 
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer Registration</title>
    <?php include_once 'navbarresource.php'; ?>
    <link rel="stylesheet" href="css/style-body.css">
</head>

<body id="body">
    <?php include 'navigationbar.php'; ?>
    <section class="py-5" style="margin-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-1 col-form-label"></div>                
				<div class="col-sm-7">
                    <h5>Edit Customer Information</h5>                    
	            </div>
            </div>
            
            <form method = "POST">
                <div class="form-group row">
                    <label for="inputID" class="col-sm-1 col-form-label-sm">ID<span style="color:red;">*</span></label>
                    <div class="col-sm-4">
                        <input disabled name="cID" type="number" class="form-control col-form-label-sm" id="inputID" placeholder="id (required)" required value="<?php echo $cid; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputRate" class="col-sm-1 col-form-label-sm">Rate<span style="color:red;">*</span></label>
                    <div class="col-sm-4">
                        <input name="cRate" type="number" class="form-control col-form-label-sm" id="inputRate" placeholder="rate (required)" required value="<?php echo $rate; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-1 col-form-label-sm">Name<span style="color:red;">*</span></label>
                    <div class="col-sm-4">
                        <input name="cName" type="text" class="form-control col-form-label-sm" id="inputName" placeholder="name (required)"required value="<?php echo $cname; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputStaff" class="col-sm-1 col-form-label-sm">Staff<span style="color:red;">*</span></label>
                    <div class="col-sm-4">
                        <select  required name="cStaff" class="custom-select col-form-label-sm" value="" id="inlineFormCustomSelect" >
                            <option  value="">select staff...</option>
                            <?php
                                $result = $db->getAllStaff();
                                if($result->num_rows >0){
                                    while($raw = $result->fetch_assoc()){
                                        $sid = $raw['staffID'];
                                        $sname = $raw['staffName'];
                                        if ($sid == $staffNumber) {?>
                                           <option selected value="<?php echo $sid; ?>"><?php echo $sname; ?></option> <?php
                                        } else { ?>
                                           <option value="<?php echo $sid; ?>"><?php echo $sname; ?></option> <?php
                                        } 
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPhone"  class="col-sm-1 col-form-label-sm">Phone</label>
                    <div class="col-sm-4">
                        <input name="cPhone" pattern="^([+]8{2})?01(1|8|9|5|6|7)[0-9]{8}$" type="number" class="form-control col-form-label-sm" id="inputPhone" placeholder="phone (optional)" value="<?php echo $phone; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputAddress" class="col-sm-1 col-form-label-sm">Address</label>
                    <div class="col-sm-4">
                        <input name="cAddress" type="text" class="form-control col-form-label-sm" id="inputAddress" placeholder="address (optional)" value="<?php echo $address; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-1 col-form-label-sm">Email</label>
                    <div class="col-sm-4">
                        <input name="cEmail" type="email" class="form-control col-form-label-sm" id="inputEmail" placeholder="email (optional)" value="<?php echo $email; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-1 col-form-label"></div>
                    <div class="col-sm-7">
                        <button name="submitbtn" type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>