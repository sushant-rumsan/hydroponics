<?php
  require('template/navbar.php'); 
?>
    <div class="container">
        <h3 style="margin-top: 5vh;">Admin login</h3>
        <p>Admin should also check application of building new farm</p>

        <form action="includes/adminLogin.php" method="POST">
          <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" name="username">
          <small id="emailHelp" class="form-text text-muted">&nbsp;</small>
          </div>

          <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
          </div>
          <div class="form-check"> &nbsp; </div>

          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        </div>