<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="products.php" class="navbar-brand text-white">Strawberry Heaven</a>
    </div>


    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav-menu clearfix unstyled pull-right">
        <li><a href="products.php" class="three-d">
            Home
            <span class="three-d-box"><span class="front">Home</span><span class="back">Home</span></span>
          </a></li>
        <li><a href="show_cart_items.php" class="three-d">
            Cart
            <span class="three-d-box"><span class="front">Cart</span><span class="back">Cart</span></span>
          </a></li>
        <li><a href="show_wishlist_items.php" class="three-d">
            Wishlist
            <span class="three-d-box"><span class="front">Wishlist</span><span class="back">Wishlist</span></span>
          </a></li>
        <li><a href="show_order_items.php" class="three-d">
            Orders
            <span class="three-d-box"><span class="front">Orders</span><span class="back">Orders</span></span>
          </a></li>
        <li><a href="game_page.php" class="three-d">
            Game
            <span class="three-d-box"><span class="front">Game</span><span class="back">Game</span></span>
          </a></li>
        <li><a href="javascript:;" class="three-d">
            Home
            <span class="three-d-box"><span class="front"><?php echo $_SESSION['name']; ?></span><span class="back"><?php echo $_SESSION['name']; ?></span></span></a>
          <ul class="clearfix unstyled drop-menu">
            <li><a href="admin.php" class="three-d">
                Products Management
                <span class="three-d-box"><span class="front">Products Management</span><span class="back">Products Management</span></span>
              </a></li>
            <li><a href="logout.php" class="three-d">
                Logout
                <span class="three-d-box"><span class="front">Logout</span><span class="back">Logout</span></span>
              </a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php include "mobile_header.php" ?>