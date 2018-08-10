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
        $charge = $_POST['charge'];
        $content = mysqli_real_escape_string($connection, $_POST['content']);
        $u_image = $_FILES['image']['name'];
        $u_image_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($u_image_temp, "upload/$u_image" );
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Invalid Email";
        } elseif(!preg_match("/^[0-9]{10}$/", $phone)){
            $phoneErr = "Invalid phone";
        }else{
        $sql = "INSERT INTO users(u_name, email, phone, u_address, city, country, u_service, charge, content, u_image) VALUES('$name', '$email' , '$phone', '$address', '$city', '$country', '$service', '$charge' ,'$content', '$u_image')";
            $status = mysqli_query($connection, $sql);
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">      
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <title>Pet Service</title>
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
                <a class="navbar-brand" href="index.php">Pet Service</a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="index.php">Home</a></li>
                  <li><a href="form.php">Become a Sitter</a></li>
                </ul>
              </div>
            </div>
        </nav>
        
        <h1 id="head" >Please fill out the form</h1>
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
                <input type="number" class="form-control" name="phone" placeholder="Phone number" required><span style="color:red;"><?php echo $phoneErr; ?></span>
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
                
                <label for="radio">What services are you offering?</label><br>
                <select name="service">
                <option name="service" value="Dog Hostel">Dog Hostel</option>
                <option name="service" value="Dog Walking">Dog Walking</option>
                <option name="service" value="Dog Grooming">Dog Grooming</option>
                </select><br><br>

                
                <div class="form-group">
                    <label for="charge">How much do you charge?(Per day if Dog hostel chosen or Per session for Dog walking)</label>
                    <input type="number" class="form-control" name="charge" placeholder="Your charge's" required>
                </div>

                <div class="form-group">
                    <label for="content">Description about you and the service provided?</label>
                    <textarea rows="3" name="content" class="form-control" placeholder="Description about you and the service provided" required></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Upload a Image</label>
                    <input type="file" name="image">
                </div>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button><br><br>
            </form>
        </div>
        <footer id="footer">Pet Service &copy; 2018</footer>
    </body>
</html>