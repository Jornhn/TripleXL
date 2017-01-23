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
        $this->loadModel('Purchases');
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
            $matches = $this->ViewVacanciesCvs->find()->contain(['Cvs.Users', 'Vacancies.Users'])->where(['Cvs.user_id' => $this->Auth->user('id')])->where(['Cvs.status' => 1])->andWhere(['Vacancies.status' => 1])->order(['ViewVacanciesCvs.score' => 'DESC']);
        } else if ($this->Auth->user('account_type') == 1) {
            $matches = $this->ViewVacanciesCvs->find()->contain(['Cvs.Users', 'Vacancies.Users'])->where(['Vacancies.user_id' => $this->Auth->user('id')])->where(['Cvs.status' => 1])->andWhere(['Vacancies.status' => 1])->order(['ViewVacanciesCvs.score' => 'DESC']);
        } else {
            $matches = $this->ViewVacanciesCvs->find()->contain(['Cvs.Users', 'Vacancies.Users'])->order(['ViewVacanciesCvs.score' => 'DESC']);
        }

        $this->set(compact('matches'));
    }

    public function purchases() {
        if ($this->request->data) {
            $cvs = array_unique($this->request->data["buySelection"]);

            foreach($cvs as $cv) {
                $data = [
                    "user_id" => $this->Auth->user('id'),
                    "cv_id" => $cv
                ];

                $purchase = $this->Purchases->newEntity();
                $this->Purchases->patchEntity($purchase, $data);
                if($this->Purchases->save($purchase)) {

                } else {
                    $this->Flash->set('Er ging iets mis! Neem z.s.m contact op met de site owner.', ['key' => 'matches-error', 'params' => ['class' => 'alert alert-danger']]);
                }
            }
            return $this->redirect(['controller' => 'matches', 'action' => 'purchased']);
        } else {
            return $this->redirect(['controller' => 'dashboard', 'action' => 'index']);
        }
    }

    public function purchased(){
        if($this->Auth->user('account_type') == 1) {
            $purchased = $this->Purchases->find()->where(["user_id" => $this->Auth->user('id')]);
            $results = $purchased->all();
//            debug($results);
            if(!$results->isEmpty()){

            $count = 0;
            foreach ($results as $result) {
                $cvs[] = $this->Cvs->get($result->cv_id, ['contain' => ['Categories', 'CategoriesCompetences']]);
            }
            foreach ($cvs as $cv) {
                $cvs[$count]["applicant"] = $this->Users->get($cv["user_id"]);
                $count++;
            }
            $this->set('matches', $cvs);
            }else{
                $matches = NULL;
                $this->set('matches', $matches);
            }
        }
    }

    public function cv($id)
    {
        $cvs = $this->Cvs->get($id, ['contain' => ['Categories', 'CategoriesCompetences']]);

        if ($this->Auth->user('id') === $cvs->user_id or $this->Auth->user('account_type') >= 1) {
            $this->set('cvs', $cvs);
        }
        else {
            return $this->redirect(['controller' => 'matches', 'action' => 'index']);
        }
    }

}