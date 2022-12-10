<?php
    session_start();

    if(isset($_POST['btnSignInUser'])){
        $username = htmlspecialchars($_POST['txtUserName']);
        $password = htmlspecialchars($_POST['txtPassword1']);
        

        require_once('open-connection.php');
        $strSql= "
                    SELECT * FROM tbl_user 
                    WHERE   username = '$username'
                    AND password = '$password'
                ";

        if($rsUser = mysqli_query($con, $strSql)){
            if(mysqli_num_rows($rsUser) > 0){
                echo "Valid Username/Password!";
                header('location:product.php');
                mysqli_free_result($rsUser);
            }
            else{
               echo "Invalid Username/Password!";
            }
        }
        else{
            echo 'ERROR: Could not execute your request.';
        }
         require_once('close-connection.php');
    }

    if(isset($_POST['btnSignInCustomer'])) {
        $emailAddress = htmlspecialchars($_POST['txtemailAddress']);
        $password = htmlspecialchars($_POST['txtPassword2']);
        

        require_once('open-connection.php');
        $strSql= "
                    SELECT * FROM tbl_customer 
                    WHERE   emailAddress = '$emailAddress'
                    AND password = '$password'
                ";

        if($rsCustomer = mysqli_query($con, $strSql)){
            if(mysqli_num_rows($rsCustomer) > 0){

                $_SESSION['log'] = 'yes';
                header('location:index.php');
                mysqli_free_result($rsCustomer);
            }
            else{
                echo "Invalid Username/Password!";
            }
        }
        else{
            echo 'ERROR: Could not execute your request.';
        }
         require_once('close-connection.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="static-login.css">
    <title>Static Login</title>
</head>
<body>    
    <div class="container">
        <div class="col-10 mt-5" >
                <h1><i class="fa fa-store"></i> Learn IT Easy Online Shop</h1>
            </div>
        <hr>

         <div class="form-row">
            <div class="col form-group d-grid gap-1 col-4 ml-auto">   
                <div class="card">
                    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                    <p id="profile-name" class="profile-name-card">Admin Log-In</p>
                    <form class="form-signin" method="post">            
                        <input type="text" name="txtUserName" id="txtUserName" class="form-control" placeholder="User Name" required>
                        <input type="password" name="txtPassword1" id="txtPassword1" class="form-control" placeholder="Password" required>                
                        <button name="btnSignInUser" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
                    </form>
                        <a href="change-password.php" class="ForgetPwd" value="Login">Change Password?</a>
                </div>              
            </div>
            <div class="col form-group d-grid gap-1 col-4 mr-auto">   
                <div class="card">
                    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                    <p id="profile-name" class="profile-name-card">Customer Log-In</p>
                    <form class="form-signin" method="post">            
                        <input type="text" name="txtemailAddress" id="txtemailAddress" class="form-control" placeholder="User Name" required>
                        <input type="password" name="txtPassword2" id="txtPassword2" class="form-control" placeholder="Password" required>                
                        <button name="btnSignInCustomer" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
                    </form>
                        <a href="change-password.php" class="ForgetPwd" value="Login">Change Password?</a>
                </div>              
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>