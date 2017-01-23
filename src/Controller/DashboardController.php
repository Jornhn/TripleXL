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
        $this->loadModel('Updates');
        $this->loadModel('Users');
        $this->loadModel('VacanciesCvs');

        $username = $this->Auth->user()['firstname'] . ' ';

        if (!empty($this->Auth->user()['insertion'])) {
            $username .= $this->Auth->user()['insertion'] . ' ';
        }

        $username .= $this->Auth->user()['lastname'];

        $this->set('fullname', $username);
        $this->set('globalUpdates', $this->Updates->find('all', [
            'conditions' => ['Updates.global' => 1],
            'order' => ['Updates.date' => 'DESC'],
            'limit' => 20
        ]));

        $this->set('userUpdates', $this->Updates->find('all', [
            'conditions' => ['Updates.user_id' => $this->Auth->user('id'), 'Updates.global' => 0],
            'order' => ['Updates.date' => 'DESC'],
            'limit' => 20
        ]));

    }
}