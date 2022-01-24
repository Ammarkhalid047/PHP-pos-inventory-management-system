<?php 
include'header.php';
include'session.php';
?>
<style>
    body{
        font-size: 16px;
    }
</style>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="container">
  <div class="card">
<div class="card-header">
Invoice
<?php echo"<strong>" . date("Y/m/d") ."</strong>"; ?>
  <!--<span class="float-right"> <strong>Status:</strong> Pending</span>-->

</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-6" style="margin-top:30px; margin-bottom:30px;">
<h6 class="mb-3">From:</h6>
<div>
<strong>SURVICO SURGICALS</strong>
</div>
<div>Defence Road, Sialkot</div>
<div>Email: info@survico.com</div>
<div>Phone: +92 12345678</div>
</div>

<!--<div class="col-sm-6">
<h6 class="mb-3">To:</h6>
<div>
<strong>Bob Mart</strong>
</div>
<div>Attn: Daniel Marek</div>
<div>43-190 Mikolow, Poland</div>
<div>Email: marek@daniel.com</div>
<div>Phone: +48 123 456 789</div>
</div>-->



</div>

<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>
<th class="center">#</th>
<th>Item</th>
<th class="right">Unit Cost</th>
<th class="center">Qty</th>
<th class="right">Total</th>
</tr>
</thead>
<tbody>
			<form method="POST" action="">
			<?php
				$total=0;
				$query=mysqli_query($conn,"select * from purchasecart left join product on product.productid=purchasecart.productid where userid='".$_SESSION['id']."'");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><!--<button type="button" class="btn btn-danger btn-sm remove_prod" value="<?php echo $row['productid']; ?>"><i class="fa fa-trash fa-fw"></i> Remove</button>--></td>
						<td><?php echo $row['product_name']; ?></td>

						<td><?php echo number_format($row['product_price'],2); ?></td>
						<td><!--<button type="button" class="btn btn-warning btn-sm minus_qty2" value="<?php echo $row['productid']; ?>"><i class="fa fa-minus fa-fw"></i></button> 
							<button type="button"class="btn btn-primary btn-sm add_qty2" value="<?php echo $row['productid']; ?>"><i class="fa fa-plus fa-fw"></i></button>--> 
							<?php echo $row['qty'];?>
						</td>
						<td><strong><span class="subt">
							<?php
								$subtotal=$row['qty']*$row['purchase_price'];
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

</div>
		<button type="button" id="check" class="btn btn-primary pull-right check" style="margin-right:15px; background-color:white; border:none; color:black;">____</button>
<script>
$('button.check').click(function(){
           window.print();
    <?php 	mysqli_query($conn,"delete from purchasecart where userid='".$_SESSION['id']."'");
?> 
    window.location="index.php";
    return false;
});    
</script>
</div>

</div>
</div>
</div>