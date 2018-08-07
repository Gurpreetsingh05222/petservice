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
    $content = mysqli_real_escape_string($connection, $_POST['content']);
    $u_image = $_FILES['image']['name'];
    $u_image_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($u_image_temp, "upload/$u_image" );

    
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = "Invalid Email";
    } elseif(!preg_match("/^[0-9]{10}$/", $phone)){
        $phoneErr = "Invalid phone";
    }
    else{
    $sql = "INSERT INTO users(u_name, email, phone, u_address, city, country, u_service, content, u_image) VALUES('$name', '$email' , '$phone', '$address', '$city', '$country', '$service' ,'$content', '$u_image')";
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
                <a class="navbar-brand" href="index.php#.navbar">Pet Service</a>
                
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php#.navbar">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php#work">How it works</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="displayform.php">Find a Sitter</a>
                    </li>
                  </ul>
        </nav>
    <h1>Please fill out the form</h1>
    <div id="form">
        <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Please enter your name" required>
            <br>
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
            <br>
            <label for="name">City</label>
            <input type="text" class="form-control" name="city" placeholder="Please enter your city" required>
            <br>
            <label for="name">Country</label>
            <input type="text" class="form-control" name="country" placeholder="Please enter your country" required>
            <br>
            <label for="radio">Please select service you provide.</label><br>
            <select name="service">
            <option name="service" value="Dog Hostel">Dog Hostel</option>
            <option name="service" value="Dog Walking">Dog Walking</option>
            <option name="service" value="Dog Grooming">Dog Grooming</option>
            </select><br><br>
            
            <label for="content">Tell us about Yourself and Your Prices</label>
            <input type="text" name="content" class="form-control" placeholder="Tell us about yourself and Prices" required><br>

            <label for="image">Upload a Image</label><br>
            <input type="file" name="image">
            
        </div>
        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button><br><br>
        </form>
    </div>
    <footer>Pet Service &copy; 2018</footer>
</body>
</html>