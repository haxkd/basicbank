<?php
session_start();
include_once 'config.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

 </head>
 <body>
<div class="container mt-5">
    <div align="center">
        <div class="container">
            <div class="jumbotron">
                <h3 class="mb-5">Hello User</h3>
                    WELCOME TO BASIC BANK
                    <?php
                    if(isset($_SESSION['msg'])){
                        echo "<h3 class='text-danger'>$_SESSION[msg]</h3>";
                        unset($_SESSION['msg']);
                    }
                    ?>
                </div>
                <a href="allCustomers.php" class="btn btn-info">View All Customers >></a>
            </div>
        </div>    
    </div>
</div>
 </body>
</html>