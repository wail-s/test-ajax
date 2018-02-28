<?php
require_once "../../handler/handler.php";
$offset = isset($_GET["page"]) ? $_GET["page"] : 0;
$content = isset($_GET["id"]) ? getSingle($_GET["id"], false) : getContents($offset, false);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<header>
    <a href="/test">
        Retour à l'index
    </a>
    <h2>Mon super blog</h2>
    <div id="burger">Burger</div>
</header>
<main>
<?= $content ?>
</main>
<footer>
    <p>Il y a sérieusement des gens qui lisent ce qu'il y a dans les footer ?</p>
    <p>Non srsly... À part les mecs du marketing ?</p>
</footer>
</body>
<script type="application/javascript" src="../js/useless.js"></script>
</html>
