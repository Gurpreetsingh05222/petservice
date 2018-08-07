<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "petservice";

   $connection = mysqli_connect($servername, $username, $password, $dbname);

   if(!$connection){
   	die ("QUERY FAILED" . mysqli_connect_error($connection));
   }

   ?>