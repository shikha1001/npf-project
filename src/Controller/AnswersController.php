<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;




class AnswersController extends AppController
{
  public function initialize()
  {
  	   parent::initialize();
       
       $this->loadModel('Answers');
       $this->loadcomponent('flash');
       
  }
  public function replyadmin($id_query)
  {
     $this->viewBuilder()->setlayout('answerslayout');
     $group_id= $this->request->session()->read('Auth.User.group_id');
    if($group_id==1)
    {
      return $this->redirect(['controller'=>'Users','action' => 'index']);
    }
    else
    {
      $answers =TableRegistry::get('Answers');
      $data=$answers->replyadminuser($id_query);
     $qarr = array();
     foreach ($data as $key => $value)
     {
       $qarr[$value['query']][] = $value;
     }
    }
    //echo "<pre>"; print_r($qarr);die;
    //$this->set(compact('querydata'));
    $this->set(compact('qarr'));
  }
 
  public function upload()
  { 
    //pr($_SESSION); exit;
    $this->viewBuilder()->setlayout('answerslayout');
    $id= $this->request->session()->read('Auth.User.id');
    $group_id= $this->request->session()->read('Auth.User.group_id');
    if($group_id==1)
    {
      return $this->redirect(['controller'=>'Users','action' => 'index']);
    }
    else
    {

      $answers = $this->Answers->newEntity($this->request->data());

     if($this->request->is('post'))
    {
        $answers=$this->Answers->patchEntity($answers,$this->request->data());
       // pr($answers);exit;
     //echo $answers; exit;
        if(empty($this->request->data['photo']['name']))
        {
         if($this->Answers->save($answers))
        {
          
          $this->Flash->success(__('Your Querry has been submitted .'));
        return $this->redirect(['controller'=>'Users','action' => 'indexusers',$id]);

        } 
         $validation=$answers->errors();
      if(!empty($validation))
      {
      $this->Flash->set($validation,["element"=>"answers_error"]);
      }
      }
      elseif(!empty($this->request->data['photo']['name']))
      {  
        $file = $this->request->data['photo'];
        $ext = substr(strtolower(strrchr($file['name'], '.')), 1);//check typ of file 
        $arr_ext = array('jpg', 'jpeg', 'gif','png');
        $setNewFileName = rand(000000, 999999);//new file name in integer
        
        if (in_array($ext, $arr_ext))
        {
          $uploadpath="img/uploads/";
          
          $imageFileName = $setNewFileName . '.' . $ext;
          /*echo $imageFileName;
          exit;*/
          $uploadfile=$uploadpath.$imageFileName;
          if(move_uploaded_file($file['tmp_name'],$uploadfile))
          {
            $answers->photo=$imageFileName;

            if($this->Answers->save($answers))
            {
               $this->Flash->success(__('Your Query has been submitted .'));
               return $this->redirect(['controller'=>'Users','action' => 'indexusers',$id]);
            }
            
          $this->Flash->error(__('Unable to submit your querry.'));
          }
        
        }
        else
          {
            $this->Flash->error(__('Please upload only jpg,jpeg,png and gif file.'));
          }
        
        }
    }
  }
    $reg=rand(100000,999999);
    $this->set('reg_num',$reg);
    //$this->set('namedata',$namedata);
  //}
 }
  

}