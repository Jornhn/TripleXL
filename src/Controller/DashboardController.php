<?php
/**
 * Created by PhpStorm.
 * User: Sven
 * Date: 11-1-2017
 * Time: 11:12
 */

namespace App\Controller;
use App\Controller\AppController;

class DashboardController extends AppController
{
    public function index()
    {
        $this->loadModel('Activities');
        $this->set('activities', $this->Activities->find('all', [
            'conditions' => ['Activities.user_id' => $this->Auth->user('id')],
            'order' => ['Activities.date' => 'DESC'],
            'limit' => 20
        ]));
    }
}