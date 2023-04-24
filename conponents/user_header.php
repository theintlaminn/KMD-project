<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<header class="header">

<section class="flex">

    <a href="home.php" class="logo">🍔FooDie🥤</a>

    <nav class="navbar">
        <a href="a.html">HOME</a>
        <a href="AboutUs.html">ABOUT</a>
        <a href="menu.html">MENU</a>
        <a href="order.html">ORDERS</a>
        <a href="contact.html">CONTACT US</a>
    </nav>

    <div class="icons">
    <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
        <i class="fas fa-search" id="search-icon"></i>
        <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_items; ?>)</span></a>
        <a href="user_register.html"><i class="fa-solid fa-user"></i></a>
        <!-- <div id="user-btn" class="fas fa-user"></div> -->
        <div id="menu" class="fas fa-bars"></div>
    </div>
    <div class="search-box">
        <input type="search" name="" id="" placeholder="Search Here........">
    </div>
    <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p>
         <div class="flex">
            <a href="profile.php" class="btn">profile</a>
            <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         </div>
         <p class="account">
            <a href="login.php">login</a> or
            <a href="register.php">register</a>
         </p> 
         <?php
            }else{
         ?>
            <p class="name">please login first!</p>
            <a href="login.php" class="btn">login</a>
         <?php
          }
         ?>
      </div>


</section>

</header>