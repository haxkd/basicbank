<?php
session_start();
include_once 'config.php';
if(isset($_POST['addcustomer']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$balance = $_POST['balance'];

$check_email = "SELECT * FROM basicbank_customer WHERE c_email='$email'";
    $run_check_email = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($run_check_email)>0) {
        $_SESSION['msg'] = "EMAIL ID $email ALREADY EXIST";
        header('location: addCustomer.php');
        exit();
        exit;
    }

    $query_add_customer = "INSERT INTO basicbank_customer(c_name,c_email,c_balance) VALUES('$name','$email','$balance')";
    if(mysqli_query($conn,$query_add_customer)){
        $_SESSION['msg'] = 'NEW CUSTOMER ADDED SUCCESSFULLY';
        header('location: allCustomers.php');
        exit();
        exit;
    }else{
        $_SESSION['msg'] = 'NEW CUSTOMER ADDING FAILED';
        header('location: allCustomers.php');
        exit();
        exit;
    }
}else{
        $_SESSION['msg'] = 'SOMETHING WENT WRONG';
        //header('location: index.php');
        exit();
        exit;
}
?>