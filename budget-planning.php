
<?php
session_start();
//$_SESSION['user_id'] = 1;
require_once './model/ExpenseCategoryModel.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Budget Planning</title>
    
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<link rel="icon" href="images/reg.png" />
</head>	
<body>


    
	<br><br>

   <?php 
//    var_dump($_GET);
  //  if(isset($_GET["success"]){
//    echo "success";
//}else if($_GET["error"]){
  //  echo "error";
//} ?>
    
    
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

        <form method="post" action="controller/process-budget.php">
		<fieldset>
			<center>
			<br>
                        Budget Month1:
            <select name="month" required="required">
				<option value="hidden selected">Select Month</option>
				<option value="01">January</option>
				<option value="02">February</option>
				<option value="03">March</option>
				<option value="04">April</option>
				<option value="05">May</option>
				<option value="06">June</option>
				<option value="07">July</option>
				<option value="08">August</option>
				<option value="09">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select><br><br/>

<?php
                    $categoryModel = new ExpenseCategoryModel();
                    $categories = $categoryModel->getAllCategory();
                    if ($categories) {
                        $index = 1;
                        while($category = mysqli_fetch_assoc($categories)) {
                            ?>
			Category <?php echo $index++; ?>: <input type="checkbox" name="cat[]" value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?>
                        <input type="hidden" name="category[]" value="<?php echo $category["id"]; ?>">
			Amount: <input type="text" name="amount[]">
			<br><br><br>			
                        <?php
                        }
                    } else {
                        echo 'No Category Exists. Insert Category into Database';
                    }
                    ?>


<!--			Category 2: <input type="checkbox" name="cat2" value="Medical">Medical  
			
			<select name="Month">
				<option value="hidden selected">Select Month</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>

			</select><br>

			Amount:<input type="text" name="amount">

			<br><br><br>


			Category 3: <input type="checkbox" name="cat3" value="Entertainment">Entertainment

			<select name="Month">
				<option value="hidden selected">Select Month</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>

			</select><br>

			Amount:<input type="text" name="amount">

			<br><br><br>


			Category 4: <input type="checkbox" name="cat4" value="Food">Food

			<select name="Month">
				<option value="hidden selected">Select Month</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>

			</select><br>

			Amount:<input type="text" name="amount">

			<br><br><br>

			Category 5: <input type="checkbox" name="cat5" value="Utilities">Utilities

			<select name="Month">
				<option value="hidden selected">Select Month</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>

			</select><br>

			Amount:<input type="text" name="amount">

			<br><br><br>

			Category 6: <input type="checkbox" name="cat6" value="Education">Education

			<select name="Month">
				<option value="hidden selected">Select Month</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>

			</select><br>

			Amount:<input type="text" name="amount">

			<br><br><br>


			Category 7: <input type="checkbox" name="cat7" value="Sports">Sports

			<select name="Month">
				<option value="hidden selected">Select Month</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>

			</select><br>

			Amount:<input type="text" name="amount">

			<br> <br>-->

			<input type="submit" name="submit" value="Submit">
			<input type="reset" name="reset" value="Reset">

		</center>

		</fieldset>

	</form>
    </div>
    
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