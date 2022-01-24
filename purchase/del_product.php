<?php
	include('session.php');
	if(isset($_POST['rem'])){
		$id=$_POST['id'];
		
		mysqli_query($conn,"delete from `purchasecart` where productid='$id' and userid='".$_SESSION['id']."'");
	}
?>