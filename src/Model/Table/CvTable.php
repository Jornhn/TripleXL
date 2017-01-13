<?php
/**
 * Created by PhpStorm.
 * User: Emil
 * Date: 11-01-17
 * Time: 09:57
 */
namespace App\Model\Table;

use Cake\ORM\Table;

class CvTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
    
    var $belongsTo = array('Cv'=>array('className'=>'Cv',
                                     'foreignKey'=>'user_id'
                             )
    );
    
}