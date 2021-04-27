<?php
 public function login()
    {
      $this->viewBuilder()->setLayout('userslayout');
      //$this->request->getSession()->destroy('usr');
       //$group_id= $this->request->session()->read('Auth.User.group_id');
    //echo $group_id; 
      //pr($this->request->session()->read('usr')['email']); exit;
      if($this->request->session()->read('usr'))
      {
        return $this->redirect(['controller'=>'Users','action' => 'index']);
      }
      elseif($this->request->session()->read('admin'))
      {
        $id = $this->request->session()->read('admin')['id'];
        return $this->redirect(['controller'=>'Users','action' => 'indexusers',$id]);
      }
      else
      {
        if($this->request->is('post'))
        {
         // pr($this->request->getData());
        $user = $this->Auth->identify();
       // pr($user);
        $group_id= $user['group_id'];
       // pr($group_id);exit;     
        if ($group_id==1)
        {
            $this->Auth->setUser($user);
            $session = $this->request->getSession();
            $session->write('usr',$user);
            $this->Flash->success(__(' Successfully login Admin'));
           return $this->redirect($this->Auth->redirectUrl());
       
        }

        elseif($group_id==0)
        {
         
          //die();
           //$this->Flash->success(__('Successfully login '));
           $this->Auth->setUser($user);
           $session = $this->request->getSession();
            $users_session=$session->write('admin',$user);
            $id=$user['id'];
             $this->Flash->success(__('Successfully login '));
           return $this->redirect(['action' => 'indexusers',$id]);
        }
//}
        else
         {
        $this->Flash->error(__('Invalid username or password, try again'));
         }
         
       }             
      }
    }
    
    
   //logout
    public function logout()
    { //pr($this->request->session()->read('usr')); exit;
     //$group_id= $this->request->session()->read('Auth.User.group_id');
    //echo $username; exit;
   $this->request->getSession()->destroy('usr');
   $this->request->getSession()->destroy('admin');
    /* if($group_id==1)
     {
      $this->request->getSession()->destroy('usr');
     }
     elseif($group_id==0){
      $this->request->getSession()->destroy('admin');
     }*/
      
        return $this->redirect($this->Auth->logout());
        return $this->redirect($this->Auth->redirectUrl());
    }