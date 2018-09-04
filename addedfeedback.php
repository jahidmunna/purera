<?php
	include_once 'logincheck.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>feedback</title>
    <?php include_once 'navbarresource.php'; ?>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style-feedback.css">
    <link rel="stylesheet" href="css/style-body.css">	    
</head>
<body id="body">
<!-- Navigation Bar -->
<?php include 'navigationbar.php'; ?>
<!-- Page Content -->
	<section class="py-5" style="margin-top:100px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12" align="center">
	                <div class="isa_success">
					     <i class="fa fa-check"></i>
					    Successfully Added!
					     <p style="font-size: 15px;">To add more please go back to the previous page.</p>
					</div>
	            </div>
			</div>
		</div>	
	</section>

	<section class="py-5">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3 col-xs-3" align="center"></div>
				<div class="col-md-3 col-sm-3 col-xs-3" align="left">
					<?php
						$id = $_GET['id'];
						$addmorePage = "";
						if($id==1){
							$addmorePage = "staffadding.php";
						}
						else{
							$addmorePage = "customeradding.php";
						} ?>
						<a class="btn option" href="<?php echo $addmorePage; ?>">BACK</a><?php
					?>
					  
	            </div>
				<div class="col-md-3 col-sm-3 col-xs-3" align="left">
					  <a class="btn option" href="home.php">HOME</a>
	            </div>
				<div class="col-md-3 col-sm-3 col-xs-3" align="center"></div>

			</div>
		</div>	
	</section>
</body>
</html>