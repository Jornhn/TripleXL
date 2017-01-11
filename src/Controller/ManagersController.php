<?php
namespace App\Controller;

use Cake\Network\Request;
use Cake\Network\Response;

class ManagersController extends AppController
{

    public function __construct($request = null, $response = null, $name = null, $eventManager = null, $components = null){
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->loadModel('Users');
    }

    public function index(){
        $query = $this->Users->find()->where(['account_type' => 'manager']);
        $results = $query->all();

        $this->set('managers', $results);
    }

    public function create(){
        if($this->request->is("post")){
            $entity = $this->Users->newEntity($this->request->data());
            if ($this->Users->save($entity)) {
                return $this->redirect(
                    ['controller' => 'managers', 'action' => 'index']
                );
            }
        }
    }

    public function edit($id = null){
        if (empty($id)) {
            throw new NotFoundException;
        }
        $manager = $this->Users->get($id);
        $this->set('manager', $manager);

        if($this->request->is("put")){
            $entity = $this->Users->newEntity($this->request->data());
            debug($this->Users->save($entity));
            if ($this->Users->save($entity)) {
                return $this->redirect(
                    ['controller' => 'managers', 'action' => 'index']
                );
            }
        }
    }

    public function delete($id = null){
        if (empty($id)) {
            throw new NotFoundException;
        }
        $manager = $this->Users->get($id);
        $this->set('manager', $manager);

        if($this->request->is("put")){
            if ($this->Users->delete($manager)) {
                return $this->redirect(['controller' => 'managers', 'action' => 'index']);
            }
        }
    }

}