<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Datasource\EntityInterface;
use Cake\Validation\Validator;
use Cake\ORM\Datasource;
use Cake\ORM\TableRegistry;

class StudentsTable extends Table
{
	public function initialize(array $config)
	{

	}
	public function ValidationDefault(validator $validator)
	{
       $validator->notEmpty('first_name');
       $validator->allowEmpty('last_name');
       $validator->requirePresence('email')
                 ->add('email', 'validFormat',['rule' => 'email',
        'message' => 'E-mail must be valid']);
       $validator->notEmpty('password','Please, enter your      password !')
                 ->add('password', ['compare' => ['rule' => ['compareWith', 'password2'],'message'=>"Password mismatch password confirm !"]]);
       $validator->notEmpty('city');
       $validator->allowEmpty('gender');
       return $validator;

	}
}