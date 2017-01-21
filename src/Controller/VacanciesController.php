<?php
/**
 * Created by PhpStorm.
 * User: Emil
 * Date: 11-01-17
 * Time: 09:35
 */

namespace App\Controller;

class VacanciesController extends AppController
{
    public function index()
    {
        $vacancies = $this->Vacancies->find('all')->where(['vacancies.user_id' => $this->Auth->user('id')]);

        if ($this->Auth->user('account_type') >= 2) {
            $vacancies = $this->Vacancies->find()->contain(['Users']);
            $first_vacancy = $this->Vacancies->find()->contain(['Users'])->first();
        }

        if ($this->Auth->user('account_type') === 0) {
            return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
        }
        $this->set(compact('vacancies', 'first_vacancy'));
    }

    public function view($id)
    {
        $vacancies = $this->Vacancies->get($id, ['contain' => ['Categories', 'CategoriesCompetences']]);

        if ($this->Auth->user('id') === $vacancies->user_id or $this->Auth->user('account_type') >= 2) {
            $this->set('vacancies', $vacancies);
        }
        else {
            return $this->redirect(['controller' => 'Cvs', 'action' => 'index']);
        }
    }

    public function create()
    {
        $vacancies = $this->Vacancies->newEntity();
        if ($this->request->is('post')) {
            $vacancies = $this->Vacancies->patchEntity($vacancies, $this->request->data);
            $vacancies->user_id = $this->Auth->user('id');

            dump($this->request->data);

            if ($this->Vacancies->save($vacancies)) {
                $this->Flash->set('De CV is succesvol opgeslagen!', ['key' => 'cv-success', 'params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['action' => 'index']);
            }
            else {
                $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'cv-error', 'params' => ['class' => 'alert alert-danger']]);
            }
        }

        if ($this->Auth->user('account_type') === 0){
            return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
        }
        $categories = $this->Vacancies->Categories->find('list', ['keyField' => 'id', 'valueField' => 'category']);

        $this->set(compact('vacancies', 'categories', 'competences'));
        $this->set('_serialize', ['vacancies']);
    }

    public function edit($id = null)
    {
        $vacancies = $this->Vacancies->get($id, ['contain' => ['Categories', 'CategoriesCompetences']]);

        if ($this->Auth->user('id') === $vacancies->user_id or $this->Auth->user('account_type') >= 2) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $vacancies = $this->Vacancies->patchEntity($vacancies, $this->request->data);
                if ($this->Vacancies->save($vacancies)) {
                    $this->Flash->set('De vacature is succesvol opgeslagen!', ['key' => 'vacancy-success', 'params' => ['class' => 'alert alert-success']]);
                    return $this->redirect(['action' => 'index']);
                }
                else {
                    $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'vacancy-error', 'params' => ['class' => 'alert alert-danger']]);
                }
            }
        }
        else {
            if ($this->Auth->user('account_type') !== 3) {
                return $this->redirect(['controller' => 'Vacancies', 'action' => 'index']);
            }
        }

        if ($this->Auth->user('account_type') === 0){
            return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
        }
        $categories = $this->Vacancies->Categories->find('list', ['keyField' => 'id', 'valueField' => 'category']);

        $this->set(compact('vacancies', 'categories', 'competences'));
        $this->set('_serialize', ['vacancies']);
    }

    public function delete($id)
    {
        $vacancies = $this->Vacancies->get($id);
        if ($this->Auth->user('id') === $vacancies->user_id or $this->Auth->user('account_type') >= 2) {
            $this->request->allowMethod(['post', 'delete', 'get']);
            if ($this->Vacancies->delete($vacancies)) {
                $this->Flash->set('Uw vacature is verwijderd!', ['key' => 'vacancy-success','params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['action' => 'index']);
            }
        }
        else {
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Auth->user('account_type') === 0){
            return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
        }
    }
}
