<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
    $pay=$_POST['pay'];
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    }
	$use=mysqli_query($conn,"select * from user where userid='id'");
	$urow=mysqli_fetch_array($use);
	
	if ($password==$urow['password']){
		$pass=$password;
	}
	else{
		$pass=md5($password);
	}

	mysqli_query($conn,"update customer set customer_name='$name', address='$address', contact='$contact',email='$email', pay='$pay' where userid='$id'");
	
	?>
		<script>
			window.alert('Employer updated successfully!');
			window.history.back();
		</script>
	<?php

?>