<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Orders book";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAllOrders($conn);
?>
	<h4 class="fw-bolder text-center">Orders List</h4>
	<center>
	<hr class="bg-warning" style="width:5em;height:3px;opacity:1">
	</center>
	<div class="card rounded-0">
		<div class="card-body">
			<div class="container-fluid">
				<table class="table table-striped table-bordered" >
				<colgroup>
					<col width="10%">
					<col width="15%">
					<col width="15%">
					<col width="10%">
					<col width="15%">
					<col width="10%">
					<col width="15%">
					<col width="10%">
				</colgroup>
					<thead>
					<tr>
						<th>No</th>
						<th>Amount</th>
						<th>Date</th>
						<th>Customer Name</th>
						<th>Address</th>
						<th>City</th>
						<th>Zip code</th>
						<th>Zip country</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php while($row = mysqli_fetch_assoc($result)){ ?>
					<tr>
						<td class="px-2 py-1 align-middle"><?php echo $row['orderid']; ?></a></td>
						<td class="px-2 py-1 align-middle"><?php echo $row['amount']; ?></td>
						<td class="px-2 py-1 align-middle"><?php echo $row['date']; ?></td>
						<td class="px-2 py-1 align-middle"><?php echo $row['ship_name']; ?></td>
						<td class="px-2 py-1 align-middle"><p class="text-truncate" style="width:15em"><?php echo $row['ship_address']; ?></p></td>
						<td class="px-2 py-1 align-middle"><?php echo $row['ship_city']; ?></td>
						<td class="px-2 py-1 align-middle"><?php echo $row['ship_zip_code'] ?></td>
						<td class="px-2 py-1 align-middle text-center">
						<?php echo $row['ship_country'] ?>
						</td>
						<td class="px-2 py-1 align-middle text-center">
						<a href="admin_view_orders.php?orderId=<?php echo $row['orderid']; ?>" class="btn btn-sm rounded-0 btn-primary" title="View Order"><i class="fa fa-eye"></i></a>
						</td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>