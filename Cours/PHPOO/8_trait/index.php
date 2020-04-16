<?php

spl_autoload_register();

$article = new Article('Super article');

echo $article->getName();
echo $article->formatName();
