<?php include "css_header.php";
if (($_SESSION['email'] == "admin@strawberryHeaven.com")) {
  include "includes/header_admin.php";
} else {
  include "includes/header_postlogin.php";
}
