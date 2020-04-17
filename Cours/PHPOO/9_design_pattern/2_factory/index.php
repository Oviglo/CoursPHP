<?php

spl_autoload_register();

$file = FileFactory::create('image.pdf');

var_dump($file);
