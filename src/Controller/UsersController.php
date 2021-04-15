<?php
namespace App\Controller;
use App\Model\Table;
use Cake\ORM\TableRegistry;
use cake\Event\Event;
use Cake\Mailer\Email;

class UsersController extends AppController
{
  public function initialize()
  {
    
    parent::initialize();
     $this->loadComponent('Paginator');
    $this->loadcomponent('Flash');
    $this->loadModel('Users');
    //$this->loadModel('Answers');
   
   
   
  }
  public function beforeFilter(Event $event)
  {
     parent::beforeFilter($event);
     $this->Auth->config();
     $this->Auth->allow(['logout']);
  }

  //login 
    
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


   public function index()
  
  { //pr($_SESSION); exit;
  	$this->viewBuilder()->setLayout('userslayout');
    $group_id= $this->request->session()->read('Auth.User.group_id');
    if($group_id==0)
    {
      return $this->redirect(['controller'=>'Users','action' => 'indexusers']);
    }
    else
    {
       $users =TableRegistry::get('Users');
      $data=$users->indexadmin();
       $datacount=count($data->toArray());

    }
  /*pr($data);
    pr($data->toArray());
    exit;*/
     //echo count($data ); exit;
    $this->set('datacount',$datacount);
    $this->set(compact('data')); 
    $this->set('_serialize',['data'],$this->Paginate($data, ['limit'=> '10']));
  }
  public function usersdetails()
  {
     $group_id= $this->request->session()->read('Auth.User.group_id');
    if($group_id==0)
    {
      return $this->redirect(['controller'=>'Users','action' => 'indexusers']);
    }
    else
    {
    $this->viewBuilder()->setLayout('userslayout');
     $users =TableRegistry::get('Users');
      $data=$users->usersdet();
      $datacount=count($data->toArray());
    }
    $this->set('datacount',$datacount);
    $this->set(compact('data'));
    $this->set('_serialize',['data'],$this->Paginate($data, ['limit'=> '10']));
  }  
   
  public function indexusers($id)
 { //pr($_SESSION); 
    //pr($_SESSION['user']['id']); exit;
  	$this->viewBuilder()->setLayout('userslayout');

    $group_id= $this->request->session()->read('Auth.User.group_id');
    if($group_id==1)
    {
      return $this->redirect(['controller'=>'Users','action' => 'index']);
    }
    else
    {

      $users =TableRegistry::get('Users');
      $data=$users->userindex($id);
      $datacount=count($data->toArray());//for count array
    } 
    $this->set('datacount',$datacount);
    $this->set(compact('data'));
    $this->set('_serialize',['data'],$this->Paginate($data, ['limit'=> '10']));
    //$this->set('userdata',$userdata);
    
  }
 
  
 public function add()
  {
    $this->viewBuilder()->setLayout('userslayout');
     $users = $this->Users->newEntity($this->request->data());
     if($this->request->is('post'))
     {
        $this->Users->patchEntity($users,$this->request->data());
        //pr($this->Users->save($users)); exit;
        if($this->Users->save($users))
        {
             $this->Flash->success(__('Your account has been registered .'));
             return $this->redirect(['action' => 'login']);
        }
      $validation=$users->errors();
      if(!empty($validation))
      {
      $this->Flash->set($validation,["element"=>"users_error"]);
      }

        $this->Flash->error(__('Unable to register your account.'));
      }
       $this->set('Users',$users);
  }

}