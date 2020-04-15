<?php

require_once 'InterfaceDessin.php';

class Image implements InterfaceDessin
{
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    // Cette méthode est exigée par l'interface "InterfaceDessin"
    public function dessiner()
    {
        return '<img src="'.$this->url.'">';
    }
}
