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
    <!-- <link rel="stylesheet" href="../style/css/headStyle.css"> -->
    <header>
        <nav>
            <ul>
                <li><a href="#">Главное</a></li>
                <?php
                    while ($rowTopic = $resSQL -> fetch_assoc()) {
                        echo '<li><a href="">'. $rowTopic['name'].'</a></li>';
                    }
                ?>
            </ul>
        </nav>
    </header>
    <?php
}
?>
  
