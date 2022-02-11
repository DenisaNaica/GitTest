!--Aici incepe codul pt php-->
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



    $user_data= check_login($con);
    $street=$_POST['street'];
    $city=$_POST['city'];
    $region=$_POST['region'];
    $country=$_POST['country'];
    $zip_code=$_POST['zip_code'];


    if(!empty($street) && !empty($city) && !empty($country) && !empty($region) && !empty($zip_code))
    {




        $user_id=$user_data["user_id"];
        //query inserare in tabela adreselor
        $query_adr="insert user_address(user_id,street,city,region,country,zip_code) values('$user_id','$street','$city','$region','$country','$zip_code')";




        //save query for user user address table
        mysqli_query($con,$query_adr);


        //redirect user to the login page
        header("Location: index.php");
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

        <div style="font-size:20px; margin:10px;color:white;">add new address</div>

        <!--fielduri form-->


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




        <input id="button" type="submit" name="insert address"><br><br>


    </form>
</div>

</body>






</html>
