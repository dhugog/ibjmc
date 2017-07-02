<!DOCTYPE HTML>
<html>
    <head>
        <?php
        DEFINE('LIVE', true);
        require('includes/config.inc.php');
        require(MYSQL);
        require('includes/styles.html');
        ?>
        <link rel="stylesheet" href="css/index.css" />
        <title>IBJMC</title>
    </head>
    <body>
        <?php include('includes/header.php'); ?>
        <section id="vers">
            <h2>Versículo de hoje</h2>
            <?php
            $query = mysqli_query($con, "SELECT * FROM versiculos WHERE DATE_FORMAT(dataExibicao, '%d%m%y') = DATE_FORMAT(NOW(), '%d%m%y');");
            $query = mysqli_fetch_array($query);
            $vers = $query[1];
            $ref = $query[2];
            ?>
            <p>"<?php echo $vers; ?>"</p>
            <p id="ref"><?php echo $ref; ?></p>
        </section>
        <section id="main-sec">
            <article>
                
            </article>
        </section>
        <?php include('includes/footer.html'); ?>
    </body>
</html>