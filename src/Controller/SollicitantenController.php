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
        //$id = $this->reques$idt->query['id'];
        
        $this->loadModel('Users');
        $users = $this->Users->get($id);
        $this->set('users', $users);
    }

    function edit($id){
        //$id = $this->request->query['id'];
        
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
        $users = $this->Users->get($id);
        $result = $this->Users->delete($users);
        return $this->redirect(['action' => 'index']);
        
        //$users = $this->Users->find()->where(['id' => $id])->first();
        //$this->request->allowMethod(['post', 'delete']);

        //if ($this->Users->delete($users)) {
        //    $this->Flash->success(__('The article with id: {0} has been deleted.', ($id)));
        //    return $this->redirect(['action' => 'index']);
        //}
        
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