<?php
  require('template/navbar.php'); 
  session_start();

  //If no one is logged in
  if(!isset($_SESSION['username'])){
    header("Location: index.php?user=nologin");
    exit();
  }

  //If someone is logged in
  else{
    $username = $_SESSION['username'];
    echo '<script>
    document.getElementById("navbar").innerHTML = "'.$username.'";
  </script>';
  }

  // Connecting to database 
  require ('config/database.php');

  //Load data from database
  $sql = "SELECT * from variabledata ORDER BY id DESC";
  $result = mysqli_query($conn, $sql);
 
  ?>
  
      <!-- Cards  -->
      <div class="container" style="margin-top: 2vh;">
        <div class="row">

                <!-- First table  -->
                <div class="col-sm">
                <table class="table">
                <h3>Flow</h3>
                <thead class="thead-dark">
                <!-- First table heading  -->
                  <tr>
                  <th scope="col">Time</th>
                    <th scope="col">Flow rate (li/s)</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <!-- First table body  -->
                <?php  
                // Print flow data from database in table
                // Counter to print only 5 values
                $counter = 0;
                while($row = mysqli_fetch_assoc($result)) {
                if ($counter > 5){
                  // Breaks only loop one step outside
                  break 1;
                }
                else{
                echo "<tr>";
                echo "<td>". $row['time']."</td>";
                echo "<td>".$row['flowrate']."</td>";
                // Color and text of status
                if($row['flowrate'] >= 36 ){
                  $color = '#2dd932';
                  $text = 'Good';
                }
                else{
                  $color = '#f20c51';
                  $text = 'Bad';
                }
                echo " <td style='background-color: ".$color.";'>".$text."</td>";
                echo "</tr>";
                $counter++;
                }}
                ?>
                </tbody>
              </table>
              <a href="#" class="btn btn-primary">View history</a>
              <a href="#" class="btn btn-secondary">Today's error</a>
              </div>              

              <!-- Second table  -->
              <div class="col-sm">
                <table class="table">
                <h3>PH meter</h3>
                <thead class="thead-dark">
                <!-- Second table heading  -->
                  <tr>
                  <th scope="col">Time</th>
                    <th scope="col">PH reading</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <!-- Second table body  -->
                <?php  
                // Counter to print only 5 values
                $counter = 0;
                $result2 = mysqli_query($conn, $sql);                
                // Print ph from database in table
                while($row = mysqli_fetch_assoc($result2)) {
                if ($counter > 5){
                // Breaks only loop one step outside
                break 1;
                }
                else{
                echo "<tr>";
                echo "<td>". $row['time']."</td>";
                echo "<td>".$row['ph']."</td>";
                // Color and text of status
                if($row['ph'] > 5 && $row['ph'] < 8){
                  $color = '#2dd932';
                  $text = 'Good';
                }
                else{
                  $color = '#f20c51';
                  $text = 'Bad';
                }
                echo " <td style='background-color: ".$color.";'>".$text."</td>";
                echo "</tr>";
                $counter++;
                }}
                ?>
                </tbody>
              </table>
              <a href="#" class="btn btn-primary">View history</a>
              <a href="#" class="btn btn-secondary">Today's error</a>
              </div>

              <!-- Third table  -->
              <div class="col-sm">
                <table class="table">
                <h3>Temperature</h3>
                <thead class="thead-dark">
                <!-- Third table heading  -->
                  <tr>
                  <th scope="col">Time</th>
                    <th scope="col">Temperature reading</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <!-- Third table body  -->
                <?php  
                // Counter to print only 5 values
                $counter = 0;
                $result3 = mysqli_query($conn, $sql);                
                // Print temperature from database in table
                while($row = mysqli_fetch_assoc($result3)) {
                if ($counter > 5){
                // Breaks only loop one step outside
                break 1;
                }
                else{
                echo "<tr>";
                echo "<td>". $row['time']."</td>";
                echo "<td>".$row['temperature']."</td>";
                // Color and text of status
                if($row['temperature'] > 22 && $row['temperature'] < 28){
                  $color = '#2dd932';
                  $text = 'Good';
                }
                else{
                  $color = '#f20c51';
                  $text = 'Bad';
                }
                echo " <td style='background-color: ".$color.";'>".$text."</td>";
                echo "</tr>";
                $counter++;
                }}
                ?>
                </tbody>
              </table>
              <a href="#" class="btn btn-primary">View history</a>
              <a href="#" class="btn btn-secondary">Today's error</a>
              </div>
          
          <!-- Row end  -->
          </div>
          <!-- Container end  -->
          </div>
          
        <!-- Logout and footer container  -->
        <div class="container" style="margin-top: 4vh;">
        <!-- Logout button  -->
        <form action="includes/logout.php" method="post">
          <button class="btn btn-info" type="submit" name="submitLogout">Logout</button>
        </form>
        <!-- Footer text  -->
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit dolorum impedit esse amet reiciendis ullam vero est, ab inventore modi at porro pariatur quam sint iure, harum aperiam eum praesentium! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim beatae veniam in aliquam ut accusamus nesciunt, necessitatibus aperiam optio vitae ea debitis exercitationem quod tenetur ipsam, odit dolor temporibus tempora?
        </div>
        <!-- Logout and footer container end -->
     
    <!-- Overlay container end  -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">

    </script>
</body>
</html>