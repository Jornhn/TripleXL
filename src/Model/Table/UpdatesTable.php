<?php
/**
 * Created by PhpStorm.
 * User: Sven
 * Date: 12-1-2017
 * Time: 11:27
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class UpdatesTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('Users');
    }
}