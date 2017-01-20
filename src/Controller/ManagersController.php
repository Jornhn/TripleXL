<?php
namespace App\Controller;

use Cake\Network\Request;
use Cake\Network\Response;

class ManagersController extends AppController
{

    public function __construct($request = null, $response = null, $name = null, $eventManager = null, $components = null)
    {
        parent::__construct($request, $response, $name, $eventManager, $components);

        $this->loadModel('Users');
    }

    public function isAuthorized($user)
    {
        if (isset($user['account_type']) && $user['account_type'] === 3) {
            return true;
        }
        $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
        return false;
    }

    public function index()
    {
        if ($this->isAuthorized($this->Auth->user())) {
            $query = $this->Users->find()->where(['account_type' => '2']);
            $results = $query->all();

            $this->set('managers', $results);
        }
    }

    public function view($id = null)
    {
        if ($this->isAuthorized($this->Auth->user())) {
            if (empty($id)) {
                throw new NotFoundException;
            }
            $manager = $this->Users->get($id);
            $this->set('manager', $manager);
        }
    }

    public function create()
    {
        if ($this->isAuthorized($this->Auth->user())) {
            if ($this->request->is("post")) {
                $entity = $this->Users->newEntity($this->request->data());
                if ($this->Users->save($entity)) {
                    $this->Flash->set('De gegevens zijn succesvol opgeslagen.', ['key' => 'manager-success', 'params' => ['class' => 'alert alert-success']]);
                    return $this->redirect(['controller' => 'managers', 'action' => 'index']);
                }
                $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'manager-error', 'params' => ['class' => 'alert alert-danger']]);
            }
        }
    }

    public function edit($id = null)
    {
        if ($this->isAuthorized($this->Auth->user())) {
            if (empty($id)) {
                throw new NotFoundException;
            }
            $manager = $this->Users->get($id);
            $this->set('manager', $manager);

            if ($this->request->is("put")) {
                $entity = $this->Users->patchEntity($manager, $this->request->data);
                if ($this->Users->save($entity)) {
                    $this->Flash->set('De beheerder met id: ' . $id . ' is succesvol gewijzigd.', ['key' => 'manager-success', 'params' => ['class' => 'alert alert-success']]);
                    return $this->redirect(['controller' => 'managers', 'action' => 'index']);
                }
                $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'manager-error', 'params' => ['class' => 'alert alert-danger']]);
            }
        }
    }

    public function delete($id = null)
    {
        if ($this->isAuthorized($this->Auth->user())) {
            if (empty($id)) {
                throw new NotFoundException;
            }
            $manager = $this->Users->get($id);
            $this->set('manager', $manager);

            if ($this->Users->delete($manager)) {
                $this->Flash->set('De beheerder met id: ' . $id . ' is verwijderd.', ['key' => 'manager-success', 'params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['controller' => 'managers', 'action' => 'index']);
            }
            $this->Flash->set('Er ging iets mis!', ['key' => 'manager-error', 'params' => ['class' => 'alert alert-danger']]);

        }
    }
}