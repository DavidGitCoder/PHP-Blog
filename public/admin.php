<?php
use Core\Auth\DBAuth;

define('ROOT',dirname(__DIR__));
require ROOT.'\app\App.php';
App::load();

$app=app::getInstance();

$page='home';
if(isset($_GET['p'])){
    $page=$_GET['p'];
}
// Auth
$auth=new DBAuth($app->getDb());
if(!$auth->isLogged()){
    $app->forbidden();
}

ob_start();
if($page==='home'||$page==='article.admin'){
    require ROOT.'\pages\admin\articles\index.php';
}
if($page==='category.admin'){
    require ROOT.'\pages\admin\categories\index.php';
}
if($page==='category.add'){
    require ROOT.'\pages\admin\categories\add.php';
}
if($page==='category.edit'){
    require ROOT.'\pages\admin\categories\edit.php';
}
if($page==='category.delete'){
    require ROOT.'\pages\admin\categories\delete.php';
}
else if($page==='article.show'){
    require ROOT.'\pages\admin\articles\show.php';
}
else if($page==='article.add'){
    require ROOT.'\pages\admin\articles\add.php';
}
else if($page==='article.edit'){
    require ROOT.'\pages\admin\articles\edit.php';
}
else if($page==='article.delete'){
    require ROOT.'\pages\admin\articles\delete.php';
}
else if($page==='article.category'){
    require ROOT.'\pages\admin\articles\category.php';
}
else if($page==='404'){
    require ROOT.'\pages\404.php';

}
$content=ob_get_clean();

require ROOT.'\pages\templates\default.php';


?>