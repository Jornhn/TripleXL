<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Competence Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Category
 *
 * @method \App\Model\Entity\Competence get($primaryKey, $options = [])
 * @method \App\Model\Entity\Competence newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Competence[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Competence|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Competence patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Competence[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Competence findOrCreate($search, callable $callback = null, $options = [])
 */
class CompetenceTable extends Table
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

        $this->table('competence');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsToMany('Category', [
            'foreignKey' => 'competence_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'category_competence'
        ]);
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
            ->requirePresence('competence', 'create')
            ->notEmpty('competence');

        $validator
            ->requirePresence('competence_description', 'create')
            ->notEmpty('competence_description');

        return $validator;
    }
}
