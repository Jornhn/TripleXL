<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CategoryCompetence Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Category
 * @property \Cake\ORM\Association\BelongsTo $Competence
 *
 * @method \App\Model\Entity\CategoryCompetence get($primaryKey, $options = [])
 * @method \App\Model\Entity\CategoryCompetence newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CategoryCompetence[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CategoryCompetence|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CategoryCompetence patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CategoryCompetence[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CategoryCompetence findOrCreate($search, callable $callback = null, $options = [])
 */
class CategoryCompetenceTable extends Table
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

        $this->table('category_competence');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Category', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Competence', [
            'foreignKey' => 'competence_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['category_id'], 'Category'));
        $rules->add($rules->existsIn(['competence_id'], 'Competence'));

        return $rules;
    }
}
