<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class AnswersDetailsTable extends Table
{
	public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('answers_details');
    }

	public function ValidationDefault(validator $validator)
	{
		
		 $validator->integer('id')
                  ->allowEmpty('id');
		         
		$validator->requirePresence('query_reply')
               ->notEmpty('query_reply','Please Enter your reply query')
               ->add('query_reply', ['maxLength' => ['rule' => ['maxLength', 500],'message' => 'you cannot be reply too long']
                   ]);

		$validator->requirePresence('id_query')
                  ->notEmpty('id_query','enter id');
        
		
		return $validator;
    
	}
	public function joinreply($id)
	{
		 $querydata=$this->find()->where(['Answers.id_query'=>$id])
    ->select(['id_query'=>'Answers.id_query','query'=>'Answers.query','photo'=>'Answers.photo'])
    ->join([
        'Answers' => [
            'table' => 'answers',
            'type' => 'RIGHT',
            'conditions' => 'Answers.id_query = AnswersDetails.id_query'
        ]

    ]);
    return $querydata;
    
	}
}