<h1>Users Dashbord</h1>

  <?php 
   /* foreach ($id_data as $id_login) :
    echo "<a href='".$this->Url->build(["controller" => "Answers","action"=>"upload",$id_login->id])."'><button type= 'button'>Add</button></a>";
    endforeach*/
  ?>
 </div>
<div>   
<table  border="1" align="center" >
    <tr>
        <th>SrNo</th>
        <th>Registration Number</th>
        <th>Querry</th>
        <th>Date</th>
        <th>Action</th >
    </tr>

    <!-- Here is where we iterate through our studentss query object, printing out student info -->

   

    <?php 
        $sn_count = 1;
     foreach ($data as $key=>$v) : ?>
    
    <tr>
        <td><?= $sn_count ?></td>

        <td><?= $v['registration_no'] ?>
            
                
        </td>
        <td>
            <?php
            echo substr($v['query'],0,20); 
            ?>
        </td>
        <td><?= $v['created']->format('y-m-d H:m:s') ?>
             
        </td>
         <td>
            <?php echo "<a href='".$this->Url->build(["controller"=>"Answers","action"=>"replyadmin",$v['id_query']])."'>ViewReply</a>";?>
            
        </td>
    </tr>
    <?php $sn_count++; 

      endforeach; ?>
</table>
<!-- <?php //foreach ($userdata as $user) {  ?>
  
 <?php //echo  $user->id_query;   } ?> -->
 <?php
 if($datacount>=10)
 { ?> 
<footer style="margin-left:40%;" >
    <ul class="pagination" >
      <?= $this->Paginator->prev("<<") ?>
      <?= $this->Paginator->numbers() ?>
      <?= $this->Paginator->next(">>") ?>
      </ul> 
  </footer>
 <?php }
?>
</div>
