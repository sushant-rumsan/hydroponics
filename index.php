<?php
  require('template/navbar.php'); ?>

      <!-- Left image  -->
        <div class="row">
          <div class="col-sm" style="background-color: #1f8ede; height: 92vh;">
          </div>
      <!-- Login space  -->
      <div class="col-sm">
      <div class="card text-center">
                
      <div class="card-body">
          <h5 class="card-title">Login</h5>
          <form action="includes/login.php" method="POST">
          
          <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="username">
          <small id="emailHelp" class="form-text text-muted">&nbsp;</small>
          </div>

          <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
          </div>
          <div class="form-check"> &nbsp; </div>

          <!-- <button type="submit" class="btn btn-primary" name="submit">Login</button> -->
          <a href="/dashboard"><h5>Login</h5></a>
          <p>Enter any username or password to login, demo propose only, needs hardware connection for functioning.</p>
          </form>
      </div>
      </div>

<div class="card" style="width: 100%; margin-top: 5vh;">
  <div class="card-body">
    
    <p class="card-text">
      <ul>
        <!-- <li> <b> How to apply for new farm? </b> </li>
        <p>Visit apply section by clicking apply menu in navbar, fill required details.</p>
        
        <p>To know more about hydroponics management system, visit our about us page.</p> -->

        <!-- <p><b>To do list</b></p>
        <li>Insert a row of username in variable data</li>
        <li>Variable data of a user deleted after 10 data (100 sec), 1 data per 10 second and average is stored in another table (100 second average)</li>
        <li>100 second average of a user saved in another database</li>
        <li>100 second average data of a user deleted after 10 data (1000 second) and average is stored in another tabe (average half hourly data)</li>
        <li>Average half hourly data of a user saved in another database</li>
        <li>Average half hourly data of a user deleted after 48 data (24 hours) and average is stored in another permanent table (Daily average data)</li>
        <li>Send email when error for long time</li>
        <li>Chart of daily average</li>
        <li>Error table</li> -->
      </ul>
    </p>
   
  </div>
</div>
</div>


</div>




        
</div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>