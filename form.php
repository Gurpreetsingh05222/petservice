<?php
$emailErr = "";
$phoneErr ="";

if(isset($_POST['submit'])){
  
    include_once 'config.php';

	$name = mysqli_real_escape_string($connection, $_POST['name']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$phone = mysqli_real_escape_string($connection, $_POST['phone']);
	$address = mysqli_real_escape_string($connection, $_POST['address']);
	$city = mysqli_real_escape_string($connection, $_POST['city']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    $service = $_POST['service'];

    
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = "Invalid Email";
    } elseif(!preg_match("/^[0-9]{10}$/", $phone)){
        $phoneErr = "Invalid phone";
    }
    else{
    $sql = "INSERT INTO users(u_name, email, phone, u_address, city, country, u_service) VALUES('$name', '$email' , '$phone', '$address', '$city', '$country', '$service')";
        $status = mysqli_query($connection, $sql);
        header("Location: displayform.php");
    }
}else{
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Pet Service</title>
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
    <h1>Please fill out the form</h1>
    <div id="form">
        <form method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Please enter your name" required>
            
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email"><span style="color:red;"><?php echo $emailErr; ?></span>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" class="form-control" name="phone" placeholder="Phone number" required><span style="color:red;"><?php echo $phoneErr; ?></span>
        </div>

        <div class="form-group">
            <label for="name">Address</label>
            <input type="text" class="form-control" name="address" placeholder="Please enter your address" required>
            
            <label for="name">City</label>
            <input type="text" class="form-control" name="city" placeholder="Please enter your city" required>
            
            <label for="name">Country</label>
            <input type="text" class="form-control" name="country" placeholder="Please enter your country" required>
            
            <label for="radio">Please select service you need.</label><br>
            <select name="service">
            <option name="service" value="Dog Hostel">Dog Hostel</option>
            <option name="service" value="Dog Walking">Dog Walking</option>
            <option name="service" value="Dog Grooming">Dog Grooming</option>
            </select> 
        </div>
        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button><br><br>
        </form>
    </div>
    <footer>Pet Service &copy; 2018</footer>
</body>
</html>