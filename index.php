<!DOCTYPE HTML>
<html>
    <head>
        <?php
        require_once 'includes\config.inc.php';
        require_once BASE_URI . 'includes\styles.inc.html';
        require_once BASE_URI . 'model\dao\VersiculoDAO.class.php';
        ?>
        <link rel='stylesheet' media='screen and (min-width:645px)' href='css/screen-large/large.index.css' />
        <link rel='stylesheet' media='screen and (max-width:644px)' href='css/screen-small/small.index.css' />
        <title>IBJMC</title>
    </head>
    <body>
        <?php include_once 'includes/header.php'; ?>
        <section id="vers">
            <h2>Versículo de hoje</h2>
            <?php
                $row = VersiculoDAO::read(1);
            ?>
            <p>"<?php echo $row['versiculo'] ?>"</p>
            <p id="ref"><?php echo $row['referencia']; $vers = null; ?></p>
        </section>
        <section id="main-sec">
            <article>
                
            </article>
        </section>
        <?php include_once 'includes/footer.html'; ?>
    </body>
</html>