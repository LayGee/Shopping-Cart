<?php 
    session_start() 
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
	<title>View Product</title>
</head>
<body>
    <div class="container">
            <div class="row mt-5">
                <div class="col-10">
                    <h1><i class="fa fa-store"></i> Learn IT Easy Online Shop</h1>
                </div>      
            </div>
            <hr>

            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col-1"> </th>
                                <th scope="col-3">Product</th>
                                <th scope="col-4">description</th>
                                <th scope="col-2">Price</th>
                                <th scope="col-1"> </th>
                                <th scope="col-1"> </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                require('open-connection.php');
                                $strSql= "SELECT * FROM cart_shopping ORDER BY name";
                            ?>

                               <?php  if($rsProducts = mysqli_query($con, $strSql)):?>
                                    <?php if(mysqli_num_rows($rsProducts) > 0):?>
                                        <?php while ($recProducts = mysqli_fetch_array($rsProducts)) {
                                            echo
                                            '<tr>
                                                <td><img  width=60px src="img/'.$recProducts['photo1'].'"></td>
                                                <td>'.$recProducts['name'].'</td>
                                                <td>'.$recProducts['description'].'</td>
                                                <td class="text-right">'.number_format($recProducts['price']).'</td>
                                                <td class="text-right"><a href="edit-product.php?k='.$recProducts['id'].'"><button name="update" class="btn btn-sm btn-success" type="button"><i class="fa fa-edit"></i></button></a>
                                                <td class="text-right"><a href="remove-product.php?k='.$recProducts['id'].'"><button name="remove" class="btn btn-sm btn-danger" type="button"><i class="fa fa-trash"></i></button></a>

                                            </tr>';
                                            }
                                            mysqli_free_result($rsProducts);
                                        ?>

                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7">No Record Found!</td>
                                            </tr>
                                        <?php endif; ?>

                                    <?php else: echo 'ERROR: Could not execute your request.';?>
                                        <?php require('close-connection.php'); ?>
                                <?php endif; ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>                
                </div>            
            </div>
             <div class="row mb-5">
                    <div class="d-grid gap-2 col-5 mx-auto">
                        <a href="add-product.php" class="btn btn-primary btn-lg btn-block"><i class="fa fa-plus-square"></i> Add Product</a>
                    </div>

            </div>
 </div>






 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>