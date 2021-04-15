<?php
echo $this->Form->create("users",array('url'=>'/Tests/hello'));
echo $this->Form->input('name');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->input('email');
echo $this->Form->input('phone');
//echo $this->Form->input('birthdate');

echo $this->Form->button('Submit');
echo $this->Form->end();
?>