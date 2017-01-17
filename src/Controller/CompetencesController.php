<?php
namespace App\Controller;

use Cake\Network\Request;
use Cake\Network\Response;

class CompetencesController extends AppController{

    public function __construct($request = null, $response = null, $name = null, $eventManager = null, $components = null){
        parent::__construct($request, $response, $name, $eventManager, $components);

        $this->loadModel('Categories');
        $this->loadModel('CategoriesCompetences');
    }


    public function isAuthorized($user){
        if (isset($user['account_type']) && $user['account_type'] >= '2') {
            return true;
        }
        $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
        return false;

    }

    public function index(){
        if($this->isAuthorized($this->Auth->user())){
            $query = $this->Competences->find();
            $results = $query->all();

            $this->set('competences', $results);
        }
    }

    public function view($id = null){
        if($this->isAuthorized($this->Auth->user())) {
            if (empty($id)) {
                throw new NotFoundException;
            }
            $competence = $this->Competences->get($id);
            $categoriesCompetences = $this->CategoriesCompetences->find('all', [
                'conditions' => [
                    'CategoriesCompetences.competence_id' => $id
                ]
            ]);

            $categorie = $this->Categories->get($categoriesCompetences->first()->category_id);

            $this->set(compact('competence', 'categorie'));
        }
    }

    public function create(){
        $categories = $this->Categories->find('list', ['keyField' => 'id', 'valueField' => 'category']);
        $this->set(compact('categories'));
        if($this->isAuthorized($this->Auth->user())) {
            if ($this->request->is("post")) {
                $entity = $this->Competences->newEntity($this->request->data());

                $competence = $this->Competences->save($entity);
                if ($competence) {
                    $competenceEntity = $this->CategoriesCompetences->newEntity(['CategoriesCompetences' => ['category_id' => $this->request->data('category_id'), 'competence_id' => $competence->id]]);
                    if ($this->CategoriesCompetences->save($competenceEntity))
                    {
                        $this->Flash->set('De gegevens zijn succesvol opgeslagen.', ['key' => 'competence-success', 'params' => ['class' => 'alert alert-success']]);
                        return $this->redirect(['controller' => 'Competences', 'action' => 'index']);
                    }
                }
                $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'competence-error', 'params' => ['class' => 'alert alert-danger']]);
            }
        }
    }

    public function edit($id = null){
        if($this->isAuthorized($this->Auth->user())) {
            if (empty($id)) {
                throw new NotFoundException;
            }
            $competence = $this->Competences->get($id, [
                'contain' => ['Categories']
            ]);

            $categories = $this->Categories->find('list', ['keyField' => 'id', 'valueField' => 'category']);
            $categoriesCompetences = $this->CategoriesCompetences->find('all', [
                'conditions' => [
                    'CategoriesCompetences.competence_id' => $id
                ]
            ]);

            $categoriesCompetence = $this->CategoriesCompetences->get($categoriesCompetences->first()->id);

            $this->set(compact('categories', 'competence', 'categoriesCompetences'));

            if ($this->request->is("put")) {
                $entity = $this->Competences->patchEntity($competence, $this->request->data);
                $competenceEntity = $this->CategoriesCompetences->patchEntity($categoriesCompetence, ['CategoriesCompetences' => ['category_id' => $this->request->data('category_id'), 'competence_id' => $id]]);
                if ($this->Competences->save($entity) && $this->CategoriesCompetences->save($competenceEntity)) {
                    $this->Flash->set('De competentie met id: ' . $id . ' is succesvol gewijzigd.', ['key' => 'competence-success', 'params' => ['class' => 'alert alert-success']]);
                    return $this->redirect(['controller' => 'Competences', 'action' => 'index']);
                }
                $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'competence-error', 'params' => ['class' => 'alert alert-danger']]);
            }
        }
    }

    public function delete($id = null){
        if ($this->isAuthorized($this->Auth->user())) {
            if (empty($id)) {
                throw new NotFoundException;
            }
            $competence = $this->Competences->get($id);
            $this->set('competence', $competence);

            if ($this->Competences->delete($competence)) {
                $this->Flash->set('De categorie met id: ' . $id . ' is verwijderd.', ['key' => 'competence-success', 'params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['controller' => 'Competences', 'action' => 'index']);
            }
            $this->Flash->set('Er ging iets mis!', ['key' => 'competence-error', 'params' => ['class' => 'alert alert-danger']]);

        }
    }

}