<?php
ob_start();
session_start();

require './_app/Config.inc.php';

$CookiePolicy = null;

if (isset($_COOKIE)):

    if (isset($_COOKIE['cookiePolicy']) && ($_COOKIE['cookiePolicy'] == 'agree')):
        $CookiePolicy = 1;
    endif;
endif;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="base" href="<?= BASE; ?>"/>        
        <title>LGPD - Cookies</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;1,200&family=Roboto:wght@100;400&display=swap" rel="stylesheet">        
        <script src="_js/jquery.js"></script>
    </head>
    <body>
        <div><p>Cookies LGPD</p></div>
        <?php
        if ($CookiePolicy):
            echo "<p>Cookies Ativados</p>";
        else:
            echo "<p>Cookies Desativados</p>";
        endif;
        ?>
        <div class="cookies-container <?= $CookiePolicy == 1 ? 'hidden': '';?>">
            <div class="cookie-content">
                <div class="row">
                    <div class="col-xs-8 col-lg-12 cookies-text">
                        <p>Utilizamos cookies para garantir que você obtenha a melhor experiência em nosso site. Para saber mais acesse nossa <a href="https://evoludigital.com.br/themes/wc_site/politica/">Politica da Privacidade</a></p>
                    </div>
                    <div class="col-xs-2 col-lg-12"><button class="cookies-save" data-cookies="agree">Aceitar</button></div>
                </div>
            </div>
        </div>
        <script src="_js/script.js"></script>
    </body>
</html>
<?php
ob_end_flush();
