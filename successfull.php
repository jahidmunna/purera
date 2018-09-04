<?php
	include_once 'logincheck.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Succfully Changed</title>
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
                <div class="isa_success" style ="min-height: 140px;">
                        <i class="fa fa-check"></i>
                    Password is changed!
                </div>
            </div>
        </div>
    </div>	
</section>
</body>
</html>