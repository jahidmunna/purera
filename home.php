<?php
	include_once 'logincheck.php';
?>
<?php
	function getData($type){
		if (!($type == 1 || $type == 2 )) {
			return;
		}
	
		include_once 'master_db.php';
		$db = new DB();
		//var_dump($type);

		date_default_timezone_set('Asia/Dhaka');
        $day =  date('d');
        $month =  date('m');
		$year =  date('Y');
		$dateFormat;
		$res = $db->getAllStaffdetailsTransaction($type,$day,$month,$year);
		
		if ($type == 1) { 
			$dateFormat =  "This Month (".date('F, Y').")";
		}
		else if ($type == 2) { 
			$today = date('d/m/Y');
			$dateFormat = "Today (".$today.")";
		}
		$output="initial data ";
		if($res->num_rows >0){
			$output = "
			<table style= 'width:70%;'>
				<div style='color:#239B56; font-size: 25px; margin-bottom: 20px;'>".$dateFormat."</div>";
			while($row = $res->fetch_assoc()){
				$JarGiven = checkEmpty($row['jarGiven']);
				$JarCollected = checkEmpty($row['jarCollect']);
				$JarDue = checkEmpty($row['jarDue']);
				$TotalMoney = checkEmpty($row['totalMoney']);
				$CollectedMoney = checkEmpty($row['collectMoney']);
				$MoneyDue = checkEmpty($row['moneyDue']);
				/*
				if (!isset($JarGiven)) {
					$output .= "<tr>
									<td colspan='3'>NO DATA FOUND!</td>
								</tr>";
					 break;
				}
				*/
				$output .= "
						<tr>
							<td><strong>Total Water Given</strong></td>
							<td><strong>:</strong></td>
							<td>".$JarGiven."</td>                            
						</tr>
						<tr>
							<td><strong>Total Taka</strong></td>
							<td><strong>:</strong></td>
							<td>".$TotalMoney." tk</td>                            
						</tr>
						<tr>
							<td><strong>Taka Collection</strong></td>
							<td><strong>:</strong></td>
							<td>".$CollectedMoney." tk</td>                            
						</tr>
						<tr>
							<td><strong>Total Taka Due</strong></td>
							<td><strong>:</strong></td>
							<td>".$MoneyDue." tk</td>                            
						</tr>";
			}
			
			$output .= "</table>";
	
		}
		else {
			$output = "No data found! ";
		}
	
		echo $output;
	}

	function checkEmpty($data){
        if (empty($data)) {
            $data = 0;
        }

        return $data;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <?php include_once 'navbarresource.php'; ?>
	<link rel="stylesheet" href="css/style-body.css">
	<link rel="stylesheet" href="css/style-home.css">
</head>
<body id="body">
    <?php include 'navigationbar.php'; ?>
    <section class="py-5">
		<div class="container">
			<div class="row py-4">
				<div class="col-sm-5" id ="daily">
					<?php getData(2); ?>
				</div>
				<div class="col-sm-2" align="center" ></div>
				<div class="col-sm-5" id ="monthly">
					<?php getData(1); ?> 	 					
	            </div>
			</div>
		</div>
	</section>
</body>
</html>