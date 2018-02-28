<?php
foreach ($data as $article) :
?>
<article>
    <h3><?= $article["id"] ?> -- <?= $article["title"] ?></h3>
    <p>
        <em>Écrit par <?= $article["author"] ?></em>
    </p>
    <p>
        <a href="/test/?id=<?= $article["id"] ?>"><?= $article["content"] ?>...</a>
    </p>
    <hr>
</article>
<?php
endforeach;
?>
<ul class="pages">
<?php for ($i = 0; $i <= $pages; $i++) : ?>
    <li><a href="/test/?page=<?= $i ?>"><?= $i ?></a></li>
<?php endfor; ?>
</ul>
