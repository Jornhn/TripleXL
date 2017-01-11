<?php
/**
 * Created by PhpStorm.
 * User: jornholterman
 * Date: 11-01-17
 * Time: 09:55
 */

namespace App\Controller;


class SollicitantenController extends AppController
{
    function index(){
        $this->loadModel('Users');
        $users = $this->Users->find('all');
        $this->set(compact('users'));
    }

    function view(){
        $id = $this->request->query['id'];
        
        $this->loadModel('Users');
        $users = $this->Users->get($id);
        $this->set('users', $users);
    }

    function edit(){
        
        //$id = $this->params['url']['id'];
        $id = $this->request->query['id'];
        
        $this->loadModel('Users');
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

    function add(){

    }

}