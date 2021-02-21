<?php
session_start();
include_once 'config.php';
?>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
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
   
<style>
.profile{
    height:30vh;
    width:30vh;
    border-radius: 30%;
}
div{
    border:1px solid black;
    margin:10px 0px;
}
</style>
<?php
if (isset($_GET['cid']) && !empty($_GET['cid'])) {
   $sq = "SELECT * FROM basicbank_customer WHERE c_id='$_GET[cid]'";
    $rq = mysqli_query($conn, $sq);
    if (mysqli_num_rows($rq)>0) {
        $row = mysqli_fetch_assoc($rq);
        echo "
        <div class='container mt-2'>
    <div align='center'>
        <div class='container'>
            <div class='jumbotron'>
                <h3 class='mb-5' style='text-decoration:underline blue solid 5px;'>Customer Profile</h3>
                <div class='container'>
                    <div class='row'>
                        <div class='col-md-6 my-auto'>
                            <img src='profile.jpg' class='img-fluid profile img-thumbnail'>
                        </div>
                        <div class='col-md-6'>
                            <div class='row'>
                                <div class='col-md-6'><h3>Customer ID</h3></div>
                                <div class='col-md-6 m-auto'><b>$row[c_id]</b></div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'><h3>Name</h3></div>
                                <div class='col-md-6 m-auto'>$row[c_name]</div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'><h3>Email</h3></div>
                                <div class='col-md-6 m-auto'>$row[c_email]</div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'><h3>Current Balance</h3></div>
                                <div class='col-md-6 text-danger m-auto'><b>$row[c_balance] INR</b></div>
                            </div>
                            <div class='row'>
                                <div class='col-md-12'> <a href='transfer.php?cid=$row[c_id]' class='btn btn-success btn-lg'>Transfer Money</a></div>
                            </div>
                        </div>
                    </div>                
                </div>                
            </div>
            <a href='allCustomers.php' class='btn btn-info'>View All Customers >></a>
            </div>
        </div>    
    </div>
</div>";
    }
    else{
        echo "<div class='container'>
                <div class='jumbotron'>
                    PLEASE SELECT A VALID CUSTOMER 
                    <a href='allCustomers.php' class='btn btn-info'>View All Customers >></a>
                    </div>
                </div>";
    }
}
else{
    echo "<div class='container'>
    <div class='jumbotron'>
        PLEASE SELECT A VALID CUSTOMER 
        <a href='allCustomers.php' class='btn btn-info'>View All Customers >></a>
        </div>
    </div>";
}
 ?>   





 </body>
</html>