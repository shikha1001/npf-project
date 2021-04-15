    <h1 align="center"> Users Check Reply</h1>

<div>
<table  border="0" align="center"  style="height: 50%; width: 70%"; >
    <tr>
        
        
        <th>Query</th>
        <th>Reply</th>
    </tr>
     <?php foreach ($qarr as $k=>$v) : ?>
    <tr>
    	<td><?=$k ?></td>
        <td>
        <table  style="height: 50%; width: 70%;">
        <?php foreach ($v as $k1 => $v1) : ?>
    	<tr>
            <td><?php 
         echo $v1['query_reply'];
           
           ?>
           <td>
           
        </tr>
         <?php  endforeach; ?>
         </table> 
     </td>
    </tr>
    <?php 

     endforeach; ?>
</table>
</div>