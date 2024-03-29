<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CvsTable extends Table
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

        // Many cvs belong to a user.
        $this->belongsTo('Users');
        // Many cvs belong to a category.
        $this->belongsTo('Categories');
        // A cv can have multiple matches.
        $this->hasMany('ViewVacanciesCvs');
        // Cvs belong to many competences
        $this->belongsToMany('CategoriesCompetences');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->requirePresence('motivation', 'create')
            ->notEmpty('motivation');


        return $validator;
    }
}
