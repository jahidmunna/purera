<?php
	include_once 'logincheck.php';
?>
<?php
    function getData(){
        include_once 'master_db.php';    
        $db = new DB();
        $res = $db->getAllCustomers();
        if($res->num_rows >0){
            while($row = $res->fetch_assoc()){
                $cid = $row['customerID'];
                $rate = $row['customerRate'];
                $name = $row['customerName'];
                $staffNumber = $row['customerCorrospondingStaff'];
                $staffDetails = $db->getstaffdetailsByID($staffNumber);
                $staffName = $staffDetails['staffName'];
                $phone = checkEmpty($row['customerPhone']);                    
                $address = checkEmpty($row['customerAddress']);
                $email = checkEmpty($row['customerEmail']); ?>
                <tr>
                    <td><?php echo $cid; ?></td>
                    <td><?php echo $rate; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $staffName; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $address; ?></td>
                    <td><?php echo $email; ?></td>
                    <td id="option"><a href="editcustomerdata.php?id=<?php echo $cid; ?>"> <img id="icon" src="icon/edit.png"></a></td>
                </tr> <?php
            }
        }
        else{ ?>
            <tr>
                <td colspan = "8">NO DATA FOUND</td>
            </tr><?php
        }

    }

    function checkEmpty($data){
        if (empty($data)) {
            $data = "NOT GIVEN";
        }

        return $data;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Edit</title>
    <link rel="stylesheet" href="css/style-body.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <?php include_once 'navbarresource.php'; ?>
    <style>
        #option{
			color: #16A085;
		}
		a{
			text-decoration: none;
		}
		#icon{
			height: 20px; 
			width: 20px;
        }
        table{
            font-size: 15px;
        }
        
    </style>
</head>
<body id="body">
    <?php include 'navigationbar.php'; ?>
    <section class="py-5">
        <div class="container">

        </div>
    </section>
    <table class= 'table table-striped' style= 'text-align: center;'>
        <center><div style='color:#239B56; font-size: 25px; margin-bottom: 20px;'>CUSTOMER INFORMATION</div></center>
        <thead>
            <tr>
                <th>ID</th>
                <th>Rate</th>
                <th>Name</th>
                <th>Corrosponding Staff</th>
                <th>Phone</th>    
                <th>Address</th>
                <th>Email</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php getData(); ?>
        </tbody>
    </table>
</body>
</html>