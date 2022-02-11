<!--conctare cu baza de date-->

<?php

  $dbhost="localhost";
  $dbuser="root"; //username
  $dbpass="root"; //parola
  $dbname="login_sample_db"; //baza de date

  //conectare esuata
  if(!$con =mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
  {
        //echivalent cu exit
        die("failed to connect");
  }

