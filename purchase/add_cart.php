<?php
	include('session.php');
	if(isset($_POST['cart'])){
		$id=$_POST['id'];
		$qty=$_POST['qty'];
		$price=$_POST['price'];
		$query=mysqli_query($conn,"select * from purchasecart where productid='$id' and userid='".$_SESSION['id']."'");
		if (mysqli_num_rows($query)>0){
			echo "Product already on your cart!";
		}
		else{
			mysqli_query($conn,"insert into purchasecart (userid, productid, qty, price) values ('".$_SESSION['id']."', '$id', '$qty', '$price')");
            mysqli_query($conn,"update product set purchase_price='$price' where productid='$id'");
		}
	}

?>