<?php
session_start();
//$_SESSION['user_id'] = 1;
include_once './model/WalletModel.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Wallet</title>
        
         <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<link rel="icon" href="images/reg.png" />
    </head>	
    <body>

        <br><br>
        <?php
        $selected_month = "01";
        
        if (isset($_SESSION) && isset($_SESSION['user_id']) && $_POST) {
            $userId = $_SESSION['user_id'];
            $recordType = $_POST['recordType'];
            $month = $_POST['month'];
            $selected_month = $month;
//            echo "<pre>";
            $walletModel = new WalletModel();
            $budgetResource = $walletModel->getMonthlyBudgetRecord($month);
            $budgetArray = [];
                        $expenseArray = [];
            $index = 0;
            if($budgetResource){
                while ($obj = mysqli_fetch_assoc($budgetResource)) {
                    $budgetArray[$index] = $obj;
                    $expenseArray[$obj["id"]] = false;
                    $index++;
                }
            }

            $expenseResource = $walletModel->getMonthlyExpenseRecord($month);
            if($expenseResource){
                while ($obj = mysqli_fetch_assoc($expenseResource)) {
                    $expenseArray[$obj["id"]] = $obj;
                }
            }
          //  var_dump($budgetArray);
    //        var_dump($expenseArray);
      //      die;
        } else {
            header("Loaction: my-wallet.php");
        }
        ?>
        
        
         <div class="header">
		
	<div class="menu"> 
		<ul>
			<li><a href="index.php">Home</a></li>
            <li><a href="budget-planning.php">Budget Planning</a></li>
			<li><a href="expenditure.php">My Expenses</a></li>
			<li><a href="my-wallet.php">My Wallet</a></li>

		</ul>
		
	</div>
			
		
	</div>
		<center><h1>Personal Wallet</h1></center>
	
        
	<div class="ler">
        
        
        <form method="post" action="" target="_Self">
            <fieldset>
                <center>
                    <br>

                    Select Record Type<select name="recordType" required="">
                        <option value="monthly">Monthly</option>
                        <option value="weekly">Weekly</option>
                    </select><br><br>
                    Select Month<select name="month">
                        <!--<option value="hidden selected">Select Month</option>-->
                        <option value="01" <?php echo $selected_month == "01" ? 'selected' : ""; ?>>January</option>
                        <option value="02" <?php echo $selected_month == "02" ? 'selected' : ""; ?>>February</option>
                        <option value="03" <?php echo $selected_month == "03" ? 'selected' : ""; ?>>March</option>
                        <option value="04" <?php echo $selected_month == "04" ? 'selected' : ""; ?>>April</option>
                        <option value="05" <?php echo $selected_month == "05" ? 'selected' : ""; ?>>May</option>
                        <option value="06" <?php echo $selected_month == "06" ? 'selected' : ""; ?>>June</option>
                        <option value="07" <?php echo $selected_month == "07" ? 'selected' : ""; ?>>July</option>
                        <option value="08" <?php echo $selected_month == "08" ? 'selected' : ""; ?>>August</option>
                        <option value="09" <?php echo $selected_month == "09" ? 'selected' : ""; ?>>September</option>
                        <option value="10" <?php echo $selected_month == "10" ? 'selected' : ""; ?>>October</option>
                        <option value="11" <?php echo $selected_month == "11" ? 'selected' : ""; ?>>November</option>
                        <option value="12" <?php echo $selected_month == "12" ? 'selected' : ""; ?>>December</option>

                    </select><br><br>
                    Starting Date:<input type="Date" name="date">
                    <br><br><br>

                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" name="reset" value="Reset">

                </center>

            </fieldset>
        </form>
      </div>

        <br \>
    <center>
        <table border="2">
            <tr>
                <th>Category</th>
                <th>Budget</th>
                <!--<th>Weekly Expense</th>-->
                <th>Monthly Expense</th>
                <th>Status</th>
            </tr>
            <?php
            if ($_POST) {
                $index = 0;
                foreach ($budgetArray as $budget) {
                    ?>
                    <tr>
                        <td><?php echo $budget['name']; ?></td>
                        <td><?php echo $budget["amount"]; ?></td>
        <!--                    <td>700Tk</td>-->
                        <td><?php $obj1 = $expenseArray[$budget["id"]];
                    echo $obj1 == false ? 0 : $obj1["total_expense"];
                    ?></td>
                        <td><?php
                            if ($walletModel->calculateIfExpenditureExceeded($budget["id"], $month)) {
                                echo 'Your budget has been finished!';
                            } else {
                                echo 'You still have more budget in this category';
                            }
                            ?>
                        </td>
                    </tr>
        <?php }
} else {
    ?>
                <tr>
                    <td>Test</td>
                    <td>Test</td>
                    <td>Test</td>
                    <td>Test</td>
<?php } ?>
            </tr>
        </table>

    </center> 
    

 
        <div class="bottombar">
	
		<div class="bar1">
			<h2>About Us</h2>
			<p>
				<a href="http://www.facebook.com">Facebook</a><br>
				<a href="https://plus.google.com/discover?hl=en">Google+</a><br>
				<a href="https://twitter.com/?lang=en">Twitter</a>
			</p>
		</div >
		
		<div class="bar2">
			<h2>More</h2>
			<p>
				<a href="">Privacy Policy</a><br>
				<a href="">Terms & Conditions</a><br>
				
			</p>
			
		</div>
		
		<div class="bar3">
			<h2>My Account</h2>
			<p>
				<a href="">Order History</a><br>
				
			</p>
		</div>
	
	
	</div>
	<br>
	<div class="copyright">
		<hr>
			<p> Personal Wallet &copy;2018 All Rights Reserved. <br />
		       Developed by Jannat Binta Alam</p>
		
	</div>
    

</body>

</html>