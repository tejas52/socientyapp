<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MembersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('members');
        $this->setPrimaryKey('id');
        $this->setDisplayField('name');

        $this->belongsTo('Societies', [
            'foreignKey' => 'society_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Wings', [
            'foreignKey' => 'wing_id',
            'joinType' => 'LEFT',
        ]);

        // $this->belongsTo('Flats', [
        //     'foreignKey' => 'flat_id',
        //     'joinType' => 'LEFT',
        // ]);

        $this->belongsTo('Flats', [
    'foreignKey' => 'flat_id',
    'joinType' => 'INNER',
]);

        $this->hasMany('MaintenanceCharges', [
            'foreignKey' => 'member_id',
        ]);

        // $this->hasMany('Payments', [
        //     'foreignKey' => 'member_id',
        // ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('name', 'Name is required')
            ->email('email', false, 'Enter a valid email address')
            ->notEmptyString('phone', 'Phone number is required');

        return $validator;
    }
}
