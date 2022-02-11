
<!--Aici incepe codul pt php-->
<?php
session_start();
//super global variables
   // $_SESSION;

    include("connection.php");
    include("functions.php");

    //collect user data
    //aici punem conectarea la bd
    //check_login implementata in fisierul functions.php
    //$con creat in connections.php
    $user_data= check_login($con);




?>


<!--Aici incepe codul pt html-->
<!DOCTYPE html>
<html>
<head>
    <title>
       My web site
    </title>
</head>
<body>
     <!--Link pagina de logout-->
     <a href="logout.php">Logout</a>
     <h1> This is the index page</h1>
     <br>
     Hello, <?php
     echo $user_data['user_name'];

     ?>
     <br><br>
     <a href="address.php">Adauga o noua adresa pentru <?php
         echo $user_data['user_name'];

         ?> </a>
    <br><br>
    <h2>AICI SUNT ADRESELE PENTRU UTILIZATORUL <?php
        echo $user_data['user_name'];

        ?>  </h2>
      <br><br>

     <?php
     $servername = "localhost";
     $username = "root";
     $password = "root";
     $dbname = "login_sample_db";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
     $user_id=$user_data['user_id'];
     $sql = "SELECT user_address.street,user_address.region, user_address.city FROM users INNER JOIN user_address ON users.user_id = user_address.user_id AND users.user_id='$user_id';";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         // output data of each row
         $index=0;
         while($row = $result->fetch_assoc()) {
             $index=$index+1;
             echo "Adresa " .' '.$index.' ';
             echo $row["street"].' '.$row["region"].' '.$row["city"]."<br>";
         }
     } else {
         echo "0 results";
     }
     $conn->close();
     ?>

</body>
</html>