<?php 

	if(isset($_POST['btnRegister'])){

		if(empty($err)){
			require('open-connection.php');
				$strSql = "
							INSERT INTO tbl_customer(firstName, lastName, emailAddress, password, birthday, sex, address, mobileNumber)
							VALUES (?,?,?,?,?,?,?,?)
						";
				if($stmt = mysqli_prepare($con, $strSql)){
				mysqli_stmt_bind_param($stmt, "ssssssss",
										$firstName, $lastName, 
										$emailAddress, $password, 
										$birthday, $sex, 
										$address, $mobileNumber);

					$firstName= $_POST['txtfirstName'];
					$lastName= $_POST['txtlastName'];
					$emailAddress= $_POST['txtemailAddress'];
					$password= $_POST['txtpassword'];
					$birthday= $_POST['txtbirthday'];
					$sex= $_POST['radioSex'];
					$address= $_POST['txtaddress'];
					$mobileNumber= $_POST['txtmobileNumber'];
					mysqli_stmt_execute($stmt);

					header('location:product.php');
				}

				else{
					echo 'ERROR: Failed to insert Record!';
				}
				
			require ('close-connection.php');

		}	

	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
	<title>Register</title>

</head>
<body>
	<div class="container">
		<div class="col-10 mt-5" >
                <h1><i class="fa fa-store"></i> Learn IT Easy Online Shop</h1>
            </div>
		<hr>


		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
						<header class="card-header">
							<a href="static-login.php" class="float-right btn btn-outline-primary mt-1">Log in</a>
							<h4 class="card-title mt-2">Sign up</h4>
						</header>
					<article class="card-body">

						<form method="post">
						<div class="form-row">
							<div class="col form-group">
								<label>First name </label>   
							  	<input class="form-control" type="text" name="txtfirstName" id="txtfirstName" placeholder="" required>
							</div> <!-- form-group end.// -->
							<div class="col form-group">
								<label>Last name</label>
							  	<input class="form-control" type="text" name="txtlastName" id="txtlastName" placeholder="" required>
							</div> <!-- form-group end.// -->
						</div> <!-- form-row end.// -->
						<div class="form-group">
							<label>Email address</label>
							<input  class="form-control" type="text" name="txtemailAddress" id="txtemailAddress" placeholder="" required><br>
							<small class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div> <!-- form-group end.// -->
						<div class="form-group">
							<label>Address</label>
							<input  class="form-control" type="text" name="txtaddress" id="txtaddress" placeholder="" required><br>
						</div> <!-- form-group end.// -->
						<div class="form-group">
								<label class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="radioSex" value="male" checked>
							  <span class="form-check-label"> Male </span>
							</label>
							<label class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="radioSex" value="female">
							  <span class="form-check-label"> Female</span>
							</label>
						</div> <!-- form-group end.// -->
						<div class="form-row">
							<div class="form-group col-md-6">
							  <label>Mobile Number</label>
							  <input type="text" class="form-control" name="txtmobileNumber" id="txtmobileNumber" placeholder="mobileNumber" required>
							</div> <!-- form-group end.// -->
							<div class="form-group col-md-6">
							  <label>Birthday</label>
							  <input type="date" class="form-control" name="txtbirthday" id="txtbirthday" placeholder="" required>
							</div> <!-- form-group end.// -->
						</div> <!-- form-row.// -->
						<div class="form-group">
							<label>Create password</label>
						    <input class="form-control" type="password" name="txtpassword" id="txtpassword" placeholder="" required>
						</div> <!-- form-group end.// -->  
					    <div class="form-group">
					        <button type="submit" class="btn btn-primary btn-block" name="btnRegister" value="Register"> Register  </button>
					    </div> <!-- form-group// -->      
					    <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                                          
					</form>
					</article> <!-- card-body end .// -->
					<div class="border-top card-body text-center">Have an account? <a href="static-login.php">Log In</a></div>
				</div> <!-- card.// -->
			</div> <!-- col.//-->
		</div> <!-- row.//-->
	</div> 
	<!--container end.//-->

	<br><br>
	</article>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>