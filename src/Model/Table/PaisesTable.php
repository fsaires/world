<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Paises Model
 *
 * @method \App\Model\Entity\Paise get($primaryKey, $options = [])
 * @method \App\Model\Entity\Paise newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Paise[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paise|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Paise[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paise findOrCreate($search, callable $callback = null, $options = [])
 */
class PaisesTable extends Table
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

        $this->table('paises');
        $this->displayField('paiid');
        $this->primaryKey('paiid');
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
            ->integer('paiid')
            ->allowEmpty('paiid', 'create');

        $validator
            ->requirePresence('painome', 'create')
            ->notEmpty('painome');

        $validator
            ->requirePresence('paisigla', 'create')
            ->notEmpty('paisigla');

        return $validator;
    }
}
