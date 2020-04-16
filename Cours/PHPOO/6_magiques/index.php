<?php

spl_autoload_register();

// __construct
$article = new Article();

$article->getTitle();

$article::getGlobalCount('Test');

$article->title;

$article->title = '      Super titre    <br/>';
var_dump($article);

// serialization, deserialization => clonage
$str = serialize($article);
$article = unserialize($str);

echo $article.'<br/>';

$article2 = clone $article;
