<?php
function connexionUser($db,$id)
  {
    $stmt = $DB->prepare("SELECT hash_password FROM utilisateur WHERE identifiant=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt = $stmt->fetch();
    return $stmt->hash_password;
  }
?>