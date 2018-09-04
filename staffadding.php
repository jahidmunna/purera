<?php
	include_once 'logincheck.php';
?>
<?php
    if(isset($_POST['submitbtn'])){
        $name = $_POST['sName'];
        $phone = $_POST['sPhone'];
        $address = $_POST['sAddress'];
        $email = $_POST['sEmail'];
        include_once 'master_db.php';
        $db = new DB();
        $res = $db->staffAdding($name,$phone,$email,$address);
        if($res === true){ //insert successful
            header("location:addedfeedback.php?id=1");
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
                    <h5>STAFF REGISTRATION</h5>                    
	            </div>
            </div>
            
            <form method="POST">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-1 col-form-label-sm">Name<span style="color:red;">*</span></label>
                    <div class="col-sm-4">
                        <input name="sName" type="text" class="form-control col-form-label-sm" id="inputName" placeholder="name (required)" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPhone" class="col-sm-1 col-form-label-sm">Phone<span style="color:red;">*</span></label>
                    <div class="col-sm-4">
                        <input name="sPhone"  type="number" minlength="11" required  pattern="^([+]8{2})?01(1|8|9|5|6|7)[0-9]{8}$" class="form-control col-form-label-sm" id="inputPhone" placeholder="phone (required)" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputAddress" class="col-sm-1 col-form-label-sm">Address</label>
                    <div class="col-sm-4">
                        <input name="sAddress" type="text" class="form-control col-form-label-sm" id="inputAddress" placeholder="address (optional)">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-1 col-form-label-sm">Email</label>
                    <div class="col-sm-4">
                        <input name="sEmail" type="email" class="form-control col-form-label-sm" id="inputEmail" placeholder="email (optional)">
                    </div>
                </div>
                <div class="form-group row">
                        <div class="col-sm-1 col-form-label"></div>
                    <div class="col-sm-7">
                        <button name="submitbtn" type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>