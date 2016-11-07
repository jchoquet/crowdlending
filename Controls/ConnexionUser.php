<?php
function connexionUser($id)
  {
      global $DB;
    $stmt = $DB->prepare("SELECT hash_password FROM utilisateur WHERE id = :id LIMIT 1");
    $stmt->bindValue(':id', $id);
    $stmt->execute();

      if ($stmt->rowCount() > 0)
      {
          //Cas où l'utilisateur a été trouvé, on stocke son mot de passe hashé
          $check = $stmt->fetch(PDO::FETCH_ASSOC);
          $hashedPw = $check['hash_password'];
      }

      else
          $hashedPw = "erreur";

    return $hashedPw;
  }

//Fonction retournant l'id d'un utilisateur donné

function getIdUser($userName)
{
    global $DB;
    $stmt = $DB->prepare("SELECT id FROM utilisateur WHERE username = :username LIMIT 1");
    $stmt->bindValue(':username', $userName);
    $stmt->execute();

    if($stmt->rowCount() > 0)
    {
        //Cas où l'utilisateur a été trouvé
        $check = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $check['id'];
    }

    else
        {
        echo "Id non trouvé\n";
        $id = 0;
    }

    return $id;
}
?>