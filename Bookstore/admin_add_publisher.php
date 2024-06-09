<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Add Publisher";
	require "./template/header.php";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add_publisher'])){
		$publisher_name = trim($_POST['publisher_name']);
		$publisher_name = mysqli_real_escape_string($conn, $publisher_name);

		$query = "INSERT INTO publisher (`publisher_name`) VALUES ('" . $publisher_name . "')";
		$result = mysqli_query($conn, $query);
		if($result){
			$_SESSION['book_success'] = "New Publisher has been added successfully";
			header("Location: admin_book.php");
		} else {
			$err =  "Can't add new data " . mysqli_error($conn);

		}
	}
?>
	<h4 class="fw-bolder text-center">Add New Publisher</h4>
	<center>
	<hr class="bg-warning" style="width:5em;height:3px;opacity:1">
	</center>
	<div class="row justify-content-center">
		<div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
			<div class="card rounded-0 shadow">
				<div class="card-body">
					<div class="container-fluid">
						<?php if(isset($err)): ?>
							<div class="alert alert-danger rounded-0">
								<?= $_SESSION['err_login'] ?>
							</div>
						<?php 
							endif;
						?>
						<form method="post" action="admin_add_publisher.php" enctype="multipart/form-data">
								<div class="mb-3">
									<label class="control-label">Name of publisher</label>
									<input class="form-control rounded-0" type="text" name="publisher_name">
								</div>
								
								<div class="text-center">
									<button type="submit" name="add_publisher"  class="btn btn-primary btn-sm rounded-0">Save</button>
									<button type="reset" class="btn btn-default btn-sm rounded-0 border">Cancel</button>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>