<?php
namespace App\Controller;
use App\Model\Table;
use Cake\ORM\TableRegistry;
use cake\Event\Event;

class AnswersDetailsController extends AppController
{
  public function initialize()
  {
    //$this->viewBuilder()->setLayout('userslayout');
    parent::initialize();
    $this->loadcomponent('Flash');
    $this->loadModel('AnswersDetails');
  }
  public function answerReply($id)
  {
    //pr($this->request->session()->read('usr')['email']);exit;
  	$this->viewBuilder()->setlayout('answersdetailslayout');
    $group_id= $this->request->session()->read('usr')['group_id'];
    //echo $group_id; exit;
    if($group_id==0)
    {
      return $this->redirect(['controller'=>'Users','action' => 'indexusers']);
    }
    else
    {
      
      $answersdetails =TableRegistry::get('AnswersDetails');
      $data=$answersdetails->joinreply($id);
      $qarr = array();
     foreach ($data as $key => $value)
     {
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
       //$this->set('AnswersDetails',$answersDetails);
    }
   }
function sendEmail()
{
  //$this->autoRender('false');
    $this->viewBuilder()->setlayout('answersdetailslayout');
    $to = "ssahushikha956@gmail.com";
    $subject = "My subject";
   $txt = "Hello world!";
   $headers = " sahushik" . "\r\n" .
    "CC: somebodyelse@example.com";

    if(mail($to,$subject,$txt,$headers))
    {
      echo "mail sent shikha";
    }
    else
    {
       echo "mail not sent";
    }

}


  /*  function sendEmail()
  {      
     $this->viewBuilder()->setlayout('answersdetailslayout');  
           $message = "Hello User";            
            $email = new Email();
            $email->transport('mail');
            $email->from(['Sender_Email_id' => 'Sender Name'])
            ->to('sahushikha956@gmail.com')
            ->subject(‘Test Subject’)
            //->attachments($path) //Path of attachment file
            ->send($message);

   }*/
}