<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cidades Model
 *
 * @method \App\Model\Entity\Cidade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cidade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cidade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cidade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cidade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cidade findOrCreate($search, callable $callback = null, $options = [])
 */
class CidadesTable extends Table
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

        $this->table('cidades');
        $this->displayField('cidid');
        $this->primaryKey('cidid');
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
            ->integer('cidid')
            ->allowEmpty('cidid', 'create');

        $validator
            ->integer('paiid')
            ->requirePresence('paiid', 'create')
            ->notEmpty('paiid');

        $validator
            ->requirePresence('estid', 'create')
            ->notEmpty('estid');

        $validator
            ->requirePresence('cidnome', 'create')
            ->notEmpty('cidnome');

        return $validator;
    }
}
