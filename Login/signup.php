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
    $email=$_POST['email'];

    $street=$_POST['street'];
    $city=$_POST['city'];
    $region=$_POST['region'];
    $country=$_POST['country'];
    $zip_code=$_POST['zip_code'];


    if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($email)
       && !empty($street) && !empty($city) && !empty($country) && !empty($region) && !empty($zip_code))
    {

        //read from db
        $user_id=random_num(20);

        $query="insert users (user_id,user_name,password,email) values ('$user_id','$user_name','$password','$email')";

        //query inserare in tabela adreselor
        $query_adr="insert user_address(user_id,street,city,region,country,zip_code) values('$user_id','$street','$city','$region','$country','$zip_code')";

        //save query for user table
        mysqli_query($con,$query);


        //save query for user user address table
        mysqli_query($con,$query_adr);


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
            <!--pt tabela userilor-->
            <label for="user_name">User name</label>
            <input id="text' type="text" name="user_name"><br><br>

            <label for="password">Password</label>
            <input id="text" type="password" name="password"><br><br>

            <label for="email">Email</label>
            <input id="text" type="text" name="email"><br><br>

            <!--fielduri pt tabela de adrese-->
            <label for="street">Street</label>
            <input id="text" type="text" name="street"><br><br>

            <label for="city">City</label>
            <input id="text" type="text" name="city"><br><br>

            <label for="region">Region</label>
            <input id="text" type="text" name="region"><br><br>

            <label for="country">Country</label>
            <input id="text" type="text" name="country"><br><br>

            <label for="zip_code">Zip Code</label>
            <input id="text" type="number" name="zip_code"><br><br>




            <input id="button" type="submit" name="Sign Up"><br><br>

            <!--go to login page-->
            <a href="login.php"> Click to Login</a><br><br>
        </form>
    </div>

</body>






</html>
