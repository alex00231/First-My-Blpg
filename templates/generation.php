<?php
include_once "mysqlConnect.php";
// include_once "../style/css/headStyle.css";

?>
<link rel="stylesheet" href="../style/css/headStyle.css">
<?php
function generation_head_menu ($mysqli) {
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

function generation_posts ($mysqli, $id_topic) {
    $sql = "SELECT * FROM `articles` WHERE `id_topic` = $id_topic";
    $res = $mysqli -> query($sql);

    if ($res -> num_rows > 0) {
        while ($resArticle = $res -> fetch_assoc()) {
            ?>
            <div class="postCatalog">
                <h2><a href="post.php?id_article=<?= $resArticle['id'] ?>"><?= $resArticle['title'] ?></a></h2>
                <p class="text"><?= mb_substr($resArticle['text'], 0, 158, 'UTF-8') ?></p>
            </div>
            <?php
        }
    } else {
        echo "В этом раздели статей нету";
    }
}

function generation_post ($mysqli, $id_article) {
    $sql = "SELECT * FROM `articles` WHERE `id` = '$id_article'";
    $res = $mysqli -> query($sql);

    if ($res -> num_rows === 1) {
        $resPost = $res -> fetch_assoc()?>
        <h1><?= $resPost['title'] ?></h1>
        <p><?= $resPost['text'] ?></p>
        <p>Дата публикации: <?= substr($resPost['date'], 0, 11) ?></p>
        <?php
    }
}

function generation_comment ($mysqli, $id_article) {
    $sql = "SELECT * FROM `comments` WHERE `id_article` = $id_article";
    $resSQL = $mysqli -> query($sql);

    if ($resSQL -> num_rows > 0) {
        while ($resComment = $resSQL -> fetch_assoc()) {
            ?> 
            <div class="comment">
                <p><?= $resComment['comment'] ?></p>
                <p>Оставлин: <?= substr($resComment['date'], 0, 11)  ?></p>
            </div>
            <hr>
            <?php
        }
    } else {
        ?>
        <p>Комментариев нет</p>
        <?php
    }
}

function send_comment ($mysqli, $comment, $id_article) {
    $sql = "INSERT INTO `comments` (`comment`, `id_article`, `date`) VALUES ('$comment', '$id_article', CURRENT_TIMESTAMP)";
    $mysqli -> query($sql);
}
?> 
