<?php 
include_once "./templates/generation.php";

$id_topic = $_REQUEST['id_topic'];

// print_r($_REQUEST);
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
     <div class="posts">
        <?php 
            generation_posts($mysqli, $id_topic);
        ?>
    </div>
 </body>
 </html>