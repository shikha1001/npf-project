<h1>Admin Dashbord</h1>

 <div align="right">
    <?php
   // echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"usersdetails"])."'><button type= 'button' align ='center'>UsersDetails</button></a>";
   ?> 
 </div>
  
<div>

<table  border="1" align="center" >

    <tr>
        <th>Sr.N.</th>
        <th>Name</th>
        <th>Query</th>
        <th>Date</th>
        
        <th>Action</th>
    </tr>

    <?php 
    $sn_count = 1; 
    foreach ($data as $k=>$v) : ?>
     
    <tr>
        <td><?= $sn_count ?></td>
        <td><?= $v['name'] ?></td>
        <td>
         <?php
         $ans=$v['query'];
         echo substr($ans,0,20);
         ?>
         
           
        </td>
        <td>
           <?= $v['created']->format('y-m-d H:m:s') ?>
         </td>
         <td>
            <?php echo "<a href='".$this->Url->build(["controller" => "AnswersDetails","action"=>"answerReply",$v['id_query']])."'>Reply</a>";?>
            
        </td>
    </tr>
    <?php $sn_count++;
    endforeach; ?>

</table>
<?php 
if ($datacount>=10) {
?>
<footer style="margin-left:40%;">
    <ul class="pagination" >
      <?= $this->Paginator->prev("<<") ?>
      <?= $this->Paginator->numbers() ?>
      <?= $this->Paginator->next(">>") ?>
      </ul> 
  </footer>
  <?php } ?>
</div>
