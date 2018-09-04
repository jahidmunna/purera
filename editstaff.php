<?php
	include_once 'logincheck.php';
?>
<?php
    function getData(){
        include_once 'master_db.php';    
        $db = new DB();
        $res = $db->getAllStaff();
        if($res->num_rows >0){
            while($row = $res->fetch_assoc()){
                $sid = $row['staffID'];
                $name = $row['staffName'];
                $phone = checkEmpty($row['staffPhone']);                    
                $address = checkEmpty($row['staffAddress']);
                $email = checkEmpty($row['staffEmail']); ?>
                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $address; ?></td>
                    <td><?php echo $email; ?></td>
                    <td id="option"><a href="editstaffdata.php?id=<?php echo $sid; ?>"> <img id="icon" src="icon/edit.png"></a></td>
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
        <center><div style='color:#239B56; font-size: 25px; margin-bottom: 20px;'>STAFF INFORMATION</div></center>
        <thead>
            <tr>
                <th>Name</th>
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