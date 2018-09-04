<?php
	include_once 'logincheck.php';
?>
<?php
    $error = "";
    if (isset($_POST['submitbtn'])) {
        $user = "admin";
        $pass = validate($_POST['sCurrentPassWord']);
        $pass = sha1($pass); //to match with the encrypted password from database;
        $newPass = validate($_POST['sNewPassWord']); 
        $confirmPass =  validate($_POST['sConfirmPassword']);

        if ($newPass != $confirmPass) {
            $error = "New Password and Confirm Password Doesn't Match";
        }
        else{
			include_once 'master_db.php';
			$db = new DB();
			$res = $db->loginManager($user,$pass);
			if($res === true){ //login successful
                $newPass = sha1($GLOBALS['newPass']);
                $res2 = $db->updateManagerPass($newPass);
                if ($res2 == true) {
                    header("location: successfull.php");
                }
			}
			else{
				$error = "password is incorrect!"; 
			}

        }
    }
    function validate($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);

		return $data;
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once 'navbarresource.php'; ?>
    <link rel="stylesheet" href="css/style-body.css">
</head> 
<body id="body">
    <?php include 'navigationbar.php'; ?>
    <section class="py-5" style="margin-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-form-label"></div>                
				<div class="col-sm-7" align="left">
                    <h5>CHANGE PASSWORD</h5>                    
	            </div>
            </div>
            <form method="POST">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label-sm">Current Password<span style="color:red;">*</span></label>
                    <div class="col-sm-3">
                        <input name="sCurrentPassWord" type="password" class="form-control col-form-label-sm" id="inputCurrentPassword" placeholder="current password (required)" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label-sm">New Password<span style="color:red;">*</span></label>
                    <div class="col-sm-3">
                        <input name="sNewPassWord" type="password" class="form-control col-form-label-sm" id="sNewPassWord" placeholder="new password (required)" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label-sm">Confirm Password<span style="color:red;">*</span></label>
                    <div class="col-sm-3">
                        <input name="sConfirmPassword" type="password" class="form-control col-form-label-sm" id="sConfirmPassword" placeholder="confirm password (required)" required>
                    </div>
                </div> <?php
                    if (!empty($error)) { ?>
                        <div class="form-group row">
                            <div class="col-sm-2 col-form-label"></div>
                            <div class="col-sm-7" style="color: red;" ><strong><?php echo $error;?></strong></div>
                        </div> <?php
                    } 
                ?>
                <div class="form-group row">
                    <div class="col-sm-2 col-form-label"></div>
                    <div class="col-sm-7">
                        <button name="submitbtn" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                
            </form>
        </div>
    </section>
</body>
</html>