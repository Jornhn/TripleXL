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
        $users = $this->Users->find('threaded', array(
        'conditions' => array('account_type' => 0)
        ));
        $this->set(compact('users'));
    }

    function view($id){
        
        $this->loadModel('Users');
        $users = $this->Users->get($id);
        $this->set('users', $users);
        
        $this->loadModel('Cv');
        $cv = $this->Cv->find('all')->where(['user_id =' => $id]);
        $this->set(compact('cv'));
        
    }

    function edit($id){
        
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
    
    function delete($id){
        
        $this->loadModel('Users');
        $this->Users->delete($id, true);
        
        //$users = $this->Users->get($id);
        //$result = $this->Users->delete($users);
        //return $this->redirect(['action' => 'index']);
        
    }
    
    function add(){
        
        $this->loadModel('Users');
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