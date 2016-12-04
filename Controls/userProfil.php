<?php
  include "Models/userProfil.php";

  if(isset($_GET['username']))
  {
    $username = $_GET['username'];

    if(check_username($username) == 1) // On vérifie que l'username existe et qu'il est unique
    {
      echo "ok";
      $informations = get_infos_by_username($username);
    }
    else
    {
      header('location: acceuil.php');
    }
  }
  else
  {
    echo "pas ok";
  }
?>