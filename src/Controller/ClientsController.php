<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Validation\Validator;



 class ClientsController extends AppController
 {
 	public function initialize()
 	{
 		parent::initialize();
 		$this->TableRegistry::get('Clients');
 		$this->ConnectionManager::get('default');
 		$this->loadComponent('flash');//We use FlashComponent’s success() and error() methods to set a message to a session variable

 	}
 	public function index()
{
$this->set('clients',$this->Clients->find('all'));
}
public function view($id)
{
$client = $this->Clients->get($id);
$this->set('client',$client);

}
public function add()
{
$client = $this->Clients->newEntity();
if($this->request->is('post')) {
$this->Clients->patchEntity($client,$this->request->data);
if($this->Clients->save($client)){
$this->Flash->success(__('Your account has been registered .'));
return $this->redirect(['action' => 'index']);
}
$this->Flash->error(__('Unable to register your account.'));
}
$this->set('client',$client);
}
public function edit($id)
{
$client = $this->Clients->get($id);
if ($this->request->is(['post', 'put'])) {
$this->Clients->patchEntity($client, $this->request->data);
if ($this->Clients->save($client)) {
$this->Flash->success(__('Your profile data has been updated.'));
return $this->redirect(['action' => 'index']);
}
$this->Flash->error(__('Unable to update your profile.'));
}

$this->set('client', $client);

}
public function delete($id)
{
$this->request->allowMethod(['post', 'delete']);

$client = $this->Clients->get($id);
if ($this->Clients->delete($client)) {
$this->Flash->success(__('The client with id: {0} has been deleted.', h($id)));
return $this->redirect(['action' => 'index']);
}

}
}

?>
 } 

