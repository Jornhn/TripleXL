<?php
namespace App\Controller;

use Cake\Network\Request;
use Cake\Network\Response;

class CategoriesController extends AppController{

    public function __construct($request = null, $response = null, $name = null, $eventManager = null, $components = null){
        parent::__construct($request, $response, $name, $eventManager, $components);
    }

    public function isAuthorized($user){
        if (isset($user['account_type']) && $user['account_type'] >= '2') {
            return true;
        }
        return false;
        $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
    }


}