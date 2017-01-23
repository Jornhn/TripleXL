<?php
/**
 * Created by PhpStorm.
 * User: jornholterman
 * Date: 19-01-17
 * Time: 09:50
 */

namespace App\Controller;


class ContactController extends AppController
{
    public function __construct($request = null, $response = null, $name = null, $eventManager = null, $components = null)
    {
        parent::__construct($request, $response, $name, $eventManager, $components);

        $this->loadModel('Users');
    }

    public function isAuthorized($user)
    {

        if (isset($user['account_type']) && $user['account_type'] === '2' or '3') {
            //-->
            return true;
        }
        $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
        return false;

    }


    function display($id = 1)
    {
        $contact = $this->Contact->get($id);
        $this->set('contact', $contact);

        if ($this->Auth->user('account_type') >= 2) {

            $edit_button = "<a class='btn btn-primary' href='contact/edit/'>Edit</a>";
            $this->set('edit_button', $edit_button);

        } else {
            $this->set('edit_button', '');
        }

    }

    function edit($id = 1)
    {

        if ($this->isAuthorized($this->Auth->user())) {

            $contact = $this->Contact->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Contact->patchEntity($contact, $this->request->data);
                if ($this->Contact->save($contact)) {
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to update your CV.'));
            }
            $this->set('contact', $contact);

        }

    }


}