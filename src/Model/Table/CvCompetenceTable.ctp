<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CvCategory Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cv
 * @property \Cake\ORM\Association\BelongsTo $Competence
 *
 * @method \App\Model\Entity\CvCompetence get($primaryKey, $options = [])
 * @method \App\Model\Entity\CvCompetence newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CvCompetence[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CvCompetence|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CvCompetence patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CvCompetence[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CvCompetence findOrCreate($search, callable $callback = null, $options = [])
 */
class CvCompetence extends Table
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

        $this->table('cv_competence');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Cv', [
            'foreignKey' => 'cv_id',
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
        $rules->add($rules->existsIn(['cv_id'], 'Cv'));
        $rules->add($rules->existsIn(['category_id'], 'Category'));

        return $rules;
    }
}