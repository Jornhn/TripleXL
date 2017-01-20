<?php
/**
 * Created by PhpStorm.
 * User: jornholterman
 * Date: 19-01-17
 * Time: 09:55
 */

namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;

class MatchesController extends AppController
{
    public function __construct($request = null, $response = null, $name = null, $eventManager = null, $components = null)
    {
        parent::__construct($request, $response, $name, $eventManager, $components);

        $this->loadModel('ViewVacanciesCvs');
        $this->loadModel('Cvs');
        $this->loadModel('Users');
        $this->loadModel('Vacancies');
        $this->loadModel('Updates');
    }


    public function isAuthorized($user)
    {
        if (isset($user['account_type']) && $user['account_type'] === '3') {
            return true;
        }
        $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
        return false;
    }

    public function index()
    {
        if ($this->Auth->user('account_type') == 0) {
            $matches = $this->ViewVacanciesCvs->find()->contain(['Cvs.Users', 'Vacancies.Users'])->where(['Cvs.user_id' => $this->Auth->user('id')])->order(['ViewVacanciesCvs.score' => 'DESC']);
        } else if ($this->Auth->user('account_type') == 1) {
            $matches = $this->ViewVacanciesCvs->find()->contain(['Cvs.Users', 'Vacancies.Users'])->where(['Vacancies.user_id' => $this->Auth->user('id')])->order(['ViewVacanciesCvs.score' => 'DESC']);
        } else {
            $matches = $this->ViewVacanciesCvs->find()->contain(['Cvs.Users', 'Vacancies.Users'])->order(['ViewVacanciesCvs.score' => 'DESC']);
        }

        $this->set(compact('matches'));
    }
}