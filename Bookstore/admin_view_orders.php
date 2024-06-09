<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Orders Details";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$id;
	if(isset($_GET['orderId'])){
     $id = $_GET['orderId'];
	}
	else{
		header("Location: admin_orders.php");
	}
	$conn = db_connect();
	$result = getOrderDetails($conn,$id);
	
?>
	<h4 class="fw-bolder text-center">Order Details</h4>
	<center>
	<hr class="bg-warning" style="width:5em;height:3px;opacity:1">
	</center>
	<div class="card rounded-0">
		<div class="card-body">
			<div class="container-fluid">
				<table class="table table-striped table-bordered" >
				
					<thead>
					<tr>
						<th>Order Id</th>
						<th>Isbn</th>
						<th>Amount</th>
						<th>Quantity</th>
						
					</tr>
					</thead>
					<tbody>
					<?php while($row = mysqli_fetch_assoc($result)){?>
					<tr>
						<td class="px-2 py-1 align-middle"><?php echo $row['orderid']; ?></td>
					<td class="px-2 py-1 align-middle"><a href="book.php?bookisbn=<?php echo $row['book_isbn']; ?>" target="_blank"><?php echo $row['book_isbn']; ?></a></td>
						<td class="px-2 py-1 align-middle"><?php echo $row['item_price']; ?></td>
						<td class="px-2 py-1 align-middle"><?php echo $row['quantity']; ?></td>
			
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