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

    public function index()
    {
        $this->set('users', $this->Users->find('all'));
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->set('Het opgegeven email of wachtwoord is onjuist probeer het opnieuw', ['params' => ['class' => 'alert alert-danger']]);
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function register(){
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Gebruiker is opgeslagen.'));
                return $this->redirect(['action' => 'register']);
            }
            $this->Flash->set('Er ging iets mis! Controleer of alle velden zijn ingevuld.',  ['params' => ['class' => 'alert alert-danger']]);
        }
        $this->set('user', $user);
    }
}