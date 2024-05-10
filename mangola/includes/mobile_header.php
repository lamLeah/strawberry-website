<nav class="mobile-menu">
  <ul class="menus">
    <li class="li">
      <a href="products.php">
        Home
      </a>
    </li>
    <li class="li">
      <a href="show_cart_items.php">
        Cart
      </a>
    </li>
    <li class="li">
      <a href="show_wishlist_items.php">
        Wishlist
      </a>
    </li>
    <li class="li">
      <a href="show_order_items.php">
        Orders
      </a>
    </li>
    <li class="li">
      <a href="game_page.php">
        Game
      </a>
    </li>
    <li class="li">
      <?php echo $_SESSION['name']; ?>
      <ul>
        <li> <a href="admin.php">
            Products Management
          </a></li>
        <li><a href="logout.php">
            Logout
          </a></li>
      </ul>
    </li>
  </ul>
</nav>