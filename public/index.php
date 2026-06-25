<?php
define('ROOT',dirname(__DIR__));
require ROOT.'/app/App.php';
App::load();

$page='article.index';
if(isset($_GET['p'])){
    $page=$_GET['p'];
}
$page=explode('.', $page);
if($page[0]==="admin"){
    $controller='Admin\\'.ucfirst($page[1]);
    $action=$page[2];
}else{
    $controller=ucfirst($page[0]);
    $action=$page[1];
}
$controller= '\App\Controller\\' . $controller . 'Controller';

$controller=new $controller();
$controller->$action();

?>
