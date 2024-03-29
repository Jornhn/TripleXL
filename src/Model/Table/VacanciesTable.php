<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class VacanciesTable extends Table
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

        $this->belongsTo('Users');
        $this->belongsTo('Categories');
        $this->hasMany('VacanciesCvs');
        $this->hasMany('ViewVacanciesCvs');
        $this->belongsToMany('CategoriesCompetences');
    }
}
