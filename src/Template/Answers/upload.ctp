<?php
    echo $this->Form->create('querry',array('enctype'=>'multipart/form-data'));

      
        //echo $this->Auth->user('name');
       $username= strtoupper($this->request->session()->read('Auth.User.name'));

      echo $this->Form->control('name',array('value'=>$username,'readonly'));
         
     
     echo $this->Form->control('registration_no',array('type'=>'hidden','value'=>$reg_num));
       //echo $this->Form->input('registration_no');
       $data =$this->request->getParam('id');
       ///]echo $data;
       echo $this->Form->control('user_id',array('type'=>'hidden','value'=>$data));
       echo $this->Flash->render();
       echo $this->Form->control('query',['type'=>'textarea','label'=>'Query']);
     
       echo $this->Form->control('photo',['type'=>'file','label'=>'Upload',]);
       echo $this->Form->button('Submit');
       echo $this->Form->end();
       
    ?>
    
    

 	



