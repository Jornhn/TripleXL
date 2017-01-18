<?php
namespace App\Controller;

use Cake\Network\Request;
use Cake\Network\Response;

class CompetencesController extends AppController{

    public function __construct($request = null, $response = null, $name = null, $eventManager = null, $components = null)
    {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->loadModel('CategoriesCompetences');
        $this->loadModel('Categories');
    }

    public function isAuthorized($user)
    {
        if (isset($user['account_type']) && $user['account_type'] >= '2') {
            return true;
        }
        $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
        return false;
    }

    public function index(){
        if($this->isAuthorized($this->Auth->user())){
            $competences = $this->CategoriesCompetences->find()->contain(['Categories']);

            $this->set(compact('competences'));
        }
    }

    public function view($id = null){
        if($this->isAuthorized($this->Auth->user())) {
            $competences = $this->CategoriesCompetences->get($id, [
                'contain' => ['Categories']
            ]);

            $this->set(compact('competences', 'categories'));
        }
    }

    public function create(){

        $categories = $this->Categories->find('list', ['keyField' => 'id', 'valueField' => 'category']);
        $this->set(compact('categories'));

        $competence = $this->CategoriesCompetences->newEntity();
        if($this->isAuthorized($this->Auth->user())) {
            if ($this->request->is("post")) {

                if ($this->request->data['category_id'] == 0)
                {
                    $this->Flash->set('Categorie moet ingevuld zijn', ['key' => 'competence-error', 'params' => ['class' => 'alert alert-warning']]);
                    return;
                }

                $competence = $this->CategoriesCompetences->patchEntity($competence, $this->request->data);

                if ($this->CategoriesCompetences->save($competence)) {
                    $this->Flash->set('De gegevens zijn succesvol opgeslagen.', ['key' => 'competence-success', 'params' => ['class' => 'alert alert-success']]);
                    return $this->redirect(['controller' => 'Competences', 'action' => 'index']);
                }
                $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'competence-error', 'params' => ['class' => 'alert alert-danger']]);
            }
        }
    }

    public function edit($id = null){
        $competence = $this->CategoriesCompetences->get($id);
        if($this->isAuthorized($this->Auth->user())) {
            if ($this->request->is("put")) {
                $competence = $this->CategoriesCompetences->patchEntity($competence, $this->request->data);

                if ($this->CategoriesCompetences->save($competence)) {
                    $this->Flash->set('De competentie met id: ' . $id . ' is succesvol gewijzigd.', ['key' => 'competence-success', 'params' => ['class' => 'alert alert-success']]);
                    return $this->redirect(['controller' => 'Competences', 'action' => 'index']);
                }
                $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'competence-error', 'params' => ['class' => 'alert alert-danger']]);
            }
        }
        $categories = $this->Categories->find('list', ['keyField' => 'id', 'valueField' => 'category']);
        $this->set(compact('cvs', 'competence', 'categories'));
    }

    public function delete($id = null){
        if ($this->isAuthorized($this->Auth->user())) {
            $competence = $this->CategoriesCompetences->get($id);
            $this->set('competence', $competence);

            if ($this->CategoriesCompetences->delete($competence)) {
                $this->Flash->set('De competentie met id: ' . $id . ' is verwijderd.', ['key' => 'competence-success', 'params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['controller' => 'Competences', 'action' => 'index']);
            }
            $this->Flash->set('Er ging iets mis!', ['key' => 'competence-error', 'params' => ['class' => 'alert alert-danger']]);

        }
    }

}