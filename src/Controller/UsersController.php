<?php
namespace App\Controller;
use App\Model\Table;
use Cake\ORM\TableRegistry;
use cake\Event\Event;
//use Cake\ORM\Entity;
use Cake\Mailer\Email;

use Cake\Mailer\MailerAwareTrait;
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
    if($this->request->session()->read('usr'))
     {
        $id=$this->request->session()->read('usr')['id'];
        return $this->redirect(['controller'=>'Users','action' => 'indexusers',$id]);
     }
     if($this->request->session()->read('admin'))
     {
        return $this->redirect(['controller'=>'Users','action' => 'index']);
     }
     
     if ($this->request->is('post'))
     {
        $user = $this->Auth->identify();
   
        $group_id= $user['group_id'];
           
     if ($group_id==1)
      {
         $this->Auth->setUser($user);
         $session = $this->request->getSession();
         $session->write('admin',$user);
           
         $this->Flash->success(__('Successfully login admin'));
         return $this->redirect($this->Auth->redirectUrl());
       }
       elseif($group_id==2)
       {
          //$this->Flash->success(__('user '));
          $this->Auth->setUser($user);
          $session = $this->request->getSession();
           $users_session=$session->write('usr',$user);
          
          //return $this->redirect(['action' => 'indexusers']);
          $this->Flash->success(__('Successfully login '));
          $id= $user['id'];
         // echo $id;
          return $this->redirect(['action' => 'indexusers',$id]);
       }
       else
       {
       $this->Flash->error(__('Invalid username or password, try again'),['key' => 'auth']);
       }
    }
  }
 //logout
 public function logout()
    { 
     //$group_id= $this->request->session()->read('Auth.User.group_id');
    
        $this->request->getSession()->destroy('usr');
        $this->request->getSession()->destroy('admin');
        return $this->redirect($this->Auth->logout());
        return $this->redirect($this->Auth->redirectUrl());
    }
//Admin DASHBOARD 
   public function index()
  
  { //pr($_SESSION); exit;
  	$this->viewBuilder()->setLayout('userslayout');
    $group_id= $this->request->session()->read('Auth.User.group_id');
    if($group_id==2)
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
//all users details in admin panel
  public function usersdetails()
  {
     $group_id= $this->request->session()->read('Auth.User.group_id');
    if($group_id==2)
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
//USER DASHBOARD   
  public function indexusers($id)
 { //pr($_SESSION); 
    //pr($_SESSION['user']['id']); exit;
    //$this->set('title','Welcome to Query Mangement Portal');
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
  //registeration
use MailerAwareTrait;

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
            $this->getMailer('User')->send('welcome',[$users]);

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