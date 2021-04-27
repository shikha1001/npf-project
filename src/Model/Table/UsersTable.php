<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
//use App\Model\Entity\User;
use Cake\ORM\TableRegistry;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('users');

    }
    public function validationDefault(Validator $validator)
    {
   $validator
            ->integer('id')
            ->allowEmpty('id');

        $validator
            ->requirePresence('name')
            ->notEmpty('name','Please Enter your Name');

        $validator
            ->requirePresence('email')
            ->notEmpty('email','Please Enter your Email Id')
            ->add('email', 'valid-email', ['rule' => 'email'])
            ->add('email', 'unique', [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'Email is already used'
             ]);

        $validator
             ->integer('mobile_no')
            ->requirePresence('mobile_no')
            ->notEmpty('mobile_no','Please Enter your Mobile Number')
            ->add('mobile_no', 'length', ['rule' => ['lengthBetween', 10, 10],'message'=>'Please enter valid Mobile No.']);

           

        $validator
            ->requirePresence('password')
            ->notEmpty('password','Please Enter your Password')
            ->add('confirm_password', 'no-misspelling', [
           'rule' => ['compareWith', 'password'],
           'message' => 'Passwords are not match.',
           ]);
       return $validator;
    }
    public function indexadmin()
    {
         $querydata = $this->find()->order(['Answers.id_query'=>'DESC'])
       ->select(['id'=>'Users.id','name'=>'Users.name','id_query'=>'Answers.id_query','query'=>'Answers.query','registration_no'=>'Answers.registration_no','created'=>'Answers.created'])
       ->join([
        'Answers' => [
            'table' => 'answers',
            'type' => 'INNER',
            'conditions' => 'Users.id = Answers.user_id'
        ]
      ]);
       return $querydata;
    }
    
    public function usersdet()
    {
        $users_query = $this->find()->order(['Users.id'=>'desc']);
        return $users_query;
    }
    public function userindex($id)
    {
       $id_login = $this->find()->order(['Answers.id_query'=>'DESC'])->where(['id'=>$id])
       ->select(['id'=>'Users.id','id_query'=>'Answers.id_query','query'=>'Answers.query','registration_no'=>'Answers.registration_no','created'=>'Answers.created'])
       ->join([
        'Answers' => [
            'table' => 'answers',
            'type' => 'INNER',
            'conditions' => 'Users.id = Answers.user_id'
        ]
      ]);
        return $id_login;
    }
 
}

?>