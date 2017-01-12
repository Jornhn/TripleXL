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
        $this->loadModel('Activity');
        $this->set('activities', $this->Activity->find('all', [
            'conditions' => ['Activity.user_id' => $this->Auth->user('id')],
            'order' => ['Activity.date' => 'DESC'],
            'limit' => 20
        ]));
    }
}