
<div class="users form" style="center">
<?= $this->Flash->render('auth') ?>
<div align='right'>

</div>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and userpassword') ?></legend>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password',['class' => 'form-control', 'label' => 'password','type'=>'password']) ?>
    </fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
<span style="margin-left: 40%">If you have not account.click on <?php echo "<a href='".$this->Url->build(["controller"=>"Users","action"=>"add"])."'>Registration</a>";?></span>
</div>