<?php	
	class DB{
        private $con;
		public function __construct(){
            $servername = "localhost";
            $username = "purerawa_adminMunna";
            $password = "jimunna1500"; 
            $databasename = "purerawa_puraraDB";
			$this->con = mysqli_connect($servername,$username,$password,$databasename);
            if($this->con===false){
                die("connect failed ");
            }
            else{
               // echo"connected";
            }
        }

        public function validate($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
    
            return $data;
        }
        
        public function loginManager($user,$pass){
            /* for Security */
            $user = $this->validate($user);
            $pass = $this->validate($pass);
            //to prevent sql injection
            $sql = "SELECT * FROM managerTable WHERE managerName = ? AND managerPassword = ? ";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("ss", $user, $pass); //double s means two parameter 
			// set parameters and execute
			$stmt->execute();
            $stmt->store_result();
            $rows = $stmt->num_rows;
            if($rows == 1){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function updateManagerPass($pass){
            /* for Security */
            //to prevent sql injection
            $sql = "UPDATE managerTable 
                    SET managerPassword = ? WHERE managerName = 'admin'";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("s",$pass); //double s means two parameter 
			// set parameters and execute
			$stmt->execute();
            $stmt->store_result();
            if($stmt->store_result()){
                return true;
            }
            else{
                return false;
            }
        }

        public function staffAdding($name,$phone,$email,$address){
            /* for Security */
            $name = $this->validate($name);
            $phone = $this->validate($phone);
            $email = $this->validate($email);
            $address = $this->validate($address);
            
            $sql = "INSERT INTO staffTable (staffName, staffPhone, staffAddress, staffEmail) 
                    VALUES (?,?,?,?) ";   
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("ssss", $name, $phone,$address,$email); 
			// set parameters and execute
			$stmt->execute();
            if($stmt->store_result()){
                return true;
            }
            else{
                return false;
            }
        }
        public function staffUpdateInfoByID($sid,$sname,$sphone,$semail,$saddress){
            $id = $this->validate($sid);
            $name = $this->validate($sname);
            $phone = $this->validate($sphone);
            $email = $this->validate($semail);
            $address = $this->validate($saddress);
            $sql = "UPDATE staffTable
                    SET staffName = ?, staffPhone = ?, staffAddress = ?, staffEmail = ?
                    WHERE staffID =  ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("sssss", $name, $phone,$address,$email,$id); 
			// set parameters and execute
			$stmt->execute();
            if($stmt->store_result()){
                return true;
            }
            else{
                return false;
            }

        }

        public function getAllStaff(){
            $sql = "SELECT * FROM staffTable ORDER BY staffID";
            $res = mysqli_query($this->con,$sql);
            return $res;
        }
        

        public function getstaffdetailsByID($id){
            /* for Security */
            $id = (int) $this->validate($id);
            $sql = "SELECT * FROM staffTable WHERE staffID = ? ";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("s", $id);  
			// set parameters and execute
			$stmt->execute();
            $res = $stmt->get_result();
            if($res->num_rows >0){
                while($raw = $res->fetch_assoc()){
                    $sName = $raw['staffName'];
                    $sPhone = $raw['staffPhone'];
                    $sAddress = $raw['staffAddress'];
                    $sEmail = $raw['staffEmail'];                    
                    return array(
                            'staffID' =>$id,
                            'staffName' =>$sName,
                            'staffPhone' =>$sPhone,
                            'staffAddress' =>$sAddress,
                            'staffEmail' =>$sEmail 
                        );
                }
            }
            else {
                return array(
                            'staffID' => -1,                    
                            'staffName' =>"no staff found!",
                            'staffPhone' =>"no staff found!",
                            'staffAddress' =>"no staff found!",
                            'staffEmail' =>"no staff found!" 
                        );
            }
        }

        public function getstaffdetailsTransaction($id,$type,$day,$month,$year){
            $id = $this->validate($id);
            $type = $this->validate($type);
            $day = $this->validate($day);
            $month = $this->validate($month);
            $year = $this->validate($year);  
            
            switch ($type) {
                case 1: 
                    $sql = "SELECT SUM(d.jarGiven) AS jarGiven, SUM(d.jarReceive) AS jarCollect, (SUM(d.jarGiven) - SUM(d.jarReceive)) AS jarDue, SUM(d.jarGiven * c.customerRate) AS totalMoney, SUM(d.paymentToday) AS collectMoney, (SUM(d.jarGiven * c.customerRate) - SUM(d.paymentToday) ) AS moneyDue
                            FROM ((customerTable c INNER JOIN delevery d ON c.customerID = d.cID) INNER JOIN staffTable s ON s.staffID = c.customerCorrospondingStaff) 
                            WHERE s.staffID = ? AND YEAR(d.date) = ? ";
                    $stmt = $this->con->prepare($sql);
                    $stmt->bind_param("ss", $id,$year);  
                    // set parameters and execute
                    $stmt->execute();
                    $res = $stmt->get_result();
                    return $res;
                    break;
                case 2:
                    $sql = "SELECT SUM(d.jarGiven) AS jarGiven, SUM(d.jarReceive) AS jarCollect, (SUM(d.jarGiven) - SUM(d.jarReceive)) AS jarDue, SUM(d.jarGiven * c.customerRate) AS totalMoney, SUM(d.paymentToday) AS collectMoney, (SUM(d.jarGiven * c.customerRate) - SUM(d.paymentToday) ) AS moneyDue
                            FROM ((customerTable c INNER JOIN delevery d ON c.customerID = d.cID) INNER JOIN staffTable s ON s.staffID = c.customerCorrospondingStaff) 
                            WHERE s.staffID = ? AND MONTH(d.date) = ? AND YEAR(d.date) = ? ";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bind_param("sss", $id,$month,$year);  
                        // set parameters and execute
                        $stmt->execute();
                        $res = $stmt->get_result();
                        return $res;
                    break;
                case 3:
                    $sql = "SELECT SUM(d.jarGiven) AS jarGiven, SUM(d.jarReceive) AS jarCollect, (SUM(d.jarGiven) - SUM(d.jarReceive)) AS jarDue, SUM(d.jarGiven * c.customerRate) AS totalMoney, SUM(d.paymentToday) AS collectMoney, (SUM(d.jarGiven * c.customerRate) - SUM(d.paymentToday) ) AS moneyDue
                            FROM ((customerTable c INNER JOIN delevery d ON c.customerID = d.cID) INNER JOIN staffTable s ON s.staffID = c.customerCorrospondingStaff) 
                            WHERE s.staffID = ? AND DAY(d.date) = ? AND MONTH(d.date) = ? AND YEAR(d.date) = ? ";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bind_param("ssss", $id,$day,$month,$year);  
                        // set parameters and execute
                        $stmt->execute();
                        $res = $stmt->get_result();
                        return $res;
                    break;
            }
        }

        public function getAllStaffdetailsTransaction($type,$day,$month,$year){
            $type = (int) $this->validate($type);
            $day = (int)$this->validate($day);
            $month = (int)$this->validate($month);
            $year = (int)$this->validate($year); 
         //   var_dump ($type);
            
            switch ($type) {
                //type = 1 => monthly data;
                case 1:
                    $sql = "SELECT SUM(d.jarGiven) AS jarGiven, SUM(d.jarReceive) AS jarCollect, (SUM(d.jarGiven) - SUM(d.jarReceive)) AS jarDue, SUM(d.jarGiven * c.customerRate) AS totalMoney, SUM(d.paymentToday) AS collectMoney, (SUM(d.jarGiven * c.customerRate) - SUM(d.paymentToday) ) AS moneyDue
                            FROM customerTable c INNER JOIN delevery d ON c.customerID = d.cID 
                            WHERE MONTH(d.date) = ? AND YEAR(d.date) = ?";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bind_param("ss",$month, $year);  
                        // set parameters and execute
                        $stmt->execute();
                        $res = $stmt->get_result();
                     //   echo "Case 1 from database";
                        return $res;
                    break;
                //type = 2 => daily data;
                case 2:
                    $sql = "SELECT SUM(d.jarGiven) AS jarGiven, SUM(d.jarReceive) AS jarCollect, (SUM(d.jarGiven) - SUM(d.jarReceive)) AS jarDue, SUM(d.jarGiven * c.customerRate) AS totalMoney, SUM(d.paymentToday) AS collectMoney, (SUM(d.jarGiven * c.customerRate) - SUM(d.paymentToday) ) AS moneyDue
                            FROM customerTable c INNER JOIN delevery d ON c.customerID = d.cID
                            WHERE DAY(d.date) = ? AND MONTH(d.date) = ? AND YEAR(d.date) = ?";
                        $stmt = $this->con->prepare($sql);
                        $stmt->bind_param("sss", $day,$month,$year);  
                        // set parameters and execute
                        $stmt->execute();
                        $res = $stmt->get_result();
                      //  echo "Case 2 from database";
                        return $res;
                    break;
            }
        }

        public function customerAdding($id,$rate,$name,$staffnumber,$phone,$email,$address){
            /* for Security */
            $id = $this->validate($id);
            $rate = $this->validate($rate);
            $name = $this->validate($name);
            $staffnumber = $this->validate($staffnumber);
            $phone = $this->validate($phone);
            $email = $this->validate($email);
            $address = $this->validate($address);
            $sql = "INSERT INTO customerTable (customerID, customerRate, 
                                                customerName, customerCorrospondingStaff, customerPhone, 
                                                customerAddress, customerEmail) 
                    VALUES (?,?,?,?,?,?,?) ";   
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("sssssss", $id, $rate,$name,$staffnumber,$phone,$address,$email); 
			// set parameters and execute
			$stmt->execute();
            if($stmt->store_result()){
                /*if registration successful automatically create a due entry for that customer */
				date_default_timezone_set('Asia/Dhaka'); //set default time zone to Dhaka                
                $dates =  date('Y-m-d',strtotime("-1 days")); //to avoid due money/jar with today's due jar/money it's due for prev day.
                if($this->setCustomerDue($id,$dates,0,0)){ //initially due jar and due money set to zero.
                    return true;
                }
                else{
                    /* customer added but due couldn't set*/
                    echo "due couldn't se"; 
                    return true;
                }
            }
            else{
                return false;
            }
        }

        public function customerUpdateInfoById($customerid,$customerrate,$customername,$customerstaffnumber,$customerphone,$customeremail,$customeraddress){
            $id = $this->validate($customerid);
            $rate = $this->validate ($customerrate);
            $name = $this->validate($customername);
            $staffNumber = $this->validate($customerstaffnumber);
            $phone = $this->validate($customerphone);
            $address = $this->validate($customeraddress);
            $email = $this->validate($customeremail);
            $sql = " UPDATE customerTable
                    SET customerRate = ?, customerName = ?, customerCorrospondingStaff = ?, 
                    customerPhone = ?, customerAddress = ?, customerEmail = ?
                    WHERE customerID = ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("sssssss", $rate, $name,$staffNumber,$phone,$address,$email,$id); 
			// set parameters and execute
			$stmt->execute();
            if($stmt->store_result()){
                return true;
            }
            else{
                return false;
            }
        }

        public function getAllCustomers(){
            $sql = "SELECT * FROM customerTable ORDER BY customerID";
            $res = mysqli_query($this->con,$sql);
            return $res;
        }

        public function getAllCustomerDetailsWithCorrespondingStaff($staffid){
            /* for Security */
            $staffid = $this->validate($staffid);
            $sql = "SELECT * FROM customerTable WHERE customerCorrospondingStaff = ? ORDER BY customerID";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("s", $staffid);  
			// set parameters and execute
			$stmt->execute();
            $res = $stmt->get_result();
            return $res;
        }


        public function getCustomerDetails($cid){
            /* for Security */
            $cid = $this->validate($cid);
            $sql = "SELECT * FROM customerTable WHERE  customerID = ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("s", $cid);  
			// set parameters and execute
			$stmt->execute();
            $res = $stmt->get_result();
            if($res->num_rows >0){
                while($raw = $res->fetch_assoc()){
                    $rate = $raw['customerRate'];
                    $name = $raw['customerName'];
                    $staffNumber = $raw['customerCorrospondingStaff'];
                    $phone = $raw['customerPhone'];                    
                    $address = $raw['customerAddress'];
                    $email = $raw['customerEmail'];
                    return array(
                                'customerRate' =>$rate,
                                'customerName' =>$name,
                                'customerCorrospondingStaff' =>$staffNumber, 
                                'customerPhone' =>$phone, 
                                'customerAddress' =>$address,
                                'customerEmail' =>$email                                 
                            );
                }
            }
            else {
                return array(
                    'customerRate' =>0,
                    'customerName' =>"not found",
                    'customerCorrospondingStaff' =>"0", 
                    'customerPhone' =>"not found", 
                    'customerAddress' =>"not found",
                    'customerEmail' =>"not found"                                 
                );
            }
        }


        public function updateCustomerDue($id,$category,$value){
            /* for Security */
            $id = $this->validate($id);
            $category = $this->validate($category);
            $value = $this->validate($value);

            $existingDue = $this->getCustomerDue($id);
            $dates = $existingDue['dueDate']; //to get the latest due date so the new value can be set
            if($category == 1){
                $sql2 = "UPDATE customerDue
                    SET dueJar = ? WHERE cID = ? AND date = ? ";
                $stmt2 = $this->con->prepare($sql2);
                $stmt2->bind_param("sss", $value, $id, $dates); 
                // set parameters and execute
                $stmt2->execute();
                if($stmt2->store_result()){
                    return true;
                }
                else{
                    return false;
                }
            }
            else if($category == 2){
                $sql2 = "UPDATE customerDue
                    SET  dueMoney = ? WHERE cID = ? AND date = ? ";
                $stmt2 = $this->con->prepare($sql2);
                $stmt2->bind_param("sss", $value, $id, $dates); 
                // set parameters and execute
                $stmt2->execute();
                if($stmt2->store_result()){
                    return true;
                }
                else{
                    return false;
                }
            }
            return false;
        }


        public function setCustomerDue($id,$dates,$jar,$money){
            /*for Security */
            $id = $this->validate($id);
            $dates = $this->validate($dates);
            $jar = $this->validate($jar);
            $money = $this->validate($money);

            /* Before new entry, check whether any entry exist already or not */
            $sql1 = "SELECT * FROM customerDue WHERE cID = ? AND date = ?";
            $stmt1 = $this->con->prepare($sql1);
            $stmt1->bind_param("ss", $id, $dates); 
			// set parameters and execute
			$stmt1->execute();
            $stmt1->store_result();
            $rows = $stmt1->num_rows;
            if($rows == 1){ //means already an entry exist so, we need to update it now (used in getData.php)
                $sql2 = "UPDATE customerDue
                        SET dueJar = ?, dueMoney = ? WHERE cID = ? AND date = ? ";
                $stmt2 = $this->con->prepare($sql2);
                $stmt2->bind_param("ssss", $jar, $money, $id, $dates); 
                // set parameters and execute
                $stmt2->execute();
                if($stmt2->store_result()){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                /* means no entry till now, so, we need to create new one */
                $sql = "INSERT INTO customerDue (cID, date, dueJar, dueMoney) 
                    VALUES (?,?,?,?) ";   
                $stmt = $this->con->prepare($sql);
                $stmt->bind_param("ssss", $id, $dates,$jar,$money); 
                // set parameters and execute
                $stmt->execute();
                if($stmt->store_result()){
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        public function getCustomerDue($customerid){
            /*for Security */
            $customerid = $this->validate($customerid);
            date_default_timezone_set('Asia/Dhaka'); //set default time zone to Dhaka                
            $dates =  date('Y-m-d');
            $sql = "SELECT * FROM customerDue WHERE date != '$dates' AND cID = ? ORDER BY date DESC LIMIT 1";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("s", $customerid);  
			// set parameters and execute
			$stmt->execute();
            $res = $stmt->get_result();
            if($res->num_rows >0){
                while($raw = $res->fetch_assoc()){
                    $duemoney = $raw['dueMoney'];
                    $duejar = $raw['dueJar'];
                    $dueDate = $raw['date'];
                    return array(
                            'duemoney' =>$duemoney,
                            'duejar' =>$duejar,
                            'dueDate' =>$dueDate
                            );
                }
            }
        }

        public function setCustomerDelevery($customerid,$dates,$jarGiven,$jarReceive,$paymentToday,$commentIfAny){
            /*for Security */
            $customerid = $this->validate($customerid);
            $dates = $this->validate($dates);
            $jarGiven = $this->validate($jarGiven);
            $jarReceive = $this->validate($jarReceive);
            $paymentToday = $this->validate($paymentToday);
            $commentIfAny = $this->validate($commentIfAny);

            $sql = "INSERT INTO delevery (cID, date, jarGiven, jarReceive, paymentToday, commentIfAny) 
                    VALUES (?,?,?,?,?,?) ";   
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("ssssss", $customerid, $dates,$jarGiven,$jarReceive,$paymentToday,$commentIfAny); 
			// set parameters and execute
			$stmt->execute();
            if($stmt->store_result()){
                return true;
            }
            else{
                return false;
            }
        }

        public function updateCustomerDelevery($id,$dates,$category,$value){
            /*for Security */
            $id = $this->validate($id);
            $dates = $this->validate($dates);
            $category = $this->validate($category);
            $value = $this->validate($value);

            if($category == 1){
                $sql2 = "UPDATE delevery
                    SET jarGiven = ? WHERE cID = ? AND date = ? ";
                $stmt2 = $this->con->prepare($sql2);
                $stmt2->bind_param("sss", $value, $id, $dates); 
                // set parameters and execute
                $stmt2->execute();
                if($stmt2->store_result()){
                    return true;
                }
                else{
                    return false;
                }
            }
            else if($category == 2){
                $sql2 = "UPDATE delevery
                    SET  jarReceive = ? WHERE cID = ? AND date = ? ";
                $stmt2 = $this->con->prepare($sql2);
                $stmt2->bind_param("sss", $value, $id, $dates); 
                // set parameters and execute
                $stmt2->execute();
                if($stmt2->store_result()){
                    return true;
                }
                else{
                    return false;
                }
            }
            else if($category == 3){
                $sql2 = "UPDATE delevery
                    SET  paymentToday = ? WHERE cID = ? AND date = ? ";
                $stmt2 = $this->con->prepare($sql2);
                $stmt2->bind_param("sss", $value, $id, $dates); 
                // set parameters and execute
                $stmt2->execute();
                if($stmt2->store_result()){
                    return true;
                }
                else{
                    return false;
                }
            }
            else if($category == 4){
                $sql2 = "UPDATE delevery
                    SET  commentIfAny = ? WHERE cID = ? AND date = ? ";
                $stmt2 = $this->con->prepare($sql2);
                $stmt2->bind_param("sss", $value, $id, $dates); 
                // set parameters and execute
                $stmt2->execute();
                if($stmt2->store_result()){
                    return true;
                }
                else{
                    return false;
                }
            }

            return false;
        }

        public function getCustomerDelevery($customerid,$dates){
            /*for Security */
            $customerid = $this->validate($customerid);
            $dates = $this->validate($dates);

            $sql = " SELECT jarGiven, jarReceive, paymentToday, commentIfAny 
                    FROM delevery
                    WHERE cID = ? AND date = ?"; 
            $stmt = $this->con->prepare($sql);
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("ss", $customerid,$dates);  
			// set parameters and execute
			$stmt->execute();
            $res = $stmt->get_result();
            if($res->num_rows >0){
                while($raw = $res->fetch_assoc()){
                    $jargive = $raw['jarGiven'];
                    $jarreceive = $raw['jarReceive'];
                    $paytoday = $raw['paymentToday'];
                    $comment = $raw['commentIfAny'];
                    return array(
                                'jarGiven' =>$jargive,
                                'jarReceive' =>$jarreceive,
                                'paymentToday' =>$paytoday,
                                'commentIFany' =>$comment 
                            );
                }
            }
            else {
                /* if no delevery item found for that customer on a perticular day just create one */ 
                $this->setCustomerDelevery($customerid,$dates,0,0,0,"");
                return array(
                    'jarGiven' =>0,
                    'jarReceive' =>0,
                    'paymentToday' =>0,
                    'commentIFany' =>"" 
                );
            }
        }

        public function getCustomerDeleveryHistory($customerid){
            /*for Security */
            $customerid = $this->validate($customerid);

            $sql = " SELECT date, jarGiven, jarReceive, paymentToday 
                    FROM delevery
                    WHERE cID = ? ORDER BY date DESC "; 
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("s", $customerid);  
			// set parameters and execute
			$stmt->execute();
            $res = $stmt->get_result();
            
            return $res;
        }

        public function __destruct(){
            mysqli_close($this->con);            
        }            
        
	}
?>