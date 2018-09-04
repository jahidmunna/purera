<?php
	include_once 'logincheck.php';
?>
<?php
    if (isset($_GET['id'])) {
        include_once 'master_db.php';    
        $sid = $_GET['id'];
        $db = new DB();
        $staffDetails = $db->getstaffdetailsByID($sid);
        $staffname = $staffDetails['staffName'];
        $phone = $staffDetails['staffPhone'];                    
        $address = $staffDetails['staffAddress'];
        $email = $staffDetails['staffEmail'];
    }
    else {
        header("location: home.php");
    }

    if(isset($_POST['submitbtn'])){
        $sname = $_POST['sName'];
        $sphone = $_POST['sPhone'];
        $saddress = $_POST['sAddress'];
        $semail = $_POST['sEmail'];
        include_once 'master_db.php';
        $db = new DB();
        var_dump($sid);
        $res = $db->staffUpdateInfoByID($sid,$sname,$sphone,$semail,$saddress);
        if($res === true){ //insert successful
            header("location: editstaff.php");
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
    <title>Staff Registration</title>
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
                    <h5>Edit Staff Information</h5>                    
	            </div>
            </div>
            
            <form method="POST">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-1 col-form-label-sm">Name<span style="color:red;">*</span></label>
                    <div class="col-sm-4">
                        <input name="sName" type="text" class="form-control col-form-label-sm" id="inputName" placeholder="name (required)" required value="<?php echo $staffname; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPhone" class="col-sm-1 col-form-label-sm">Phone<span style="color:red;">*</span></label>
                    <div class="col-sm-4">
                        <input name="sPhone"  type="number" minlength="11" required  pattern="^([+]8{2})?01(1|8|9|5|6|7)[0-9]{8}$" class="form-control col-form-label-sm" id="inputPhone" placeholder="phone (required)" value="<?php echo $phone; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputAddress" class="col-sm-1 col-form-label-sm">Address</label>
                    <div class="col-sm-4">
                        <input name="sAddress" type="text" class="form-control col-form-label-sm" id="inputAddress" placeholder="address (optional)" value="<?php echo $address; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-1 col-form-label-sm">Email</label>
                    <div class="col-sm-4">
                        <input name="sEmail" type="email" class="form-control col-form-label-sm" id="inputEmail" placeholder="email (optional)" value="<?php echo $email; ?>">
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