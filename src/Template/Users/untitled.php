<h3 style="margin-left:39%; font-size:25px; margin-top:20px;">Admin Reply </h3>

    
       <span><b>Users Querry:-</b></span><br>
       
    
    <?php foreach ($data as $answer): ?> 
    
   <?=  $answer->querry ?> 
   <?php echo $this->Html->image('/img/uploads/'.$answer->photo, array('width' => '500px','alt'=>'aswq')) ?>
<?php endforeach; ?>

<?php echo $this->Form->create('answers',array("url"=>'/answers/reply/'.$id_querry)); ?>
 

    <?php  echo $this->Form->control('reply_querry', ['type'=>'textarea']); 

          ?>     
       
<div class="submit"style="margin-left:20%;">
    <input class="btn btn-primary" type="submit" value="Reply">
</div>
  <?php echo $this->Form->end();?> 
       

</div>