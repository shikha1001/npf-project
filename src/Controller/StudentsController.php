<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\Table\UsersTable;
use Cake\Validation\Validator;
use Cake\Event\Event;

class StudentsController extends AppController
{
  public function initialize()
  {
    
    parent::initialize();
     $this->loadComponent('Paginator');
    $this->loadcomponent('flash');
    $this->loadModel('Students');
   }
   public function add()
   {
   	$students = $this->Students->newEntity();
     if($this->request->is('post'))
     {
        $this->Students->patchEntity($students,$this->request->data());
        /*$students->id = $this->Auth->students('id');*/
        if($this->Students->save($students))
        {
             $this->Flash->success(__('Your account has been registered .'));
             return $this->redirect(['action' => 'login']);
        }
        $this->Flash->error(__('Unable to register your account.'));
      }
       $this->set('Students',$students);
   }
   
   public function addquerry()
  {
  	$students=$this->Students->get(1);

     if($this->request->is('post'))
     {
     
      #print_r('asdas');
           //die();
           #$regi=$this->request->getData('$value');
           $fileobject = $this->request->getData();
           
            $uploadPath = 'img/uploads/';
            $destination = $uploadPath.$fileobject->getClientFilename();
            // Existing files with the same name will be replaced by clientfilename.
            $fileobject->moveTo($destination);

        $this->Students->patchEntity($students,$this->request->getdata());
        
        if($this->Students->save($students))
        {


             $this->Flash->success(__('Your Querry has been submitted .'));
             return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Unable to submit your querry.'));
      }
       $this->set('Students',$students);
     
  }
}
        