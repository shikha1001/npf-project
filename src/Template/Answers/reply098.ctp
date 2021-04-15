 <h1 align="center"> Admin Querry Reply</h1>

<div>
<table  border="0" align="center" >
    <tr>
        
        
        <th>Querry</th>
        <th>Reply</th>
    </tr>
       <?php foreach ($data as $ans): ?>  
    <tr>
    	<td> <?= $ans->querry ?> 
    	      <?php echo $this->Html->image('/img/uploads/'.$ans->photo, array('width' => '70%','height'=>'40%')) ?>
        </td>
         <?php endforeach; ?>  
    	<td> <?php echo $this->Form->create('answers',array("url"=>'/answers/reply/'.$id_querry)); ?>
            <fieldset>
            <legend><?= __('Please reply for querry') ?></legend>
             <legend><?= __('Enter querry reply') ?></legend>
            <?=$this->Form->textarea('reply_querry ') ?>
       
            </fieldset>
            <?= $this->Form->button(__('Reply')); ?>
            <?= $this->Form->end() ?>
        </td>
    </tr>
     
        
        
    
 </table>
 
</div>
