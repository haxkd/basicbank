<?php
session_start();
include_once 'config.php';

if (isset($_GET['scustomer']) && !empty($_GET['scustomer']) && isset($_GET['tcustomer']) && !empty($_GET['tcustomer']) && isset($_GET['amount']) && !empty($_GET['amount'])) {
$scustomer = (int)$_GET['scustomer'];

$tcustomer = (int)$_GET['tcustomer'];
$amount = (int)$_GET['amount'];

$sqs = "SELECT * FROM basicbank_customer WHERE c_id='$scustomer'";
$sqr = mysqli_query($conn,$sqs);
$tqs = "SELECT * FROM basicbank_customer WHERE c_id='$tcustomer'";
$tqr = mysqli_query($conn,$tqs);
    if (mysqli_num_rows($sqr)>0) {
        $srow = mysqli_fetch_assoc($sqr);
        $trow = mysqli_fetch_assoc($tqr);
        $scbalance = (int)$srow['c_balance'];
        $tcbalance = (int)$trow['c_balance'];
        if($amount<$scbalance){
            if (mysqli_num_rows($tqr)>0) {
                $stamount = $scbalance-$amount;
                $ttamount = $tcbalance+$amount;
                $sbq = "UPDATE basicbank_customer SET c_balance='$stamount' WHERE c_id='$scustomer'";
                $tbq = "UPDATE basicbank_customer SET c_balance='$ttamount' WHERE c_id='$tcustomer'";
                $sbqr = mysqli_query($conn,$sbq);
                $tbqr = mysqli_query($conn,$tbq);
                if($sbqr && $tbqr){
                   // echo 'BALANCE TRANSFER SUCCESSFULLY.....!';
                    $_SESSION['msg'] = 'BALANCE TRANSFER SUCCESSFULLY.....!';
                    header("location: transfer.php?cid=$scustomer");
                    exit();
                    exit;
                }
                else{
                    //echo 'BALANCE TRANSFER FAILED.......!';
                    $_SESSION['msg'] = 'BALANCE TRANSFER FAILED.......!';
                    header("location: transfer.php?cid=$scustomer");
                    exit();
                    exit;
                }
            }
            else{
                    //echo 'RECEIVER CUSTOMER NOT FOUND';
                    $_SESSION['msg'] = 'RECIEVER CUSTOMER NOT FOUND......!';
                    header("location: transfer.php?cid=$scustomer");
                    exit();
                    exit;
            }
        }
        else{
            //echo 'YOUR ACCOUNT BALANCE IS LOW TO TRANSFER........!';
            $_SESSION['msg'] = 'YOUR ACCOUNT BALANCE IS LOW TO TRANSFER......!';
            header("location: transfer.php?cid=$scustomer");
            exit();
            exit;
        }
    }
    else{
        //echo 'SENDER CUSTOMER NOT FOUND';
            $_SESSION['msg'] = 'SENDER CUSTOMER NOT FOUND......!';
            header("location: transfer.php?cid=$scustomer");
            exit();
            exit;
    }
}
else{
    //echo 'SOMETHING WENT WRONG';
    $_SESSION['msg'] = 'SOMETHING WENT WRONG......!';
    header('location: index.php');
    exit();
    exit;
}
?>