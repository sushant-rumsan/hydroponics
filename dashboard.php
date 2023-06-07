<?php
  require('template/navbar.php'); 
  
  session_start();
  //If no one is logged in
  // if(!isset($_SESSION['username'])){
  //   header("Location: index.php?user=nologin");
  //   exit();
  // }

  // //If someone is logged in
  // else{
  //   $username = $_SESSION['username'];
  //   echo '<script>
  //   document.getElementById("navbar").innerHTML = "'.$username.'";
  // </script>';
  // }
  ?>

    <div class="container" style="margin-top: 2vh;">
    <h2>Hardware connection is required for live data feed.</h2>
    <p>Flow rate of water, PH and Temperature is shown in table below.</p>
    <p>Can control motor to add and subtract pH with Add PH & Subtract PH button.</p>
    <p>Can turn on fan or heater with start cooling and start heating button.</p>
    <br/>
    <br/>
    <div class="row">
                <!-- First table  -->
                <div class="col-sm">
                <table class="table">
                <h3>Flow</h3>
                <p> <b>Required:</b>(2 - 4) 
        <b> Overflow</b>(Greater than 5)
        <b> Underflow</b>(Less than 2)
        <b> No flow</b>(0) </p>
                <thead class="thead-dark">
                <!-- First table heading  -->
                  <tr>
                  <th scope="col">Time</th>
                  <th scope="col">Flow Rate (ml/s)</th>
                  <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody id = "tableBody">
                <!-- First table body, inserted with JS  -->
                </tbody>                
              </table>
              </div>

              <!-- Second table  -->
              <div class="col-sm">
                <table class="table">
                <h3>PH</h3>
                <p> <b>Required:</b>(5 - 6) 
        <b> High PH</b>(Greater than 6)
        <b> Low PH</b>(Less than 5)</p>
                <thead class="thead-dark">
                <!-- Second table heading  -->
                  <tr>
                  <th scope="col">Time</th>
                  <th scope="col">PH</th>
                  <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody id = "tableBody2">
                <!-- Second table body, inserted with JS  -->
                </tbody>
                </table>
              <a href="#" class="btn btn-secondary" onClick=ledOn()>Add PH</a>
              <a href="#" class="btn btn-secondary" onClick=ledtOn()>Subtract PH</a>
              </div>

                <!-- Third table  -->
              <div class="col-sm">
                <table class="table">
                <h3>Temperature</h3>
                <p> <b>Required:</b>(22 - 30) 
        <b> High temperature</b>(Greater than 30)
        <b> Low temperature</b>(Less than 22)</p>
                <thead class="thead-dark">
                <!-- Third table heading  -->
                  <tr>
                  <th scope="col">Time</th>
                  <th scope="col">Temperature(Celcius)</th>
                  <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody id = "tableBody3">
                <!-- Third table body, inserted with JS  -->
                </tbody>
                </table>
                </table>
              <a href="#" class="btn btn-secondary" onClick=ledzOn()>Start cooling</a>
              <a href="#" class="btn btn-secondary" onClick=ledzOff()>Stop cooling</a>
              </div>

            </div>
            </div>

        <!-- Logout and footer container  -->
        <div class="container" style="margin-top: 4vh;">
        <!-- Logout button  -->
        <form action="includes/logout.php" method="post">
          <button class="btn btn-info" type="submit" name="submitLogout">Logout</button>
        </form>
      
        

        </div>
        <!-- Logout and footer container end -->

        </div> <!-- Overlay container end -->


        <script type="text/javascript">    
        // Select body of 3 tables
        var table = document.getElementById('tableBody'); // Select body of first table
        var table2 = document.getElementById('tableBody2'); // Select body of second table
        var table3 = document.getElementById('tableBody3'); // Select body of second table

        // Initial loading data text
        table.innerHTML = "Loading flow data...";
        table2.innerHTML = "Loading ph data...";
        table3.innerHTML = "Loading temperature data...";

     
        setInterval(loadData, 6000); // Call the ajax function every second
        var count = 0; // Counter for waterflow


        // Ajax function
        function loadData(){
          fetch('http://localhost/project/emailCheck.php');
          var xhr = new XMLHttpRequest(); // Create http request
          xhr.open('GET', 'jsonData.php', true); // Get data from jsonData.php
          xhr.onload = function(){ 
              if(this.status == 200){
                var data = JSON.parse(this.responseText); // Convert response text to JSON                
                table.innerHTML = ' '; //Empty first table after each iteration
                table2.innerHTML = ' '; //Empty second table after each iteration                
                table3.innerHTML = ' '; //Empty second table after each iteration               
                for(var i = 0; i < 5; i++){ 
                    var time = data[i].time;  // Time same for all table    
                    // Background color and text for status for first table
                    if (data[i].Flowrate > 4){
                        var color = '#3458eb';
                        var text = 'Overflow';
                      }
                    else if (data[i].Flowrate < 2){
                        var color = '#f20c51';
                        var text = 'Underflow';
                    }
                    else{
                        var color = '#2dd932';
                        var text = 'Normal';
                      }
                    // Insert into first table
                    var row = `<tr>
                            <td>${time}</td>
                            <td>${data[i].Flowrate}</td>
                            <td style='background-color: ${color}' class='animate'><span id='text'>${text}</span></td>
                            </tr>`;
                    table.innerHTML += row;

                    // Background color and text for status for second table
                    if (data[i].PH > 5 && data[i].PH < 6){
                        var color = '#2dd932';
                        var text = 'Normal PH';
                        }
                    else if(data[i].PH <= 5){
                        var color = '#2dd932';
                        var text = 'Normal PH';
                    }
                    else{
                        var color = '#2dd932';
                        var text = 'Normal PH'; 
                        }
                    // Insert into second table
                    var row2 = `<tr>
                            <td>${time}</td>
                            <td>${data[i].PH}</td>
                            <td style='background-color: ${color}' class='animate'>${text}</td>
                            </tr>`;
                    table2.innerHTML += row2;

                    // Background color and text for status for third table
                    if (data[i].Temperature > 22 && data[i].Temperature < 30){
                        var color = '#2dd932';
                        var text = 'Normal';
                        }
                        else if(data[i].Temperature < 22){
                        var color = '#f20c51';
                        var text = 'Low';
                        }
                        else{
                        var color = '#f20c51';
                        var text = 'High';
                        }
                    // Insert into third table
                    var row3 = `<tr>
                            <td>${time}</td>
                            <td>
                            ${data[i].Temperature}
                            </td>
                            <td style='background-color: ${color}' class='animate'>${text}</td>
                            </tr>`;
                    table3.innerHTML += row3;

                    }
                    }
          }
          xhr.send();
      }

      // Turning LED On and Off function 
            // First LED
            function ledOn(){
            fetch('http://192.168.1.178/ledon');
            setTimeout(() => {
              fetch('http://192.168.1.178/ledoff');
            }, 5000);
            }
            // Second LED 
            function ledtOn(){
              fetch('http://192.168.1.178/ledton');
              setTimeout(() => {
              fetch('http://192.168.1.178/ledtoff');
            }, 5000);
            }
            // Third LED 
            function ledzOn(){
              fetch('http://192.168.1.178/ledzon');
            }
            function ledzOff(){
              fetch('http://192.168.1.178/ledzoff');
            }

      </script>