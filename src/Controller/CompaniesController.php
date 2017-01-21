<?php
/**
 * Created by PhpStorm.
 * User: jornholterman
 * Date: 16-01-17
 * Time: 09:55
 */

namespace App\Controller;


class CompaniesController extends AppController
{

    public function __construct($request = null, $response = null, $name = null, $eventManager = null, $components = null)
    {
        parent::__construct($request, $response, $name, $eventManager, $components);

        $this->loadModel('Users');
        $this->loadModel('Vacancies');
    }

    public function isAuthorized($user)
    {

        if (isset($user['account_type']) && $user['account_type'] === '2' or '3') {
            return true;
        }
        $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
        return false;

    }

    function index()
    {

        if ($this->isAuthorized($this->Auth->user())) {

            $users = $this->Users->find('threaded', array(
                'conditions' => array('account_type' => 1)
            ));
            $this->set(compact('users'));

        }

    }

    function create()
    {

        if ($this->isAuthorized($this->Auth->user())) {

            $users = $this->Users->newEntity();
            if ($this->request->is('post')) {
                $users = $this->Users->patchEntity($users, $this->request->data);
                if ($this->Users->save($users)) {
                    $this->Flash->success(__('Your CV has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to add your CV.'));
            }
            $this->set('users', $users);

        }

    }

    function edit($id)
    {

        if ($this->isAuthorized($this->Auth->user())) {

            $users = $this->Users->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Users->patchEntity($users, $this->request->data);
                if ($this->Users->save($users)) {
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to update your CV.'));
            }
            $this->set('users', $users);

        }
    }

    function view($id)
    {

        if ($this->isAuthorized($this->Auth->user())) {

            $users = $this->Users->get($id);
            $this->set('users', $users);

            $vacancies = $this->Vacancies->find('all')->where(['user_id =' => $id]);
            $this->set(compact('vacancies'));

        }

    }

    function delete($id)
    {

        if ($this->isAuthorized($this->Auth->user())) {

            //* Deleting CV *// 

            $results = $this->Vacancies->find('all')->where(['user_id =' => $id]);
            $vacancies = $results->first();

            if ($vacancies != '') {

                $result = $this->Vacancies->delete($vacancies);

            }

            //* Deleting USER *//   

            $users = $this->Users->get($id);
            $result = $this->Users->delete($users);
            return $this->redirect(['action' => 'index']);

        }

    }


}