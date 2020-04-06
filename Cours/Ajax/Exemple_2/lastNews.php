<?php

$news = ['News 1', 'News 2', 'News 3'];

?>
<ul>
    <?php foreach ($news as $n): ?>
    <li><?=$n; ?></li>
    <?php endforeach; ?>
</ul>