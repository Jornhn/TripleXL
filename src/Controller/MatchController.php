<?php
/**
 * Created by PhpStorm.
 * User: jornholterman
 * Date: 19-01-17
 * Time: 09:55
 */

namespace App\Controller;


class ApplicantsController extends AppController
{
    public function __construct($request = null, $response = null, $name = null, $eventManager = null, $components = null){
        parent::__construct($request, $response, $name, $eventManager, $components);

        $this->loadModel('Users');
        $this->loadModel('Cvs');
        
    }
    
    
    public function isAuthorized($user)
    {
        
        if (isset($user['account_type']) && $user['account_type'] === '3') {
            return true;
        }
        $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
        return false;
        
    }
    
    
    function index()
    {
        if($this->isAuthorized($this->Auth->user())) {
            
            $vacature_id = $this->Users->get($category_id)->where(['user_id =' => $this->Auth->user('id')]);
            $vacature_id = $this->Users->get($id)->where(['categorie_id =' => $category_id]);
            $cv_id = $this->Users->get($id)->where(['categrorie_id =' => $category_id]); 

            
            
    }