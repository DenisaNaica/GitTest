<!--Aici incepe codul pt php-->
<?php

//punem restrictii pagini
session_start();

     //import fisiere externe
     include("connection.php");
     include("functions.php");

     //collect user data
     //aici punem conectarea la bd
     //check_login implementata in fisierul functions.php
     //$con creat in connections.php
      //$user_data=check_login($con);

     //verificare user a apasat pe butonul de post
     if($_SERVER['REQUEST_METHOD'] == "POST")
     {
         //colect data from the post variable
         $user_name=$_POST['user_name'];
         $password=$_POST['password'];

         if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
             {


                 //create user id-RANDOM
                // $user_id=random_num(20);

                 //$query="insert users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
                 //read from db
                  $query="select * from users where user_name='$user_name' limit 1 ";

                //get result
                 $result=mysqli_query($con, $query);

                 //verificare username & password
                 if($result)
                 {
                     if($result && mysqli_num_rows($result) >0)
                     {
                         $user_data=mysqli_fetch_assoc($result);

                         //avem match intre parole
                         if($user_data['password'] === $password)
                         {

                             $_SESSION['user_id'] = $user_data['user_id'];
                             //redirect user to the index page
                             header("Location: index.php");
                             die;

                         }


                     }

                 }
                 echo " Wrong username or password";
             }


         else
         {
             echo " Wrong username or password";
         }

     }






?>

<!--Aici incepe codul pt html-->
<!DOCTYPE html>
<html>
<head>
    <title>
        Login
    </title>
</head>
<body>

<!--Styling-->
<style type="text/css">

    #text{
        height:25px;
        border-radius:5px;
        padding:4px;
        border: solid thin #aaa;
        width; 100%;
    }
    #button{
        padding:10px;
        width:100px;
        color:white;
        background-color: lightblue;
        border:none
    }
    #box{
        background-color: grey;
        margin:auto;
        width:300px;
        padding:20px;

    }

</style>
<!--end styling-->

<div id="box">

    <!--create form-->
    <form method="post">

        <div style="font-size:20px; margin:10px;color:white;">Login</div>

        <!--fielduri form-->
        <input id="text' type="text" name="user_name"><br><br>
        <input id="text" type="password" name="password"><br><br>

        <input id="button" type="submit" name="Login"><br><br>

        <!--go to signup page-->
        <a href="signup.php"> Click to Sign Up</a><br><br>
    </form>
</div>

</body>






</html>
