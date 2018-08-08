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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/displayform.css">
        </head>
        <body>
          <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
            <a class="navbar-brand" href="index.php#service">Pet Service</a>
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php#service">Home</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="index.php#work">How it works</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="displayform.php">Find a Sitter</a>
              </li>
            </ul>
          </nav>
          <?php
              for($i = 1; $i <= $num; $i++){
                $row = mysqli_fetch_array($result);
          ?>
              <h2>
                <?php echo $row['u_name']; ?>
              </h2>
              <p>
                <?php echo $row['email']; ?>
              </p>
              <img src="upload/<?php echo $row['u_image']; ?>" alt="">
              <p><?php echo $row['content']; ?></p>
              <hr>
          <?php
                }
          ?>
          <footer style="text-align:center;">Pet Service &copy; 2018</footer>
    </body>
 </html>