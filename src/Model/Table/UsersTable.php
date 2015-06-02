<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Auth\DigestAuthenticate;
/**
 * Users Model
 */
class UsersTable extends Table
{

    // public function beforeSave($event)
    // {
    //     $entity = $event->data['entity'];

    //     // Make a password for digest auth.
    //     $entity->password = DigestAuthenticate::password(
    //         $entity->username,
    //         $entity->password,
    //         env('SERVER_NAME')
    //     );
    //     return true;
    // }

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasMany('Friends', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Movies', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'movie_id',
            'joinTable' => 'users_movies'
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
            ->requirePresence('username', 'create')
            ->notEmpty('username');
            
        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email');
            
        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }

    public function findFriends(Query $query, array $options)
    {
        $userId = $options['user_id'];
        $query = $this->find()
            ->contain(['Friends'])
            ->matching('Friends', function ($q) use ( $userId) {
                 return $q->where(['Friends.friend_id' => $userId]);
                });

        return $query;
    }

    public function findPeopleMayKnow(Query $query, array $options)
    {
        $userId = $options['user_id'];
        $query = $this->find()
            ->distinct(['Users.id'])
            ->contain(['Friends'])
            ->matching('Friends', function ($q) use ( $userId) {
                 return $q->where(['Friends.friend_id !=' => $userId,'Friends.user_id !=' => $userId ]);

                });

        return $query;
    }



















}
