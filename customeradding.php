<?php
	include_once 'logincheck.php';
?>
<?php
    if(isset($_POST['submitbtn'])){
        $phone = $email = $address = "";
        $id = $_POST['cID'];
        $rate = $_POST['cRate'];
        $name = $_POST['cName'];
        $staffnumber = $_POST['cStaff'];
        $phone = $_POST['cPhone'];
        $address = $_POST['cAddress'];
        $email = $_POST['cEmail'];
        include_once 'master_db.php';
        $db = new DB();
        $res = $db->customerAdding($id,$rate,$name,$staffnumber,$phone,$email,$address);
        if($res === true){ //insert successful
            header("location:addedfeedback.php?id=2");
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
                    <h5>CUSTOMER REGISTRATION</h5>                    
	            </div>
            </div>
            
            <form method = "POST">
                <div class="form-group row">
                    <label for="inputID" class="col-sm-1 col-form-label-sm">ID<span style="color:red;">*</span></label>
                    <div class="col-sm-4">
                        <input name="cID" type="number" class="form-control col-form-label-sm" id="inputID" placeholder="id (required)" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputRate" class="col-sm-1 col-form-label-sm">Rate<span style="color:red;">*</span></label>
                    <div class="col-sm-4">
                        <input name="cRate" type="number" class="form-control col-form-label-sm" id="inputRate" placeholder="rate (required)" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-1 col-form-label-sm">Name<span style="color:red;">*</span></label>
                    <div class="col-sm-4">
                        <input name="cName" type="text" class="form-control col-form-label-sm" id="inputName" placeholder="name (required)"required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputStaff" class="col-sm-1 col-form-label-sm">Staff<span style="color:red;">*</span></label>
                    <div class="col-sm-4">
                        <select  required name="cStaff" class="custom-select col-form-label-sm" value="" id="inlineFormCustomSelect" >
                            <option disabled selected value="">select staff...</option>
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
                <div class="form-group row">
                    <label for="inputPhone"  class="col-sm-1 col-form-label-sm">Phone</label>
                    <div class="col-sm-4">
                        <input name="cPhone" pattern="^([+]8{2})?01(1|8|9|5|6|7)[0-9]{8}$" type="number" class="form-control col-form-label-sm" id="inputPhone" placeholder="phone (optional)">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputAddress" class="col-sm-1 col-form-label-sm">Address</label>
                    <div class="col-sm-4">
                        <input name="cAddress" type="text" class="form-control col-form-label-sm" id="inputAddress" placeholder="address (optional)">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-1 col-form-label-sm">Email</label>
                    <div class="col-sm-4">
                        <input name="cEmail" type="email" class="form-control col-form-label-sm" id="inputEmail" placeholder="email (optional)">
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