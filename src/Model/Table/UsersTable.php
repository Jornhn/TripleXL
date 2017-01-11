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
            ->notEmpty('account_type', 'Een account type is verplicht');
    }
    
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
}