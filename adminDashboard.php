<?php
  require('template/navbar.php'); 
  
  session_start();

  // If logged in as user 
  if(isset($_SESSION['username'])){
    session_destroy();
    header("Location: index.php?admin=no");
    exit();
  }

  // If not logged in as admin
  else if(!isset($_SESSION['adminName'])){
    header("Location: admin.php?admin=no");
    exit();
  }
  ?>

<div class="container">

<form action="includes/signup.php" method="POST">

    <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Enter username" name="username">
    </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
    </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter phone" name="phone">
    </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter address" name="address">
    </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    </div>

  <div class="form-check">
  &nbsp;
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>

 <!-- Logout button  -->
 <form action="includes/logout.php" method="post" style="margin-top: 2vh;">
          <button class="btn btn-info" type="submit" name="submitLogout">Logout</button>
  </form>

</div>
</div>