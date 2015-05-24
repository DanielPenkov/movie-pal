<?php
namespace App\Model\Table;

use App\Model\Entity\Notification;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notifications Model
 */
class NotificationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('notifications');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'sender_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'recipient_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Recommendations', [
            'foreignKey' => 'notification_id'
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
            
        $validator
            ->add('date_sent', 'valid', ['rule' => 'date'])
            ->requirePresence('date_sent', 'create')
            ->notEmpty('date_sent');
            
        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');
            
        $validator
            ->add('type', 'valid', ['rule' => 'numeric'])
            ->requirePresence('type', 'create')
            ->notEmpty('type');

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
        $rules->add($rules->existsIn(['recipient_id'], 'Users'));
        return $rules;
    }
}
