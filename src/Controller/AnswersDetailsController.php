<?php
namespace App\Controller;
use App\Model\Table;
use Cake\ORM\TableRegistry;

use Cake\Mailer\Email;
use Cake\Mailer\MailerAwareTrait;
class AnswersDetailsController extends AppController
{
  public function initialize()
  {
    //$this->viewBuilder()->setLayout('userslayout');
    parent::initialize();
    $this->loadcomponent('Flash');
    $this->loadModel('AnswersDetails');
  }
//admin given reply
  use MailerAwareTrait;
  public function answerReply($id)
  {
    //pr($this->request->session()->read('usr')['email']);exit;
  	$this->viewBuilder()->setlayout('answersdetailslayout');
    $group_id= $this->request->session()->read('usr')['group_id'];
    //echo $group_id; exit;
    if($group_id==2)
    {
      return $this->redirect(['controller'=>'Users','action' => 'indexusers']);
    }
    else
    {
      
      $answersdetails =TableRegistry::get('AnswersDetails');
      $data=$answersdetails->joinreply($id);
      //pr($data->toArray()); exit;
      $qarr = array();
     foreach ($data as $key => $value)
     {
      $name= $value['name']; 
      $to=$value['email']; 
      //exit;
       $qarr[$value['query'].'~'.$value['photo']][] = $value;
     }
     
     $this->set(compact('qarr'));
   //pr($data); exit;
     $answersDetails = $this->AnswersDetails->newEntity();
     if($this->request->is('post'))
     {
        
        $this->AnswersDetails->patchEntity($answersDetails,$this->request->data());
       
        if($this->AnswersDetails->save($answersDetails))
        {
          
          $this->getMailer('User')->send('send_email_query',[$to]);//email send

            $this->Flash->success(__('Your reply has been submit .'));
             return $this->redirect(['controller'=>'Users','action' => 'index']);
        }
        $validation=$answersDetails->errors();
        if(!empty($validation))
        {
        $this->Flash->set($validation,["element"=>"answersdetails_error"]);
        }
        $this->Flash->error(__('Unable to submit your query reply.'));
      }
       $this->set('name',$name);
    }
   }


 
}