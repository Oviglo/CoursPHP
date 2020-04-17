<?php

class FileFactory
{
    public static function create($file)
    {
        // retourne des informations sur un chemin
        $pathInfo = pathinfo($file);

        if ('pdf' == $pathInfo['extension']) {
            return new Pdf();
        } elseif (in_array($pathInfo['extension'], ['jpg', 'gif', 'bmp', 'png'])) {
            return new Image();
        }

        trigger_error('Impossible de reconnaitre le type de fichier');

        return null;
    }
}
