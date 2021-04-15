<?
namespace App\Model\Table;
use Cake\ORM\Table;
use App\Model\Entity\Categories;
use Cake\Validation\Validator;

class CategoriesTable extends Table
{
	public function initialize(array $config)
	{
		$this->addBehaviour('Tree');
		$validator = new Validator();
	}
	public function validationDefault (Validator $validator)
	{
		$validator->add('id','valid',['rule'=>'numeric'])
    	->allowEmptyString('id','create');
    	$validator->add('lft','valid',['rule'=>'numeric'])
    	->notEmpty('lft');
    	$validator->add('id','valid',['rule'=>'numeric'])
    	->notEmpty('rght');
		$validator
		->notEmpty('name')
		->requiredPresence('name');
		$vaildator->allowEmptyString('description');
		
		return $validator;
	}
}
