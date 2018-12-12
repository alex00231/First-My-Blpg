<?php
include_once "./templates/generation.php";

$id_article = $_REQUEST["id_article"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        generation_head_menu($mysqli);
     ?>
     <div class="post">
        <?php
        generation_post($mysqli, $id_article);
        // print_r($_SERVER);
        ?>
     </div>
    <div class="comments">
        <hr>
        <form action="<?= $_SERVER["SCRIPT_NAME"] ?>">
            <textarea name="comment" id="" style="width:800px; height:50px;"></textarea>
        </form>
    </div>
</body>
</html>