<nav class="navbar navbar-expand-lg navbar-dark bg-dark  fixed-top" id="navigationbar" style="border-radius: 0px;">
    <div class="container" id="nav-container">
        <a class="navbar-brand" id="nav-item-name" href="home.php">
            <h2>PURERA</h2>        
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php" id="nav-item-name">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="nav-item-name" href="" data-toggle="dropdown">Staff</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" id="drowdownMenu">
                        <?php
                            include_once 'master_db.php';
                            $db = new DB();
                            $result = $db->getAllStaff();
                            if($result->num_rows >0){
                                while($raw = $result->fetch_assoc()){
                                    $id = $raw['staffID'];
                                    $name = $raw['staffName']; ?>
                                    <li role="presentation">
                                        <a role="menuitem" href="staff.php?id=<?php echo $id; ?>">
                                            <i class="fas fa-user"></i>
                                            &nbsp; <?php echo $name;?>
                                        </a>
                                    </li><?php
                                }
                            }
                            else{?>
                                <li role="presentation">
                                    <a role="menuitem">No added staff</a>
                                </li><?php
                            }
                        ?>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="nav-item-name" href="" data-toggle="dropdown">Add</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" id="drowdownMenu">
                        <li role="presentation">
                            <a role="menuitem" href="staffadding.php"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp; Staff</a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" href="customeradding.php"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp; Customers</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="nav-item-name" href="" data-toggle="dropdown">Details</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" id="drowdownMenu">
                        <li role="presentation">
                            <a role="menuitem" href="staffdetails.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Staff</a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" href="customerdetails.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Customers</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="nav-item-name" href="" data-toggle="dropdown">Edit</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" id="drowdownMenu">
                        <li role="presentation">
                            <a role="menuitem" href="editstaff.php"><i class="fa fa-user" aria-hidden="true"></i>
                                &nbsp; Edit Staff</a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" href="editcustomer.php">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                &nbsp; Edit Customer
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="nav-item-name" href="" data-toggle="dropdown">Account</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" id="drowdownMenu">
                        <li role="presentation">
                            <a role="menuitem" href="editprofile.php"><img src="icon/changepass.png" style="width:16px; height:16px;"></img>
                                &nbsp; Edit Profile</a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" href="logout.php">
                                <img src="icon/logout.png" style="width:20px; height:20px;"></img>
                                &nbsp; Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>