<!--Aici incepe codul pt php-->
<?php

//punem restrictii pagini
session_start();

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

        //read from db
        $user_id=random_num(20);

        $query="insert users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

        //save query
        mysqli_query($con,$query);

        //redirect user to the login page
        header("Location: login.php");
        die;




    }
    else
    {
        echo " Please enter some valid info";
    }

}






?>

<!--Aici incepe codul pt html-->
<!DOCTYPE html>
<html>
<head>
    <title>
        Sign Up
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

            <div style="font-size:20px; margin:10px;color:white;">Sign Up</div>

            <!--fielduri form-->
            <input id="text' type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" name="Sign Up"><br><br>

            <!--go to login page-->
            <a href="login.php"> Click to Login</a><br><br>
        </form>
    </div>

</body>






</html>
