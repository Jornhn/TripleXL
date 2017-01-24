<?php
namespace App\Controller;

use Cake\Network\Request;
use Cake\Network\Response;

class ManagersController extends AppController
{

    // Function which loads the wanted model in this case the model Users
    public function __construct($request = null, $response = null, $name = null, $eventManager = null, $components = null)
    {
        parent::__construct($request, $response, $name, $eventManager, $components);

        $this->loadModel('Users');
    }

    // Function which checks if called if the user is allowed to see the page
    public function isAuthorized($user)
    {
        if (isset($user['account_type']) && $user['account_type'] === 3) {
            return true;
        }
        $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
        return false;
    }

    // Function which gets all the managers from the database and send it to the index where it will be displayed
    public function index()
    {
        // If the user is allowed to acces the page
        if ($this->isAuthorized($this->Auth->user())) {
            // Get all the users with the account_type = 2 which are all the managers
            $query = $this->Users->find()->where(['account_type' => '2']);
            // Execute the query so you get the data
            $results = $query->all();

            // Give the data to the view
            $this->set('managers', $results);
        }
    }

    // Function which makes the super user able to view the data of a manager
    public function view($id = null)
    {
        // If the user is allowed to acces the page
        if ($this->isAuthorized($this->Auth->user())) {
            // If there is no ID we cannot show the page so we give the user an error
            if (empty($id)) {
                throw new NotFoundException;
            }
            // Get the data from the wanted manager
            $manager = $this->Users->get($id);
            // Give the data to the view to display the data
            $this->set('manager', $manager);
        }
    }

    // Function which saves the manager data
    public function create()
    {
        // If the user is allowed to acces the page
        if ($this->isAuthorized($this->Auth->user())) {
            // If the user presses the submit button, make an entity from the data and save it after that redirect
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

    // Function which gets the data from the selected manager which will be send to the page to create and fill a form with the data
    // and will save the data if the user presses save
    public function edit($id = null)
    {
        if ($this->isAuthorized($this->Auth->user())) {
            // Gives an error if there is no ID (cant get data if there is no ID)
            if (empty($id)) {
                throw new NotFoundException;
            }
            // Gets the selected manager
            $manager = $this->Users->get($id);
            // Sends the data to the view
            $this->set('manager', $manager);

            // If the users presses the submit button save the data and redirect the user
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

    // Function which deletes the selected manager
    public function delete($id = null)
    {
        // Checks if the user is allowed to view the page
        if ($this->isAuthorized($this->Auth->user())) {
            // If there is no ID given we cannot delete the mangers so we return an error
            if (empty($id)) {
                throw new NotFoundException;
            }
            // Gets the manager data
            $manager = $this->Users->get($id);
            // Sends the data to the view
            $this->set('manager', $manager);

            // Deletes the manager and returns the user to the index if succeeded
            if ($this->Users->delete($manager)) {
                $this->Flash->set('De beheerder met id: ' . $id . ' is verwijderd.', ['key' => 'manager-success', 'params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['controller' => 'managers', 'action' => 'index']);
            }
            $this->Flash->set('Er ging iets mis!', ['key' => 'manager-error', 'params' => ['class' => 'alert alert-danger']]);

        }
    }
}