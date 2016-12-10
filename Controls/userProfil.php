<?php
  include "Models/userProfil.php";

  if(isset($_GET['username']))
  {
    $username = $_GET['username'];

    if(check_username($username) == 1) // On vérifie que l'username existe et qu'il est unique
    {
      $informations = get_infos_by_username($username);
    }
    else
    {
      header('location: NoUser.php');
    }
  }
  else
  {
    echo "pas ok";
  }


/*if(isset($_GET['user'])) {
    $username = $_GET['user'];
} else {
    $username = 'defaultUser';
}*/

/*function getUsername() {
    $username = (isset($_GET['user'])) ? $_GET['user'] : 'defaultUser';
    return $username;
}
  */


  ?>

