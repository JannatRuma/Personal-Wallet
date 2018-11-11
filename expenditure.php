<?php
session_start();
//$_SESSION['user_id'] = 1;
require_once './model/ExpenseCategoryModel.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Enter Expenses</title>
        
         <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<link rel="icon" href="images/reg.png" />
    </head>
    <body>
        
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

        
        <br/><br/>
        
        <form method="post" action="controller/process-expenditure.php">
            <fieldset>
                <center>
                    <br/>

                    <?php
                    $categoryModel = new ExpenseCategoryModel();
                    $categories = $categoryModel->getAllCategory();
                    if ($categories) {
                        $index = 1;
                        while($category = mysqli_fetch_assoc($categories)) {
                            ?>
                    Category<?php echo $index++; ?>: <input type="checkbox" checked="" readonly="" name="cat[]" value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?><br/>
                    <input type="hidden" name="category[]" value="<?php echo $category['id']; ?>"/>
                    Amount: <input type="number" name="amount[]" step="1" min="0">
                    Date:<input type="date" name="date[]" value="<?php // echo date('Y-m-d') ?>" max="<?php echo date('Y-m-d'); ?>">

                            <br/><br/>
                        <?php
                        }
                    } else {
                        echo 'No Category Exists. Insert Category into Database';
                    }
                    ?>

<!--			Category 2: <input type="checkbox" name="cat[]" value="Medical">Medical<br/>
                        Amount:<input type="number" name="amount[]">
                        Date:<input type="date" name="date[]">

                        <br/><br/>


                        Category 3: <input type="checkbox" name="cat[]" value="Entertainment">Entertainment<br/>
                        Amount:<input type="number" name="amount[]">
                        Date:<input type="date" name="date[]">

                        <br/><br/>


                        Category 4: <input type="checkbox" name="cat[]" value="Food">Food<br/>
                        Amount:<input type="number" name="amount[]">
                        Date:<input type="date" name="date[]">

                        <br/><br/>

                        Category 5: <input type="checkbox" name="cat[]" value="Utilities">Utilities<br/>
                        Amount:<input type="number" name="amount[]">
                        Date:<input type="date" name="date[]">

                        <br/><br/>

                        Category 6: <input type="checkbox" name="cat[]" value="Education">Education<br/>
                        Amount:<input type="number" name="amount[]">
                        Date:<input type="date" name="date[]">

                        <br/><br/>


                        Category 7: <input type="checkbox" name="cat[]" value="Sports">Sports<br/>
                        Amount:<input type="number" name="amount[]">
                        Date:<input type="date" name="date[]"><br/><br/>-->

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
