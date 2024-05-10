<!DOCTYPE html>
<html>
<?php
session_start();
if (!(isset($_SESSION['name']) && isset($_SESSION['email']))) {
	header('Location: register.php');
}
include "includes/css_header.php"; ?>

<?php
function getDisplayString($contentIndex)
{
	$showIndex = 1;
	if (isset($_GET['msg']) && $_GET['msg'] > 100 && $_GET['msg'] < 1000) {
		$showIndex = 2;
	}
	if (isset($_GET['msg']) && $_GET['msg'] > 10 && $_GET['msg'] < 100) {
		$showIndex = 3;
	}
	if ($showIndex == $contentIndex) {
		return 'block';
	} else {
		return "none";
	}
}
?>


<link rel="stylesheet" type="text/css" href="./css/adminPannelSection.css">

<body style="background-color: #EEEEEE;">
	<?php include "includes/header.php"; ?>
	<div class="row" style="margin:0">

		<div class="col-md-12 text-center">
			<h1 class="font-80px">Admin Pannel</h1>
		</div>
		<br><br><br>
		<a href="admin_orders.php" class="btn btn-lg btn-success margin-left20"> View all Orders</a>
		<div class="tabs" style="display: inline-block;">
			<?php echo (!isset($_GET['msg']) || $_GET['msg'] < 10) ? '<div id="tab1" class="btn btn-lg btn-success margin-left20 tab active">Add Product</div>' : '<div id="tab1" class="btn btn-lg btn-success margin-left20 tab">Add Product</div>' ?>
			<?php echo (isset($_GET['msg']) && ($_GET['msg'] > 100 && $_GET['msg'] < 1000) ? '<div id="tab2" class="btn btn-lg btn-success margin-left20 tab active">Update discounts</div>' : '<div id="tab2" class="btn btn-lg btn-success margin-left20 tab">Update discounts</div>') ?>
			<?php echo (isset($_GET['msg']) && ($_GET['msg'] > 10 && $_GET['msg'] < 100) ? '<div id=" tab3" class="btn btn-lg btn-success margin-left20 tab active">Delete Product</div>' : '<div id=" tab3" class="btn btn-lg btn-success margin-left20 tab ">Delete Product</div>') ?>

		</div>
		<br><br><br>
		<?php
		if (isset($_GET['msg'])) {
			if ($_GET['msg'] == 1) {
				echo "<h3 class='text-center text-red'><i>Product has been added</i></h3><br>";
			} elseif ($_GET['msg'] == 2) {
				echo "<h3 class='text-center text-red'><i>Product couldnot added</i></h3><br>";
			} elseif ($_GET['msg'] == 11) {
				echo "<h3 class='text-center text-red'><i>Product has been Deleted<i></h3><br>";
			} elseif ($_GET['msg'] == 22) {
				echo "<h3 class='text-center text-red'><i>Product couldnot be Deleted</i></h3><br>";
			} elseif ($_GET['msg'] == 111) {
				echo "<h3 class='text-center text-red'><i>Product discount has been Updated<i></h3><br>";
			} elseif ($_GET['msg'] == 222) {
				echo "<h3 class='text-center text-red'><i>Product discount couldnot be Updated</i></h3><br>";
			}
		}
		?>



		<div class="row">
			<section class=" container">
				<div class="tab-container">

					<div class="tab-content">
						<div data-tab="tab1" style="display: <?php echo getDisplayString(1) ?>">

							<div class="row">
								<div class="col-md-6">
									<h3 class="font-80px">Add a product To Database</h3>
								</div>
								<div class="col-md-6">
									<form action="upload_product.php" method="POST" enctype="multipart/form-data">
										<label>Product Name</label>
										<input type="text" name="product_name" class="form-control"><br>
										<label>Product Price</label>
										<input type="number" name="product_price" class="form-control"><br>
										<label>Product Description</label>
										<textarea name="product_description" class="form-control"></textarea><br>
										<label>Product Discount(%)</label>
										<input type="number" name="product_discount" class="form-control"><br>
										<label>Upload Image</label>
										<input type="file" name="image" class="form-control"><br>
										<input type="submit" value="Add product" class="btn btn-success btn-lg">
									</form>
								</div>
							</div>

						</div>
						<div data-tab="tab2" style="display: <?php echo getDisplayString(2) ?>">

							<div class="row">
								<div class="col-md-6">
									<h3 class="font-80px">Update Product Discounts</h3>
								</div>
								<div class="col-md-6">
									<form action="set_product_discount.php" method="POST">
										<label>Product ID</label>
										<input type="number" name="product_id" class="form-control"><br>
										<label>Product Discount</label>
										<input type="number" name="product_discount" class="form-control"><br>
										<input type="submit" value="Update Discount" class="btn btn-success btn-lg">
									</form>
								</div>
							</div>

						</div>
						<div data-tab="tab3" style="display: <?php echo getDisplayString(3) ?>">
							<div class="row">
								<div class="col-md-6">
									<h3 class="font-80px">Delete a product From Database</h3>
								</div>
								<div class="col-md-6">
									<form action="delete_product.php" method="POST">
										<label>Product ID</label>
										<input type="number" name="product_id" class="form-control"><br>
										<input type="submit" value="Delete Product" class="btn btn-success btn-lg">
									</form>
								</div>
							</div>

						</div>
					</div>
				</div>
			</section>
		</div>


	</div>
	<script src="./js/aboutUsChangeTab.js"></script>
</body>

</html>