 <h3 style="margin-left:39%; font-size:25px; margin-top:20px;">Admin Reply </h3>
<table  border="0" align="center" style="height: 80%; width: 90%">
    <tr>
       <th><span><b>Users Query:-</b></span><br></th>
       <th>Admin Reply</th>
    </tr>
    <?php  foreach ($qarr as $k=>$v) :
        $shikha = explode('~',$k);
     ?> 
    <tr>
    	<td>
              
           <?php echo $shikha[0]; echo "<br>";
            echo $this->Html->image('/img/uploads/'.$shikha[1], array('width' => '800px')) ?>
       </td>
    <?php endforeach; ?>
       <td style="height: 50%; width: 50%">
        <?php echo $this->Form->create('answers_details'); 
         echo $this->Form->control('query_reply', ['type'=>'textarea']); 
       
        $data =$this->request->getParam('id');
      //echo $data; 
       echo $this->Form->control('id_query',array('type'=>'hidden','value'=>$data)); ?>  
     <div class="submit"style="margin-left:20%;">
     <input class="btn btn-primary" type="submit" value="Reply">
  </div>
  <?= $this->Form->end();?> 
  </td>
  </tr>
</table> 


</div>





















    
       