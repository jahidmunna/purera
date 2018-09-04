<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Today's details</title>
    <?php include_once 'navbarresource.php'; ?>
    <link rel="stylesheet" href="css/style-body.css">
    <link rel="stylesheet" href="css/style-staff-old.css">
</head>
<body id="body">
<!-- Navigation Bar -->
<?php include 'navigationbar.php'; ?>
<section class="py-5" style="margin-top:20px;">
        <div class="container" id="container">
            <div class="row" id="pageheader">
                <div class="col-sm-2 col-form-label">Date: 25/05/2018</div>
                <div class="col-sm-7 col-form-label">Name: Munna</div>                
                <a class="btn col-sm-1 col-form-label">Edit</a>
                <a class="btn col-sm-1 col-form-label">Save</a>                
                <a class="btn col-sm-1 col-form-label">Print</a>                                
            </div>
            <div class="row" id="tableHeader" >
                <div class="col-sm-1 col-form-label align-middle">Customer ID</div>
                <div class="col-sm-2 col-form-label align-middle">Previous Due Money</div>
                <div class="col-sm-1 col-form-label align-middle">Previous Due Jar</div>
                <div class="col-sm-1 col-form-label align-middle">Jar Given</div>
                <div class="col-sm-1 col-form-label align-middle">Jar Received</div>
                <div class="col-sm-1 col-form-label align-middle">Jar Due</div>                        
                <div class="col-sm-1 col-form-label align-middle">Total taka</div>
                <div class="col-sm-1 col-form-label align-middle">Payment Today</div>
                <div class="col-sm-1 col-form-label align-middle">Due Money</div>
                <div class="col-sm-2 col-form-label align-middle">Comment</div>                        
            </div>
            <div id="tableContent">
                <div class="row odd" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row odd" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row odd" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row odd" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>


                <div class="row odd" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row odd" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row odd" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row odd" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row odd" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row odd" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row odd" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row odd" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row odd" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">101</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>

                <div class="row odd" id="tablerow" >
                    <div class="col-sm-1 col-form-label align-middle">201</div>
                    <div class="col-sm-2 col-form-label align-middle">520tk</div>
                    <div class="col-sm-1 col-form-label align-middle">10</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarGiven" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="jarReceived" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20</div>                        
                    <div class="col-sm-1 col-form-label align-middle">220tk</div>
                    <div class="col-sm-1 col-form-label align-middle"><input name="paymentToday" type="number" class="form-control col-form-label-sm"></div>
                    <div class="col-sm-1 col-form-label align-middle">20tk</div>
                    <div class="col-sm-2 col-form-label align-middle"><input name="comment" type="text" class="form-control col-form-label-sm"></div>                        
                </div>
            </div>    

        </div>
</section>
</body>
</html>