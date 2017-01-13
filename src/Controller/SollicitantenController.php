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
    public function __construct($request = null, $response = null, $name = null, $eventManager = null, $components = null){
        parent::__construct($request, $response, $name, $eventManager, $components);

        $this->loadModel('Users');
        $this->loadModel('Cv');
    }
    
    
    public function isAuthorized($user)
    {
        if (isset($user['account_type']) && $user['account_type'] === '2') {
            return true;
        }
        if (isset($user['account_type']) && $user['account_type'] === '3') {
            return true;
        }
        $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
        return false;
    }
    
    
    function index(){
        
        if($this->isAuthorized($this->Auth->user())){
            
            $users = $this->Users->find('threaded', array(
            'conditions' => array('account_type' => 0)
            ));
            $this->set(compact('users'));
            
        }
        
    }

    function view($id){
        
        if($this->isAuthorized($this->Auth->user())){
            
            $users = $this->Users->get($id);
            $this->set('users', $users);

            $cv = $this->Cv->find('all')->where(['user_id =' => $id]);
            $this->set(compact('cv'));
            
        }
        
    }

    function edit($id){
    
        if($this->isAuthorized($this->Auth->user())){
            
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
    
    function delete($id){
            
        //$this->loadModel('Cv');
        //$cv = $this->Cv->get($id);
        //$result = $this->Cv->delete($cv)->where(['user_id =' => $id]);
        
        if($this->isAuthorized($this->Auth->user())){
        
            //$this->Users->delete($id, true);
            $users = $this->Users->get($id);
            $result = $this->Users->delete($users);
            return $this->redirect(['action' => 'index']);
            
        }
        
    }
    
    function add(){
        
        if($this->isAuthorized($this->Auth->user())){
        
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

}