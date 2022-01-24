<?php
	include('session.php');
	$id=$_GET['id'];
    $qty=$_POST['qty'] + $prow['product_qty'];

$query=mysqli_query($conn,"select * from cart where productid='$id' and userid='".$_SESSION['id']."'");
		if (mysqli_num_rows($query)>0){
			echo "Product already on your cart!";
		}
		else{
			mysqli_query($conn,"insert into cart (userid, productid, qty) values ('".$_SESSION['id']."', '$id', '$qty')");
		}
?>    <script>
			window.alert('Product added to cart successfully!');
			window.location='../user/purchasecheckout.php';
		</script>