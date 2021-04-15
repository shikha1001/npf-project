<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\Model;
use Cake\validation\validator;



class CategoriesController extends AppController
{
    public function initialize()
    {
        $this->loadModel('categories');
    }
    /*public function index()
    {
        $categories = $this->Categories->find()
            ->order(['lft' => 'ASC']);
        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);
    }

    public function moveUp($id = null)
    {
        $this->request->allowMethod(['post', 'put']);
        $category = $this->Categories->get($id);
        if ($this->Categories->moveUp($category)) {
            $this->Flash->success('The category has been moved Up.');
        } else {
            $this->Flash->error('The category could not be moved up. Please, try again.');
        }
        return $this->redirect($this->referer(['action' => 'index']));
    }

    public function moveDown($id = null)
    {
        $this->request->allowMethod(['post', 'put']);
        $category = $this->Categories->get($id);
        if ($this->Categories->moveDown($category)) {
            $this->Flash->success('The category has been moved down.');
        } else {
            $this->Flash->error('The category could not be moved down. Please, try again.');
        }
        return $this->redirect($this->referer(['action' => 'index']));
    }*/
    public function add()
    {
        $categories=$this->Categories->newEntity();
        if($this->request->is('post'))
        {
            $categories=$this->Categories->patchEntity($categories,$this->request->getdata());
            if($this->request->save())
            {
                $this->Flash->success(__('successfully'));
                return $this->redirect($this->referer(['action'=>'index']));
            }
            $this->Flash->error(__('Try Again'));
        }

    }
}
?>