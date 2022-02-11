<!--aici vom implementa functiile-->

<?php

//
function check_login($con)
{

    //create session variable
    //verificare existenta
    if(isset($_SESSION['user_id']))
    {
        //id user
        $id=$_SESSION['user_id'];

        //se selecteaza doar un user
        $query="select * from users where user_id='$id' limit 1";

        //rezultat query
        $result=mysqli_query($con,$query);

        if($result && mysqli_num_rows($result)>0)
        {
            //The mysqli_fetch_assoc() function fetches a result row as an associative array
            //assoc-> associative array
            $user_data=mysqli_fetch_assoc($result);
            return $user_data;

        }

    }

    //redirect-> log in
    header("Location: login.php");
    //die- e echivalent cu exit
    die;

}

//functie care genereaza un nr random pt user id
function random_num($length)
{
    $text="";

    if($length<5)
    {
        $length=5;
    }

    $len=rand(4,$length);

    //generare un nr de exact $len cifre
    for($i=0;$i<$len;$i++)
    {
        //concatenare
        $text.= rand(0,9);

    }

    //nr generat
    return $text;
}



