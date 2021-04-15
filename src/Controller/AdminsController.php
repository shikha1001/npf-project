<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class AdminsController extends AppController
{
  public function initialize()
  {
    
    parent::initialize();
    $this->loadcomponent('flash');
    $this->loadModel('students');
    $this->loadModel('querry');
  }
  public function index()
  {
  	$students=$this->set('students',$this->Students->find('all')->order(['id DESC']));

  }
  public function edit()
  {  
  	 $this->autoRender=false;
     $student = $this->set('students',$this->Students->find('all'));
     print_r($student);
  }
}