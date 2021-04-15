<h3 style="margin-left:39%; font-size:25px; margin-top:20px;">Admin Reply </h3>
<table  border="0" align="center" style="height: 50%; width: 70%" >
    <tr>
       <th><span><b>Users Query:-</b></span><br></th>
       <th>Admin Reply</th>
    </tr>
    <?php foreach ($data as $answer): ?> 
    <tr>
    	<td>
           <?=  $answer->query ?> 
           <?php echo $this->Html->image('/img/uploads/'.$answer->photo, array('width' => '500px')) ?>
       </td>
    <?php endforeach; ?>
       <td>
       <?php echo $this->Form->create('answers',array("url"=>'/answers/reply/'.$id_query)); ?>
 

       <?php  echo $this->Form->control('reply_querry', ['type'=>'textarea']); 

          ?>     
       
       <div class="submit"style="margin-left:20%;">
       <input class="btn btn-primary" type="submit" value="Reply">
       </div>
       <?php echo $this->Form->end();?>
  </td>
  </tr>
</table> 


</div>