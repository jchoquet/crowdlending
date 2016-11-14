<?php

//Fonction retournant le mot de passe d'un utilisateur avec un id donné
function GetPswUser($db,$id)
  {
  global $DB;
	$stmt = $db->prepare("SELECT hash_password FROM utilisateur WHERE id=:id" );
	$stmt->bindValue(':id', $id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_OBJ);
  $stmt = $stmt->fetch();
  return $stmt->hash_password;
  }
  
//Fonction retournant l'ID d'un utilisateur avec un username donné  
function GetIdUser($userName)
{
  global $DB;
  $stmt = $DB->prepare("SELECT id FROM utilisateur WHERE username = :username LIMIT 1");
  $stmt->bindValue(':username', $userName);
  $stmt->execute();
  if($stmt->rowCount() > 0)
  {
      $check = $stmt->fetch(PDO::FETCH_ASSOC);
      $id = $check['id'];
  }
  else
      {
      echo "Id user non trouvé\n";
      $id = 0;
  }
  return $id;
}

?>