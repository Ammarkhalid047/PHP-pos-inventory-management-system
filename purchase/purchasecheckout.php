<?php include('session.php'); ?>
<?php include('header.php'); ?>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<body>
<div class="container">
	<div style="height:50px;"></div>
	<div class="row">
		<div class="col-lg-12">
			<a href="index.php" class="btn btn-primary" style="position:relative; left:3px;"><span class="glyphicon glyphicon-arrow-left"></span> Cancel</a>
		</div>
	</div>
	<div style="height:10px;"></div>
		<table width="100%" class="table table-striped table-bordered table-hover">
			<thead>
				<th></th>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Purchase Qty</th>
				<th>SubTotal</th>
			</thead>
			<tbody>
			<form method="POST" action="">
			<?php
				$total=0;
				$query=mysqli_query($conn,"select * from cart left join product on product.productid=cart.productid where userid='".$_SESSION['id']."'");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><button type="button" class="btn btn-danger btn-sm remove_prod" value="<?php echo $row['productid']; ?>"><i class="fa fa-trash fa-fw"></i> Remove</button></td>
						<td><?php echo $row['product_name']; ?></td>
						<td align="right"><?php echo number_format($row['product_price'],2); ?></td>
						<td><button type="button" class="btn btn-warning btn-sm minus_qty2" value="<?php echo $row['productid']; ?>"><i class="fa fa-minus fa-fw"></i></button> 
							<button type="button"class="btn btn-primary btn-sm add_qty2" value="<?php echo $row['productid']; ?>"><i class="fa fa-plus fa-fw"></i></button> 
							<?php echo $row['qty'];?>
						</td>
						<td align="right"><strong><span class="subt">
							<?php
								$subtotal=$row['qty']*$row['product_price'];
								echo number_format($subtotal,2);
								$total+=$subtotal;
							?>
						</span></strong></td>
					</tr>
					<?php
				}
			?>
			<tr>
				<td colspan="5"><span class="pull-right"><strong>Grand Total</strong></span></td>
				<td align="right"><strong><span id="total"><?php echo number_format($total,2); ?></span><strong></td>
			</tr>
			</form>
			</tbody>
		</table>
		</table>
	<div class="row">
		<span class="pull-right" style="margin-right:15px;"><strong>Payment method Here</strong></span>
	</div>
	<div style="height:20px;"></div>
	<div class="row">
		<button type="button" id="sub" class="btn btn-primary pull-right check" style="margin-right:15px;"><i class="fa fa-check fa-fw"></i> Confirm</button>
	</div>
</div>
<?php include('script.php'); ?>
<script src="custom.js"></script>
<!--<script>
$(document).ready(function(){
	showpurchaseCheckout();
});
</script>-->
<!--<script>
$('button.check').click(function(){
           window.print();
           return false;
});    
</script>-->

</body>
</html>