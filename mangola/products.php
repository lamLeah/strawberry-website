<?php
session_start();

if (!(isset($_SESSION['name']) && isset($_SESSION['email']))) {
  header('Location: register.php');
}
include "includes/dbconnect.php";
?>

<!DOCTYPE html>
<html>
<?php include "includes/css_header.php";
if (($_SESSION['email'] == "admin@strawberryHeaven.com")) {
  include "includes/header_admin.php";
} else {
  include "includes/header_postlogin.php";
}
?>
<link rel="stylesheet" type="text/css" href="./css/aboutUsSection.css">

<body style="background-image: url('images/background2.jpg')!important;">


  <div class="container ">
    <h1 class="text-center font-80px margin-bottom50"> <b>Welcome <?php echo $_SESSION['name']; ?>! Aj Kya khaoge?</b></h1>

    <!--All products with 3/12 parts each-->
    <div class="row">
      <?php
      $query = "SELECT * FROM `products`";
      $result = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-md-3">
                  <div class="product-tab">
                    <img src="images/' . $row['product_image'] . '" class="img-size curve-edge">
                    <h3 class="text-center"><b>' . $row['product_name'] . '</b></h3>'
          . ($row['product_discount'] > 0 ? '<h4 class="text-center" style="color: red"><b>!!!Discount: ' . $row['product_discount'] . '% off</b></h4>' : '') .
          '<p class="justify"><b><i> &nbsp&nbsp&nbsp&nbsp ' . $row['product_description'] . '</i></b></p>
                    <a href="product_description.php?product_id=' . $row['product_id'] . '" class="btn btn-block btn-success"> View Details </a>
                  </div>
                </div>';
      }
      ?>

    </div> <!--Products dispaly Ends-->

    <div class="row">

      <!--Bio-Section in 10/12 parts-->


      <div class="col-md-10">
        <div class="col-md-12" style="padding: 0; margin:12px 0">
          <img src="images/wallpaper1.jpg" class="img-size-lg">
        </div>
        <div class="row ">
          <section class="container">
            <div class="tab-container">
              <div class="tabs">
                <div id="tab1" class="tab active">About us</div>
                <div id="tab2" class="tab">Return or Exchange</div>
                <div id="tab3" class="tab">Express</div>
              </div>
              <div class="tab-content">
                <div data-tab="tab1" style="display: block">
                  <div class="col-md-12 bio-tab">
                    <div class="row">
                      <div class="col-md-4">
                        <img src="images/website_logo.jpeg" class="img-size img-circle" style="object-fit: none;">
                      </div>

                      <div class="col-md-8">
                        <h1 class="text-center"> <b>About StrawberryHeaven.com</b> </h1>
                        <p>&nbsp&nbsp&nbsp&nbsp<b><i>Online Strawberry Shopping Site <b>Strawberry Heaven</b>'s vision is to create the world's most reliable, frictionless commerce ecosystem, creating life-changing experiences for buyers and sellers.StrawberryHeaven.com is the world's largest online strawberry shopping marketplace. An online shopping trend is becoming a household name and so is <b>Strawberry Heaven</b>.
                            </i></b></p>
                      </div>
                    </div>
                  </div>


                </div>
                <div data-tab="tab2" style="display: none">
                  <h2>Return or Exchange Policy:</h2>
                  <p>
                  <ol>
                    <li><b>Eligibility: </b>We accept returns or exchanges within 7 days of the delivery date. To be eligible, the strawberries must be in their original packaging and in the same condition as when they were received. Please note that perishable items, such as fresh strawberries, cannot be returned or exchanged if they have been consumed or mishandled.</li>
                    <li><b>Initiating a Return or Exchange: </b>If you wish to initiate a return or exchange, please contact our customer support team within the specified timeframe. Provide your order details and the reason for the return or exchange. Our team will guide you through the process and provide you with a return authorization.</li>
                    <li><b>Return Shipping: </b>When returning strawberries, please ensure they are securely packaged to prevent damage during transit. We recommend using a reliable shipping service with tracking capabilities. The cost of return shipping will be your responsibility, unless the return is due to an error on our part.</li>
                    <li><b>Refunds or Exchanges: </b>Once we receive the returned strawberries and verify their condition, we will process your refund or exchange. If you opted for a refund, it will be issued using the original payment method within a specified timeframe. In the case of an exchange, we will ship the replacement strawberries to you as soon as possible.</li>
                    <li><b>Quality Concerns: </b>If you believe the strawberries you received are of subpar quality or not as described, please provide detailed information and supporting evidence. We take such concerns seriously and will investigate the issue promptly. Depending on the circumstances, we may offer a refund, exchange, or store credit.</li>

                  </ol>
                  </p>
                </div>
                <div data-tab="tab3" style="display: none">
                  <h2>Express Policy:</h2>
                  <p>
                  <ol>
                    <li><b>Express Delivery: </b>We understand that you may have a craving for delicious strawberries that cannot wait. That's why we offer express delivery services for selected areas. If you are in an eligible location, you can choose the express delivery option during the checkout process to receive your strawberries within a shorter timeframe.
                    </li>
                    <li><b>Cut-Off Times: </b>To avail of express delivery, please ensure you place your order before the specified cut-off time. Orders received after the cut-off time will be processed and shipped on the following business day. The exact cut-off time will be clearly communicated on our website and during the checkout process.
                    </li>
                    <li><b>Delivery Charges: </b>Express deliveries may be subject to additional delivery charges due to the expedited nature of the service. The exact charges will be displayed during the checkout process, allowing you to review and confirm before completing your order.
                    </li>
                    <li><b>Tracking and Notifications: </b>For express deliveries, we provide detailed tracking information so you can monitor the progress of your order. You will receive notifications via email or SMS regarding the status of your delivery, including estimated arrival times and any updates or delays that may occur.
                    </li>
                    <li><b>Availability and Coverage: </b>Please note that express delivery services may not be available in all areas. We strive to expand our coverage, but there may be certain locations that are not eligible for express delivery due to logistical constraints. During the checkout process, you will be informed if express delivery is available for your address.
                    </li>

                  </ol>
                  </p>
                </div>
              </div>
            </div>
          </section>




        </div>

      </div>



      <!--List of items in 2/12 parts-->
      <div class="col-md-2">
        <h2 class="text-center"><b>Chart Menu</b></h2>
        <div class="row">
          <?php
          $query1 = "SELECT * FROM `products`";
          $result1 = mysqli_query($connection, $query);
          while ($row1 = mysqli_fetch_assoc($result1)) {
            echo '<div class="col-md-12">
                    <div class="row list hover-pink">
                      
                      <div class="col-md-6">
                        <a href="product_description.php?product_id=' . $row1['product_id'] . '">
                        <img src="images/' . $row1['product_image'] . '" class="img-size-xs">
                        </a>
                      </div>

                      <div class="col-md-6">
                        <b>' . $row1['product_name'] . '</br><br>
                        <small>₹.' . $row1['product_price'] . '/Kg</small>
                      </div>

                    </div>            
                  </div>';
          }
          ?>
        </div>
      </div>
    </div>

    <?php include "includes/footer.php"; ?>

  </div>
  <script src="./js/aboutUsChangeTab.js"></script>
</body>

</html>