<?php

  include __DIR__ . '/../Models/connexion.php';

  /* Fonction qui renvoie un tableau contenant les catégories possibles */

  function getCategorie($DB){

      $stmt = $DB->prepare("SELECT DISTINCT nom FROM categorie");
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_NUM);
      $result = $stmt->fetchAll();
      return $result;
  }


  /* Fonction qui crée un bouton select à partir d'un tableau */

  function printSelect($tab){

    foreach($tab as $a)
    {
      foreach ($a as $b)
      {
        echo "<option value='$b'>$b</option>" . PHP_EOL;
      }
    }
  }


  try{

    $tab=getCategorie($DB);

    $DB = null;
  }
  catch(PDOException $e){
    echo "Database Error";
  }

?>