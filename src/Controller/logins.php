 <?php
 public function login()
   {
// $this->request->getSession()->destroy('usr');
      //pr($this->request->session()->read('usr'));
     
     if($this->request->session()->read('usr'))
     {
      $id=$this->request->session()->read('usr')['id']
       return $this->redirect(['controller'=>'Users','action' => 'indexusers',$id]);
     }
     
     if ($this->request->is('post'))
     {
     $user = $this->Auth->identify();
   
     $data= $user['id'];
           
     if ($data==1)
      {
           $this->Auth->setUser($user);
           $session = $this->request->getSession();
           $session->write('usr',$user);
           
           $this->Flash->success(__('admin'));
           return $this->redirect($this->Auth->redirectUrl());
       }
       elseif($data)
       {
          //$this->Flash->success(__('user '));
          $this->Auth->setUser($user);
          $session = $this->request->getSession();
           $users_session=$session->write('usr',$user);
          
          //return $this->redirect(['action' => 'indexusers']);
          $this->Flash->success(__('user'));
          $id= $user['id'];
          return $this->redirect(['action' => 'index'],$id);
       }
       else
       {
       $this->Flash->error(__('Invalid username or password, try again'),['key' => 'auth']);
       }
       
      }            
     //}
   }
   ?>
