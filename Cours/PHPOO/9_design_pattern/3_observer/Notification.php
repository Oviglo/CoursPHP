<?php

// splObserver est une interface déjà implémentée dans PHP
class Notification implements SplObserver
{
    public function update(SplSubject $subject)
    {
        echo 'Notification: message envoyé.<br/>';
    }
}
