<?php 

$result = logout();

addFlashMessage($result['status'], $result['message']);

header('Location: index.php');