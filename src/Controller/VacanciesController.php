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
        $vacancies = $this->Vacancies->find()->contain(['Users'])->where(['vacancies.user_id' => $this->Auth->user('id')]);
        $this->set(compact('vacancies'));
    }

    public function view($id)
    {
        $vacancies = $this->Vacancies->get($id, ['contain' => ['Categories', 'Competences']]);

        if ($this->Auth->user('id') !== $vacancies->user_id) {
            return $this->redirect(['controller' => 'Vacancies', 'action' => 'index']);
        }
        $this->set('vacancies', $vacancies);
    }

    public function create()
    {
        $vacancies = $this->Vacancies->newEntity();
        if ($this->request->is('post')) {
            $vacancies = $this->Vacancies->patchEntity($vacancies, $this->request->data);
            $vacancies->user_id = $this->Auth->user('id');

            if ($this->Vacancies->save($vacancies)) {
                $this->Flash->set('De vacature is succesvol opgeslagen!', ['key' => 'vacancy-success', 'params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['action' => 'index']);
            }
            else {
                $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'vacancy-error', 'params' => ['class' => 'alert alert-danger']]);
            }
        }
        $categories = $this->Vacancies->Categories->find('list', ['keyField' => 'id', 'valueField' => 'category']);

        $this->set(compact('vacancies', 'categories', 'competences'));
        $this->set('_serialize', ['vacancies']);
    }

    public function edit($id = null)
    {
        $vacancies = $this->Vacancies->get($id, [
            'contain' => ['Categories']
        ]);

        if ($this->Auth->user('id') === $vacancies->user_id) {
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
            return $this->redirect(['controller' => 'Cvs', 'action' => 'index']);
        }
        $categories = $this->Vacancies->Categories->find('list', ['keyField' => 'id', 'valueField' => 'category']);

        $this->set(compact('vacancies', 'categories', 'competences'));
        $this->set('_serialize', ['vacancies']);
    }

    public function delete($id)
    {
        $vacancies = $this->Vacancies->get($id);
        if ($this->Auth->user('id') === $vacancies->user_id) {
            $this->request->allowMethod(['post', 'delete']);
            if ($this->Vacancies->delete($vacancies)) {
                $this->Flash->set('Uw vacature is verwijderd!', ['key' => 'vacancy-success','params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['action' => 'index']);
            }
        }
        else {
            return $this->redirect(['controller' => 'Cvs', 'action' => 'index']);
        }
    }
}
