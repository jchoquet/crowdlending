<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 23/10/2016
 * Time: 23:34
 */

function createUrl($nomVille,$nomEtat){
    return "https://www.google.com/maps/embed/v1/search?key=AIzaSyALlKIJf_snVndMLbWf6fC_u4Y0Kydc1JM&q=".$nomVille.",".$nomEtat;
}

$url = createUrl("Dijon","France");
?>

<html>
<body>
<iframe
    width="450"
    height="250"
    frameborder="0" style="border:0"
    src=<?php echo $url?> allowfullscreen>
</iframe>
</body>
</html>