<?php
/**
 * Created by PhpStorm.
 * User: Emil
 * Date: 11-01-17
 * Time: 09:35
 */

namespace App\Controller;

class VacanciesController extends AppController
{
    public function index()
    {
        $this->set('Vacancies', 'Aye');
    }
}
