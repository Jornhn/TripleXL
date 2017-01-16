<?php
namespace App\Controller;

use Cake\Network\Request;
use Cake\Network\Response;

class CategoriesController extends AppController{

    public function __construct($request = null, $response = null, $name = null, $eventManager = null, $components = null){
        parent::__construct($request, $response, $name, $eventManager, $components);
    }

    public function isAuthorized($user){
        if (isset($user['account_type']) && $user['account_type'] >= '2') {
            return true;
        }
        return false;
        $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
    }

    public function index(){
        if($this->isAuthorized($this->Auth->user())){
            $query = $this->Categories->find();
            $results = $query->all();

            $this->set('categories', $results);
        }
    }

    public function view($id = null){
        if($this->isAuthorized($this->Auth->user())) {
            if (empty($id)) {
                throw new NotFoundException;
            }
            $category = $this->Categories->get($id);
            $this->set('category', $category);
        }
    }

    public function create(){
        if($this->isAuthorized($this->Auth->user())) {
            if ($this->request->is("post")) {
                $entity = $this->Categories->newEntity($this->request->data());
                debug($this->request->data());
                debug($entity);
                if ($this->Users->save($entity)) {
                    $this->Flash->set('De gegevens zijn succesvol opgeslagen.', ['key' => 'category-success', 'params' => ['class' => 'alert alert-success']]);
                    return $this->redirect(['controller' => 'categories', 'action' => 'index']);
                }
                $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'category-error', 'params' => ['class' => 'alert alert-danger']]);
            }
        }
    }

}