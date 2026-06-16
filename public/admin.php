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
echo $auth->getUserId().' is connected';
ob_start();
if($page==='home'){
    require ROOT.'\pages\admin\articles\index.php';
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
else if($page==='article.category'){
    require ROOT.'\pages\admin\articles\category.php';
}
else if($page==='404'){
    require ROOT.'\pages\404.php';

}
$content=ob_get_clean();

require ROOT.'\pages\templates\default.php';


?>