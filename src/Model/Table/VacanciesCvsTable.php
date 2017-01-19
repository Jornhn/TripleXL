<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class VacanciesCvsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->belongsTo('Cvs');
        $this->belongsTo('Vacancies');
    }

    public function countMatches()
    {

        $matches = $this->find()->contain(['Cvs', 'Vacancies']);

        $count = 0;
        foreach ($matches as $value)
        {
            $count++;
        }

        return $count;
    }
}
