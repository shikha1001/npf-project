<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class AnswersTable extends Table
{
	public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('answers');
    }

	public function ValidationDefault(validator $validator)
	{
		
		 $validator->integer('id_query')
                  ->allowEmpty('id_query');

         $validator->requirePresence('query')
                  /*->notEmpty('query', 'We need your Query')*/
                  ->add('query', ['maxLength' => ['rule' => ['maxLength', 500],'message' => 'Query cannot be too long']
                   ]);

         $validator->requirePresence('user_id')
		              ->notEmpty('user_id');

		 $validator->requirePresence('registration_no')
		          ->notEmpty('registration_no');

		$validator->allowEmpty('photo');
		         return $validator;
    
	}
  public function replyadminuser($id_query)
  {
    $reply=$this->find()->where(['Answers.id_query'=>$id_query])
    ->select(['id_query'=>'Answers.id_query','query'=>'Answers.query','query_reply'=>'AnswersDetails.query_reply',])
    ->join([
        'AnswersDetails' => [
            'table' => 'answers_details',
            'type' => 'LEFT',
            'conditions' =>'AnswersDetails.id_query=Answers.id_query'
        ]
    ])->toArray();
    return $reply;
  }
}