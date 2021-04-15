 <?php
 public function login()
   {
// $this->request->getSession()->destroy('usr');
      //pr($this->request->session()->read('usr'));
     
     if($this->request->session()->read('usr'))
     {
       return $this->redirect(['controller'=>'Users','action' => 'indexusers']);
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
           return $this->redirect(['action' => 'index']);
           $this->Flash->success(__('admin'));
       }
       elseif($data)
       {
          //$this->Flash->success(__('user '));
          $this->Auth->setUser($user);
          $session = $this->request->getSession();
           $users_session=$session->write('usr',$user);
          return $this->redirect($this->Auth->redirectUrl());
          //return $this->redirect(['action' => 'indexusers']);
          $this->Flash->success(__('user'));
       }
       else
       {
       $this->Flash->error(__('Invalid username or password, try again'),['key' => 'auth']);
       }
       
      }            
     //}
   }
   ?>
