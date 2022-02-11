
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

</body>
</html>