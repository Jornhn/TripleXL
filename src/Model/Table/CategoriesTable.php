<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Category Model
 *
 * @property \Cake\ORM\Association\HasMany $VacatureCategory
 * @property \Cake\ORM\Association\BelongsToMany $Competence
 * @property \Cake\ORM\Association\BelongsToMany $Cv
 *
 * @method \App\Model\Entity\Category get($primaryKey, $options = [])
 * @method \App\Model\Entity\Category newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Category[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Category|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Category patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Category[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Category findOrCreate($search, callable $callback = null, $options = [])
 */
class CategoriesTable extends Table
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

        $this->table('categories');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('VacatureCategorie', [
            'foreignKey' => 'category_id'
        ]);

        $this->belongsToMany('Competence', [
            'foreignKey' => 'category_id',
            'targetForeignKey' => 'competence_id',
            'joinTable' => 'category_competence'
        ]);
        $this->belongsToMany('Cv', [
            'foreignKey' => 'category_id',
            'targetForeignKey' => 'cv_id',
            'joinTable' => 'cv_category'
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
            ->requirePresence('category', 'create')
            ->notEmpty('category');

        $validator
            ->requirePresence('category_description', 'create')
            ->notEmpty('category_description');

        return $validator;
    }
}
