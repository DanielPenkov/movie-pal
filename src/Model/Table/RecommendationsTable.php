<?php
namespace App\Model\Table;

use App\Model\Entity\Recommendation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recommendations Model
 */
class RecommendationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('recommendations');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'sender_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'reciever_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Movies', [
            'foreignKey' => 'movie_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Notifications', [
            'foreignKey' => 'notification_id',
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
            ->add('id', 'valid', ['rule' => 'numeric'])
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
        $rules->add($rules->existsIn(['sender_id'], 'Users'));
        $rules->add($rules->existsIn(['reciever_id'], 'Users'));
        $rules->add($rules->existsIn(['movie_id'], 'Movies'));
        $rules->add($rules->existsIn(['notification_id'], 'Notifications'));
        return $rules;
    }
}
