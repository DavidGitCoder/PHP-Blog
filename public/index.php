<?php

use App\Autoloader;
use \App\Config;
use \App\Apps;

require_once '../app/Autoloader.php';
Autoloader::register();


$app = Apps::getInstance();
$app->title='Titre de test';

?>