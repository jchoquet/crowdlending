<?php

/* On démarre la session */

session_start();

/* On détruit les variables de session */

session_unset();

/* On détruit la session */

session_destroy();

/* On redirige vers la landing page */

header('location: index.php');


?>