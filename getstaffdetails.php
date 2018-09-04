<?php
    if(!isset($_POST['id'])){
        header("location:home.php");
    }
    include_once 'master_db.php';    
    $sid = $_POST['id'];
    $typeDetails = $_POST['type'];

    if ($typeDetails >! 0 || $typeDetails <! 4) {
        header("location:home.php");
    }

    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $db = new DB();
    $res = $db->getstaffdetailsTransaction($sid,$typeDetails,$day,$month,$year);
    $output = "";
    if($res->num_rows >0){
        $output = "
                <table class= 'table table-striped' style= 'text-align: center;'>
                <thead>
                    <tr>
                        <th scope='col'>Jar Given</th>
                        <th scope='col'>Jar Collected</th>
                        <th scope='col'>Jar Due</th>
                        <th scope='col'>Total Money</th>
                        <th scope='col'>Collected Money</th>
                        <th scope='col'>Money Due</th>
                    </tr>
                </thead>
                <tbody>";
                $count = 0;
        while($row = $res->fetch_assoc()){
            $JarGiven = $row['jarGiven'];
            $JarCollected = $row['jarCollect'];
            $JarDue = $row['jarDue'];
            $TotalMoney = $row['totalMoney'];
            $CollectedMoney = $row['collectMoney'];
            $MoneyDue = $row['moneyDue'];

            if (!isset($JarGiven)) {
                $output .= "<tr>
                                <td colspan='6'>NO DATA FOUND!</td>
                            </tr>";
                 break;
            }
            $output .= "
                    <tr>
                        <td scope='col'>".$JarGiven."</td>
                        <td scope='col'>".$JarCollected."</td>
                        <td scope='col'>".$JarDue."</td>
                        <td scope='col'>".$TotalMoney." tk</td>
                        <td scope='col'>".$CollectedMoney." tk</td>
                        <td scope='col'>".$MoneyDue." tk</td>
                    </tr>";
            $count++;
        }
        
        $output .= "
            </tbody>
        </table>";

    }
    else {
        $output .= "No data found!";
    }

    echo $output;
    
?>