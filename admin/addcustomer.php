<?php
	include('session.php');
	
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
    $email=$_POST['email'];
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    }
	mysqli_query($conn,"insert into user (username, password, access) values ('$username', '$password', '2')");
	$userid=mysqli_insert_id($conn);
	
	mysqli_query($conn,"insert into customer (userid, customer_name, address, contact,email,id_img) values ('$userid', '$name', '$address', '$contact','$email','{$imgData}')");
	
	?>
		<script>
			window.alert('Employer added successfully!');
			window.history.back();
		</script>
	<?php
?>