<?php
/**
 * Created by PhpStorm.
 * User: Sven
 * Date: 11-1-2017
 * Time: 11:00
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{

    public function isAuthorized($user)
    {
        if (isset($user['account_type']) && $user['account_type'] >= '2') {
            return true;
        }
        $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
        return false;
    }

    public function index()
    {
        $this->set('users', $this->Users->find('all'));
    }

    public function view($id)
    {
        if (empty($id) || !isset($id))
        {
            $id = $this->Auth->user('id');
        } else {
            $this->isAuthorized($this->Auth->user());
        }

        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function edit($id = null){

        if (empty($id) || !isset($id))
        {
            $id = $this->Auth->user('id');
        } else {
            $this->isAuthorized($this->Auth->user());
        }

        $user = $this->Users->get($id);
        $this->set('manager', $user);

        if ($this->request->is("put")) {
            $entity = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($entity)) {
                $this->Auth->setUser($entity);
                $this->Flash->set('Uw account is succesvol opgeslagen.', ['key' => 'manager-success', 'params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['controller' => 'users', 'action' => 'view']);
            }
            $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'manager-error', 'params' => ['class' => 'alert alert-danger']]);
        }
    }

    public function login()
    {
        if ($this->Auth->user())
        {
            return $this->redirect($this->Auth->redirectUrl());
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->set('Het opgegeven email of wachtwoord is onjuist probeer het opnieuw', ['key' => 'login-error','params' => ['class' => 'alert alert-danger']]);
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function register(){

        if ($this->Auth->user())
        {
            return $this->redirect($this->Auth->redirectUrl());
        }

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);

            if ($this->Users->save($user)) {
                $this->Flash->set('Uw account is succesvol aangemaakt. Log in om door te gaan.', ['key' => 'register-success', 'params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->set('Er ging iets mis! Controleer of alle velden zijn ingevuld.',  ['key' => 'register-error', 'params' => ['class' => 'alert alert-danger']]);
        }
        $this->set('user', $user);
    }
    
}