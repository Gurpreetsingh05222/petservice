<?php
   
   include "config.php";

   $query = "SELECT * FROM users";

   $result = mysqli_query($connection, $query);

   $num = mysqli_num_rows($result);

?> 

 <!DOCTYPE html>
 <html>
 <head>
 	<title>View</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 </head>
 <body>
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
                <a class="navbar-brand" href="index.html#service">Pet Service</a>
                
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.html#service">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.html#about">About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.html#prices">Prices</a>
                    </li>
                  </ul>
        </nav>
 <h1 class="text-center">Your info</h1>
	 <table class="table">
	 	<tr>
	 		<th scope="col">Name</th>
	 		<th scope="col">Email</th>
	 		<th scope="col">Phone</th>
	 		<th scope="col">Address</th>
	 		<th scope="col">City</th>
	 		<th scope="col">Country</th>
	 		<th scope="col">Service</th>
	 	</tr>
	 	<?php
            for($i = 1; $i <= $num; $i++){
            	$row = mysqli_fetch_array($result);

            	?>
            	<tr>
            		<td><?php echo $row['u_name']; ?></td>
            		<td><?php echo $row['email']; ?></td>
            		<td><?php echo $row['phone']; ?></td>
            		<td><?php echo $row['u_address']; ?></td>
            		<td><?php echo $row['city']; ?></td>
            		<td><?php echo $row['country']; ?></td>
            		<td><?php echo $row['u_service']; ?></td>
            	</tr>

        <?php
            }
	 	?>
	 </table>
	 <footer style="text-align:center;">Pet Service &copy; 2018</footer>
 </body>
 </html>