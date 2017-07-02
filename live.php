<!DOCTYPE HTML>
<html>
    <head>
        <?php
        DEFINE('LIVE', true);
        require('includes/config.inc.php');
        require('includes/styles.html');
        ?>
        <title>IBJMC - Ao vivo</title>
        <style>
            #videoWrapper {
                position: relative;
                padding-bottom: 50%;
                padding-top: 25px;
            }

            #videoWrapper iframe {
                position: absolute;
                top: 0;
                left: 0;
                border: 5px solid white;
                box-shadow: 0px 0px 3px rgba(0,0,0,.6);
                box-sizing: border-box;
            }

            #main-sec article h2 {
                padding-bottom: 15px;
                text-align: center;
                text-shadow: 1px 1px 3px rgba(0,0,0,.2);
            }
        </style>
    </head>
    <body>
        <?php include('includes/header.php'); ?>
        <section id="main-sec">
            <article>
                <h2>Você está assistindo ao culto...</h2>
                <div id="videoWrapper">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/NSNsJdo-bFM?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
                </div>
            </article>
        </section>
        <?php include('includes/footer.html'); ?>
    </body>
</html>