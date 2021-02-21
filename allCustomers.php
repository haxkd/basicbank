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
   

<div class="container mt-2">
    <div align="center">
        <div class="container">
            <div class="jumbotron">
                <h3 class="mb-5" style='text-decoration:underline blue solid 5px;'>All Customers</h3>
                <div class="table-responsive">
                    <table class="table table-dark table-hover">
                        <thead>
                        <tr>
                            <th>Cust Id</th>
                            <th>Name</th>
                            <th>Balance Amount</th>
                            <th>Transaction </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sq = 'SELECT * FROM basicbank_customer';
                            $rq = mysqli_query($conn,$sq);
                            if(mysqli_num_rows($rq)>0){
                                while($row = mysqli_fetch_assoc($rq)){
                                    echo "<tr>
                                    <td>$row[c_id]</td>
                                    <td>$row[c_name]</td>
                                    
                                    <td>$row[c_balance]</td>
                                    <td><a href='customer.php?cid=$row[c_id]' class='btn btn-success'>View Profile</a></td>
                                    </tr>";
                                }
                            }
                            ?>                      
                        
                        </tbody>
                        <tfoot>
                            <tr><td colspan='4' class='text-center'><a href='addCustomer.php' class='btn btn-success text-right'>Add New Customer</a></td></tr>
                        </tfoot>
                    </table>                
                </div>
                </div>
            </div>
        </div>    
    </div>
</div>
 </body>
</html>