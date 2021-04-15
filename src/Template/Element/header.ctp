<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <nav class="top-bar expanded" data-topbar role="navigation" >
    	<div style="background-color:DodgerBlue;">
    	<span style="margin-left:40%;font-size:25px;color:white">Query Mangement Portal</span>
        <!-- <ul class="title-area large-3 medium-4 columns"></ul> -->
        </div>

        <div class="top-bar-section" style="height:50px;">
         
        <?php
          if($Auth->user('id')!=1) {
          $this->Breadcrumbs->add([
            ["title"=>"Registration","url"=>["controller"=>"Users","action"=>"add"]]
            ]);  ?>

            
        <?php
         $id_login=$Auth->user('id');
          $this->Breadcrumbs->add([
             ["title"=>"Dashboard","url"=>["controller"=>"Users","action"=>"indexusers",$id_login]]
                ]); ?>
        <?php
           //foreach ($id_data as $id_login) :
          $id_login=$Auth->user('id');
          $this->Breadcrumbs->add([
                ["title"=>"Query","url"=>["controller"=>"Answers","action"=>"upload",$id_login] ] 
                ]); 
              //endforeach;
      } ?>
  
        
          <?php
          if($Auth->user('id')==1) {
          $this->Breadcrumbs->add([
              ["title"=>"Dashboard","url"=>["controller"=>"Users","action"=>"index"]]
              ]);
           ?>
          <?php
          $this->Breadcrumbs->add([ 
              ["title"=>"UsersDetails","url"=>["controller"=>"Users","action"=>"usersdetails"]]
              ]);
          }?>
            
            
       
        <div style="margin-right:170px;">
        <?php
          $this->Breadcrumbs->add([
              ["title"=>"Logout","url"=>["controller"=>"Users","action"=>"logout"]]  
              ]);
            ?> 

         </div>
          <?php echo $this->Breadcrumbs->render(
           ['class' => 'breadcrumbs-trail'],
           ['separator' => '<i ></i>']
           );
        ?> 
         </div> 
    </nav>

</body>
</html>


