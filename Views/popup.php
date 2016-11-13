<?php
/**
 * Created by PhpStorm.
 * User: qianqiuhao
 * Date: 16/11/12
 * Time: 下午11:09
 */
?>
<!doctype html>

<html lang="fr">
<head>
    <meta charset="utf-8">

    <title>pop up</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../Styles/bootstrap.css"/>

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->

    <!-- Latest compiled and minified JavaScript -->
    <script src="../Scripts/jquery_library.js"></script>

    <script src="../Scripts/bootstrap.js"></script>

    <script src="../Scripts/popup.js"></script>
</head>

<body>
<?php include ("popup_test.html"); ?>

<!-- Modal -->
<div id="myObject" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" id="closePbInscription">&times;</button>
            </div>
            <div class="modal-content">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>