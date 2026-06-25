<?php if($error && !empty($_POST)):?>
    <div class="alert alert-danger">Incorrect login or password</div>
<?php endif;?>
<form action="" method="post">
    <?=$form->input('username','Username')?>
    <?=$form->input('password','Password',['type'=>'password'])?>
    <?=$form->submit()?>

</form>