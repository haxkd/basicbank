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
   
<style>
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
        ?>
        <div class='container'>
    <div align='center'>
        <div class='container'>
            <div class='jumbotron'>
                <h3 class='mb-5' style='text-decoration:underline blue solid 5px;'>Transfer MoneY</h3>
                <?php
                    if(isset($_SESSION['msg'])){
                        echo "<h3 class='text-danger'>$_SESSION[msg]</h3>";
                        unset($_SESSION['msg']);
                    }
                ?>
                <div class='container'>
                    <form action="amountTransfer.php">
                        <div class='form-group'>
                        <div class='form-group'>
                            <input type='text' class='form-control' id='rcustomer' name='scustomer' value='<?php echo $_GET['cid']?>' readonly>
                        </div>
                            <label for='customer'>ID :</label>
                            <input list='customer' name='tcustomer' class='form-control' placeholder='Select customer ID'>
                                <datalist id='customer'>
                                <?php
                                $sq1 = 'SELECT * FROM basicbank_customer';
                                $rq1 = mysqli_query($conn,$sq1);
                            if(mysqli_num_rows($rq1)>0){
                                while($row1 = mysqli_fetch_assoc($rq1)){
                                    echo "<tr>
                                    <option value='$row1[c_id]'>$row1[c_name]</option>";
                                }
                            }
                            ?>    
                                </datalist>
                        </div>
                        <div class='form-group'>
                            <label for='amount'>Amount :</label>
                            <input type='number' class='form-control' id='amount' name='amount' placeholder='Enter amount' required>
                        </div>
                        <div class='form-group'>
                            <input type='submit' class='btn btn-success btn-lg' id='transfer' name='transfer' value='transfer' required>
                        </div>
                        <div class='form-group'>
                            <div class='row'>
                            <div class='col-md-6'>
                                <h4 class='text-danger'>Name : <?php echo $row['c_name'] ?></h4>
                                </div>
                                <div class='col-md-6'>
                                <h4 class='text-danger'>Total Balance Amount : <?php echo $row['c_balance'] ?> INR</h4>
                                </div>
                            </div>
                        </div>
                    </form>        
                </div>                
            </div>
            <a href='allCustomers.php' class='btn btn-info'>View All Customers >></a>
            </div>
        </div>    
    </div>
</div>
<?php
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