<div>
<?php foreach ($students as $key=>$students) 
{?>
<a href="#">
   <div>
   <!-- <p><?= $students->id ?> </p> -->
   <p><?=$students->first_name ?></p>
   <p><?= $students->email ?></p>
   <p><?= $students->city ?></p>
   </div>
</a>
<br/>
<?php
}
?>
<ul class="pagination" >
<?= $this->Paginator->prev("<<") ?>
<?= $this->Paginator->numbers() ?>
<?= $this->Paginator->next(">>") ?>
</ul>
</div>