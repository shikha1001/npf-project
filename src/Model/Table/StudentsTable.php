<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Datasource\EntityInterface;
use Cake\Validation\Validator;
use Cake\ORM\Datasource;
use Cake\ORM\TableRegistry;
class StudentsTable extends Table
{
 

  public function ValidationDefault(validator $validator)
  {
   $validator->requirePresence('name')
            ->notEmpty('name', 'We need your Name.');
   $validator->requirePresence('email')
            ->notEmpty('email', 'We need your Email.')
            ->add('email', 'validFormat', [
                  'rule' => 'email', 'message' => 'E-mail must be valid']);
   $validator->notEmpty('mobile_no','We need you Mobile number.')
              ->lengthBetween('mobile_no', [10,10]);
              
   $validator->allowEmpty('city');

   $validator->requirePresence('password')
   ->notEmpty('password','Please, enter your password !')
            ->add('password', ['compare' => ['rule' => ['compareWith', 'password2'],'message'=>"Password mismatch password confirm !"]]);
   return $validator;

    
        
  }


}

?>