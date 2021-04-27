<!doctype html>
<html>
<head>
</head>
<body>

<span style="margin-left:40%;font-size:25px;">User Registration Form</span>
<div class="users form" style="width:400px; min-height:200px; margin-left:35%">
<?php	
echo $this->Form->create();
echo $this->Form->control('name');  
echo $this->Form->control('email');  
echo $this->Form->control('mobile_no');  
echo $this->Form->control('password',['class' => 'form-control', 'label' => 'Password','type'=>'password']); 
echo $this->Form->control('confirm_password',['class' => 'form-control', 'label' => 'Confirm Password','type'=>'password']) 
?>





<div class="submit" style="margin-left:45%;">
   <input class="btn btn-primary" type="submit" value="Submit">
</div>
<?= $this->Form->end()  ?>

</body>
</html>