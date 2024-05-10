<?php
session_start();
 include "includes/css_header.php";
 include "includes/header_postlogin.php";
 include "includes/dbconnect.php";
 ?>

<!DOCTYPE html>
<html>
<body style="background-image: url('images/background2.jpg')!important;">
    <div class="Game">
    
        <h2 class="Title" style="margin:20px ; ">Interactive Games</h2>
  
        
  <div style="display: flex; justify-content: center;">
     <div style="width: 400px; margin-left:20px; margin-right: 20px; margin-bottom:20px;">
        <a href="memory_game/game_index.html">
           <img src="images/game1.jpg" alt="Image 1" style="width: 100%;">
        </a> 
        <h3 style="justify-content:center; text-align: center;">Fruit Memory Game</h3>
     </div>
     <div style="width: 400px;margin-bottom:20px;">
        <a href="https://gd.games/instant-builds/c6232854-876b-49e2-895b-93a38ab10364">
           <img src="images/game2.png" alt="Image 2" style="width: 100%;">
        </a>
        <h3 style="justify-content:center; text-align: center;">Strawberry Adventure</h3>
     </div>
  </div>
 <?php include "includes/footer.php";?>
</body>
</html>
