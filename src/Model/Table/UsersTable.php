<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
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

        $this->hasMany('Updates');
        $this->hasMany('Cvs');
        $this->hasMany('Vacancies');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('salutation', 'create')
            ->notEmpty('salutation');

        $validator
            ->requirePresence('firstname', 'create')
            ->notEmpty('firstname');

        $validator
            ->allowEmpty('insertion');

        $validator
            ->requirePresence('lastname', 'create')
            ->notEmpty('lastname');

        $validator
            ->requirePresence('adress', 'create')
            ->notEmpty('adress');

        $validator
            ->requirePresence('zip_code', 'create')
            ->notEmpty('zip_code');

        $validator
            ->requirePresence('place', 'create')
            ->notEmpty('place');

        $validator
            ->requirePresence('phone_number', 'create')
            ->notEmpty('phone_number');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->allowEmpty('company_name');

        $validator
            ->allowEmpty('website');

        $validator
            ->requirePresence('account_type', 'create')
            ->notEmpty('account_type');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
