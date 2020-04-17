<?php

spl_autoload_register();

$msg = new Messagerie();
$notif = new Notification();

// Cette ligne peut être en commentaire pour ne plus avoir de notification
$msg->attach($notif);

$msg->envoyerMessage('HELLO');
