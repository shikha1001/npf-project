<!doctype html>
<html>
<head>
</head>
<body>

<span style="margin-left:40%;font-size:25px;">User Registration Form</span>
<div class="users form" style="width:400px; min-height:200px; margin-left:35%">
	
<?= $this->Form->create()  ?>
<?= $this->Form->control('name')  ?>
<?= $this->Form->control('email')  ?>
<?= $this->Form->control('mobile_no')  ?>

<?= $this->Form->control('password',['class' => 'form-control', 'label' => 'password','type'=>'password'])  ?>
<?= $this->Form->control('confirm_password',['class' => 'form-control', 'label' => 'Confirm Password','type'=>'password']) ?>




<div class="submit" style="margin-left:45%;">
   <input class="btn btn-primary" type="submit" value="Submit">
</div>
<?= $this->Form->end()  ?>
<!-- <div style="margin-left:80%;">
<?php //echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"getdata"])."'><button style='background:green;'>Cancel</button></a>";?></div>
</div> -->
</body>
</html>