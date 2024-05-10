<html>
<?php
session_start();

if (!(isset($_SESSION['name']) && isset($_SESSION['email']))) {
	header('Location: register.php');
}
include "includes/css_header.php";
include "includes/dbconnect.php";
?>
<link rel="stylesheet" type="text/css" href="./css/reviews.css">

<body style="background-color: #EEEEEE;">
	<?php include "includes/header_postlogin.php";
	$product_id = $_GET['product_id'];
	$query = "SELECT * FROM `products` WHERE `product_id` LIKE '$product_id'";
	$results = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($results);

	if (isset($_GET['msg'])) {
		if ($_GET['msg'] == 1) {
			echo "<h4 class='text-center text-red'><i>Added to cart</i></h4><br>";
		} elseif ($_GET['msg'] == 2) {
			echo "<h4 class='text-center text-red'><i>You have Already added this to cart</i></h4><br>";
		} elseif ($_GET['msg'] == 11) {
			echo "<h4 class='text-center text-red'><i>Added to Wishlist</i></h4><br>";
		} elseif ($_GET['msg'] == 22) {
			echo "<h4 class='text-center text-red'><i>You have Already added this to Wishlist</i></h4><br>";
		} else {
			echo "<h4 class='text-center text-red'><i>Some error occured!</i></h4>";
		}
	}
	echo '<div class="container">
			        	<div class="row padding30">  
			          		<div class="col-md-6">
			                	<div class="product-tab">
				           	  		<img src="images/' . $row['product_image'] . '" class="img-size-lg">
				            	</div>
					    	</div>
				      	   	<div class="col-md-6">
				      	   		<div class="product-tab">
					                <h1 class="text-center"> ' . $row['product_name'] . '</h1>
					                <p> &nbsp&nbsp&nbsp&nbsp ' . $row['product_description'] . '<br><br> 
													<b>&nbsp&nbsp&nbsp&nbspPrice:</b>'
		. ($row['product_discount'] > 0 ?
			'<span style="text-decoration: line-through; color: #b9b0b0; font-size: small">₹' . $row['product_price'] . '/Kg</span> <b>₹' . $row['product_price'] * (1 - $row['product_discount'] / 100) . '/Kg</b>'
			: '<b>₹' . $row['product_price'] . '/Kg</b>') .
		'<br><br></p> 
					                <a href="add_to_cart.php?product_id=' . $product_id . '" class="btn btn-lg btn-danger"> Add to Cart </a>
					                <a href="add_to_wishlist.php?product_id=' . $product_id . '" class="btn btn-lg btn-danger"> Add to Wishlist </a>
				                </div>
				           	</div>
				        </div>
				    </div>';
	?>
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center"> TOP REVIEWS</h1>
		</div>
	</div>

	<!-- review brief -->
	<div class="review-container">
		<!-- --d是自定义属性,可通过var函数对其调用 -->

		<?php
		$query1 = "SELECT * FROM `reviews` r JOIN `users` u ON r.`user_id`=u.`user_id` WHERE r.`product_id` LIKE '$product_id'";
		$result1 = (mysqli_query($connection, $query1));
		$reviewIndex = 0;
		while ($reviewIndex < 5 && $result1) {
			while ($reviewIndex < 5 && $row1 = mysqli_fetch_assoc($result1)) {
				echo '<div class="card" style="--d:' . ($reviewIndex - 1) . ';">
				<div class="content">
					<div class="img">
					<img src="' . $row1['user_profile_image'] . '" alt="">
					</div>
					<div class="detail">
						<span>' . $row1['name'] . '</span>
						<p>' . $row1['review_heading'] . '</p>
					</div>
				</div>
				<a href="#" onmouseover="viewReviewDetails(this)" class="details-btn" onmouseout="hideReviewDetails(this)">Details</a>

				<div class="col-md-6 review-details" style="display:none;">
					<div class="product-tab margin-left20 "> 
						<h4>' . $row1['review_text'] . ' </h4>
					</div>
				</div>
			</div>';
				$reviewIndex++;
			}
			$result1->data_seek(0);
		}
		?>
	</div>

	<!-- review details -->


</body>
<script>
	function viewReviewDetails(e) {
		const parentEle = e.parentNode;
		const reviewDetails = parentEle.querySelector('.review-details');
		reviewDetails.style.display = 'block';
	}

	function hideReviewDetails(e) {
		const parentEle = e.parentNode;
		const reviewDetails = parentEle.querySelector('.review-details');
		reviewDetails.style.display = 'none';
	}
</script>

</html>