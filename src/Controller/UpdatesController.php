<?php
/**
 * Created by PhpStorm.
 * User: Sven
 * Date: 16-1-2017
 * Time: 13:15
 */

namespace App\Controller;

use Cake\Network\Request;
use Cake\Network\Response;
use Cake\I18n\Time;

class UpdatesController extends AppController
{
    public function isAuthorized($user){
        if (isset($user['account_type']) && $user['account_type'] >= '2') {
            return true;
        }

        $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
        return false;

    }

    /* Create a global update */
    public function create(){
        if($this->isAuthorized($this->Auth->user())) {
            if ($this->request->is("post")) {

                $this->request->data['Updates']['user_id'] = 0;
                $this->request->data['Updates']['date'] = Time::now();
                $this->request->data['Updates']['global'] = true;
                $this->request->data['Updates']['type'] = "U";

                if (empty($this->request->data['text'])) {
                    $this->Flash->set('Vul een bericht in.', ['key' => 'update-error', 'params' => ['class' => 'alert alert-warning']]);
                    return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
                }

                $entity = $this->Updates->newEntity($this->request->data());
                if ($this->Updates->save($entity)) {
                    $this->Flash->set('Uw update is geplaatst.', ['key' => 'update-success', 'params' => ['class' => 'alert alert-success']]);
                    return $this->redirect(['controller' => 'dashboard', 'action' => 'index']);
                }
                $this->Flash->set('Er ging iets mis! Probeer het opnieuw.', ['key' => 'update-error', 'params' => ['class' => 'alert alert-danger']]);
            }
        }

        return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
    }

    /* Delete an update */
    public function delete($id = null) {
        if ($this->isAuthorized($this->Auth->user())) {
            if (empty($id)) {
                throw new NotFoundException;
            }
            $update = $this->Updates->get($id);

            if ($this->Updates->delete($update)) {
                $this->Flash->set('Update is succesvol verwijderd.', ['key' => 'update-success', 'params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
            }
            $this->Flash->set('Kon de update niet verwijderen. Probeer het opnieuw.', ['key' => 'update-error', 'params' => ['class' => 'alert alert-danger']]);

        }
    }

}