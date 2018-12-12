<?php
include_once "mysqlConnect.php";
// include_once "../style/css/headStyle.css";

?>
<link rel="stylesheet" href="../style/css/headStyle.css">
<?php
function generation_head_menu($mysqli) {
    $sql = "SELECT * FROM `topic`";
    $resSQL = $mysqli -> query($sql);
    ?>

    <header>
        <nav>
            <ul>
                <li><a href="#">Главное</a></li>
                <?php
                    while ($rowTopic = $resSQL -> fetch_assoc()) {
                        echo '<li><a href="./topic.php?id_topic='. $rowTopic["id"] .'">'. $rowTopic['name'].'</a></li>';
                    }
                ?>
            </ul>
        </nav>
    </header>
    <?php
}

function generation_posts($mysqli, $id_topic) {
    $sql = "SELECT * FROM `articles` WHERE `id_topic` = $id_topic";
    $res = $mysqli -> query($sql);

    if ($res -> num_rows > 0) {
        while ($resArticle = $res -> fetch_assoc()) {
            ?>
            <div class="post">
                <h2><a href="post.php?id_article=<?= $resArticle['id'] ?>"><?= $resArticle['title'] ?></a></h2>
                <p class="text"><?= mb_substr($resArticle['text'], 0, 158, 'UTF-8') ?></p>
            </div>
            <?php
        }
    } else {
        echo "В этом раздели статей нету";
    }
    
}
?>
  
