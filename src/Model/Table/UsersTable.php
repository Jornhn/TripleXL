<?php
/**
 * Created by PhpStorm.
 * User: Sven
 * Date: 11-1-2017
 * Time: 10:57
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('email', 'E-mail is verplicht')
            ->notEmpty('password', 'Wachtwoord if verplicht')
            ->notEmpty('account_type', 'Een account type is verplicht')
            ->notEmpty('salution', 'Een account type is verplicht')
            ->notEmpty('firstname', 'Een account type is verplicht')
            ->notEmpty('lastname', 'Een account type is verplicht')
            ->notEmpty('adress', 'Een account type is verplicht')
            ->notEmpty('zip_code', 'Een account type is verplicht')
            ->notEmpty('place', 'Een account type is verplicht')
            ->notEmpty('phone_number', 'Een account type is verplicht');
    }
    
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
    
}