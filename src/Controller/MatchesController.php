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

        $this->loadModel('VacanciesCvs');
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

    private function getMatches()
    {
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('
                            SELECT categories_competences_cvs.cv_id, categories_competences_vacancies.vacancy_id
                            FROM categories_competences
                            INNER JOIN categories_competences_cvs ON categories_competences.id = categories_competences_cvs.categories_competence_id
                            INNER JOIN categories_competences_vacancies ON categories_competences_cvs.categories_competence_id = categories_competences_vacancies.categories_competence_id
                            INNER JOIN categories ON categories_competences.category_id = categories.id');

        return $stmt ->fetchAll('assoc');
    }

    private function setMatches($raw)
    {
//        $this->request->data['Updates']['user_id'] = 0;
//        $this->request->data['Updates']['date'] = Time::now();
//        $this->request->data['Updates']['global'] = true;
//        $this->request->data['Updates']['type'] = "U";

        $this->VacanciesCvs->deleteAll(array('1 = 1'));
        $matches = array();
        foreach ($raw as $key => $match)
        {
            $keyNames = array_keys($match);
            $cvId = $keyNames[0];
            $vacancyID = $keyNames[1];

            if (!array_key_exists($match[$cvId] . $match[$vacancyID], $matches))
            {
                $matches[$match[$cvId] . $match[$vacancyID]] = array('cv_id' => $match[$cvId], 'vacancy_id' => $match[$vacancyID], 'score' => 1);
            } else {
                $matches[$match[$cvId] . $match[$vacancyID]]['score'] += 1;
            }
        }

        foreach ($matches as $match)
        {
            $newMatch = $this->VacanciesCvs->newEntity();
            $newMatch->cv_id = $match['cv_id'];
            $newMatch->vacancy_id = $match['vacancy_id'];
            $newMatch->score = $match['score'];

            if($this->VacanciesCvs->save($newMatch))
            {
                $applicant = $this->Cvs->find()->contain(['Users'])->where(['cvs.id' => $match['cv_id']]);
                $company = $this->Vacancies->find()->contain(['Users'])->where(['Vacancies.id' => $match['vacancy_id']]);

//                $updateApplicant = $this->Updates->newEntity();
//                $updateApplicant->user_id = $applicant->first()->user->id;
//                $updateApplicant->date = Time::now();
//                $updateApplicant->global = false;
//                $updateApplicant->type = "M";
//                $updateApplicant->text = "U heeft een match met " . $company->first()->user->company_name . ". Kijk bij uw matches voor meer informatie.";
//
//                $this->Updates->save($updateApplicant);
//
//                $updateCompany = $this->Updates->newEntity();
//                $updateCompany->user_id = $company->first()->user->id;
//                $updateCompany->date = Time::now();
//                $updateCompany->global = false;
//                $updateCompany->type = "M";
//                $updateCompany->text = "U heeft een match met een sollicitant. Kijk bij uw matches voor meer informatie.";
//                $this->Updates->save($updateCompany);
            }
        }
    }


    public function index()
    {
        //$this->setMatches($this->getMatches());
        if ($this->Auth->user('account_type') == 0) {
            $matches = $this->VacanciesCvs->find()->contain(['Cvs.Users', 'Vacancies.Users'])->where(['Cvs.user_id' => $this->Auth->user('id')])->order(['VacanciesCvs.score' => 'DESC']);
        } else if ($this->Auth->user('account_type') == 1) {
            $matches = $this->VacanciesCvs->find()->contain(['Cvs.Users', 'Vacancies.Users'])->where(['Vacancies.user_id' => $this->Auth->user('id')])->order(['VacanciesCvs.score' => 'DESC']);
        } else {
            $matches = $this->VacanciesCvs->find()->contain(['Cvs.Users', 'Vacancies.Users'])->order(['VacanciesCvs.score' => 'DESC']);
        }

        $this->set(compact('matches'));
    }
}