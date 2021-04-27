<h1>Admin Dashbord</h1>
<!-- <?= $this->Html->link('Logout', ['action' => 'logout']) ?> -->
<div>
<table  border="1" align="center" >
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email Id</th>
        <th>Mobile Number</th>
        <th>Date</th>
        
        
    </tr>
    <?php 
    //$sn_count=1;
   // $this->Paginator->counter('{:start}');
   $sr_no=1; 
     foreach ($data as $usersdetails) :
     ?>
     
    <tr>
        <td><?= $usersdetails->id?></td>
        <td><?= $usersdetails->name ?></td>
        <td><?= $usersdetails->email  ?></td>
        <td><?= $usersdetails->mobile_no ?></td>
         <td> <?= $usersdetails->created->format('y-m-d H:m:s') ?></td>
    </tr>
     <?php //$sn_count++;
    
    endforeach;?>

</table>
<?php 
if ($datacount>=10) {
  # code...

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
