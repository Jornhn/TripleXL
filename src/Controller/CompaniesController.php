<?php
/**
 * Created by PhpStorm.
 * User: jornholterman
 * Date: 16-01-17
 * Time: 09:55
 */

namespace App\Controller;


class CompaniesController extends AppController
{
    
    public function __construct($request = null, $response = null, $name = null, $eventManager = null, $components = null){
        parent::__construct($request, $response, $name, $eventManager, $components);

        $this->loadModel('Users');
    }
    
    public function isAuthorized($user)
    {
        
        if (isset($user['account_type']) && $user['account_type'] === '2' or '3') {
            return true;
        }
        $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
        return false;
        
    }
    
    function index()
    {
        
        if($this->isAuthorized($this->Auth->user())) {
            
            $users = $this->Users->find('threaded', array(
            'conditions' => array('account_type' => 1)
            ));
            $this->set(compact('users'));
            
        }
   
    }
    
    
}