<?php
namespace App\Controller;

use Cake\Network\Request;
use Cake\Network\Response;

class CategoriesController extends AppController{


    public function __construct($request = null, $response = null, $name = null, $eventManager = null, $components = null)
    {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->loadModel('Competences');
        $this->loadModel('CategoriesCompetences');
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
            $competences = $this->loadModel('CategoriesCompetences')->findByCategory($id);

            $this->set('category', $category);
            $this->set('competences', $competences);
        }
    }

    public function create(){
        if($this->isAuthorized($this->Auth->user())) {
            if ($this->request->is("post")) {
                $entity = $this->Categories->newEntity($this->request->data());
                if ($this->Categories->save($entity)) {
                    $this->Flash->set('De gegevens zijn succesvol opgeslagen.', ['key' => 'category-success', 'params' => ['class' => 'alert alert-success']]);
                    return $this->redirect(['controller' => 'categories', 'action' => 'index']);
                }
                $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'category-error', 'params' => ['class' => 'alert alert-danger']]);
            }
        }
    }

    public function edit($id = null){
        if($this->isAuthorized($this->Auth->user())) {
            if (empty($id)) {
                throw new NotFoundException;
            }
            $category = $this->Categories->get($id);
            $this->set('category', $category);

            if ($this->request->is("put")) {
                $entity = $this->Categories->patchEntity($category, $this->request->data);
                if ($this->Categories->save($entity)) {
                    $this->Flash->set('De categorie met id: ' . $id . ' is succesvol gewijzigd.', ['key' => 'category-success', 'params' => ['class' => 'alert alert-success']]);
                    return $this->redirect(['controller' => 'categorieën', 'action' => 'index']);
                }
                $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'category-error', 'params' => ['class' => 'alert alert-danger']]);
            }
        }
    }

    public function delete($id = null){
        if ($this->isAuthorized($this->Auth->user())) {
            if (empty($id)) {
                throw new NotFoundException;
            }
            $category = $this->Categories->get($id);
            $this->set('category', $category);

            if ($this->Categories->delete($category)) {
                $this->Flash->set('De categorie met id: ' . $id . ' is verwijderd.', ['key' => 'category-success', 'params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['controller' => 'categorieën', 'action' => 'index']);
            }
            $this->Flash->set('Er ging iets mis!', ['key' => 'category-error', 'params' => ['class' => 'alert alert-danger']]);

        }
    }

}