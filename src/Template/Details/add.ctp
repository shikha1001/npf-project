<?php
echo $this->Form->create("Users",array('url'=>'/Details/add'));
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->input('city');
echo $this->Form->button('Submit');
echo $this->Form->end();
?>