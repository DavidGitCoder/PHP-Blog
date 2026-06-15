<?php

use App\Autoloader;
use \App\Apps;

require_once '../app/Autoloader.php';
Autoloader::register();

$app=Apps::getInstance();

$posts = $app->getTable('Article');
var_dump($posts->all());
?>