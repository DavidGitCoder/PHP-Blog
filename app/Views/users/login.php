<?php
use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

if(!empty($_POST)){
    $auth=new DBAuth(App::getInstance()->getDb());
    if($auth->login($_POST['username'],$_POST['password'])){
        header('Location: admin.php');

    }else{
      ?>
    <div class="alert alert-danger">
        Identifiants incorrect
    </div>
<?php
    }
}
$form=new BootstrapForm($_POST);
?>

<form action="" method="post">
    <?=$form->input('username','Username')?>
    <?=$form->input('password','Password',['type'=>'password'])?>
    <?=$form->submit()?>

</form>