<?php

   include "config.php";

   $query = "SELECT * FROM users";

   $result = mysqli_query($connection, $query);

   $num = mysqli_num_rows($result);

?> 

<!DOCTYPE html>
<html>
    <head>
        <title>Pet Service</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/index.css">
    </head>
  
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="#head">Pet Service</a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#.navbar">Home</a></li>
                  <li><a href="form.php">Become a Sitter</a></li>
                </ul>
              </div>
            </div>
        </nav>
          
          <h3 id="head" class="text-center">These services are available</h3>
            <div id="display">
            <?php
                    for($i = 1; $i <= $num; $i++){
                      $row = mysqli_fetch_array($result);
                ?>
            <div class="displayItem">
                  <img class= "img" src="upload/<?php echo $row['u_image']; ?>" alt="Dog pic">
                  <p>Service: <strong><?php echo $row['u_service']; ?></strong></p>
                  <p>City: <?php echo $row['city']; ?></p>
                  <p>Country: <?php echo $row['country']; ?></p>
                  <p>Price: $<?php echo $row['charge']; ?></p>
            </div>
            <?php
                    }
            ?>
            </div>
            <div id="footer">
              <p style="font-size:200%;">Want to be a Pet walker. Please click button below and fill out the form.</p>
              <a href="form.php"><button class="btn btn-primary">List your services</button></a>
              <footer>Pet Service &copy; 2018</footer>
            </div>
    </body>
 </html>