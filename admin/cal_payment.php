<?php 
include 'session.php';
$days=$_POST['days'];
$id=$_POST['id'];
$use=mysqli_query($conn,"select * from customer where userid='$id'");
$urow=mysqli_fetch_array($use);
$daily=($urow['pay'])/30;
$payment=$daily*$days;
$name=$urow['customer_name'];
echo $payment;
mysqli_query($conn,"insert into balance (days, employerid, employername, amount_paid, date) values ('$days','$id','$name', '$payment',NOW())");
?>
<script>
window.location='payment_record.php';
</script>