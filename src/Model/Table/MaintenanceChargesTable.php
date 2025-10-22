<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MaintenanceChargesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('maintenance_charges');
        $this->setPrimaryKey('id');

        $this->belongsTo('Societies');
        $this->belongsTo('Wings');
        $this->belongsTo('Flats');
        $this->hasMany('MaintenancePayments', [
            'foreignKey' => 'maintenance_charge_id'
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->numeric('amount')
            ->notEmptyString('amount', 'Amount is required')
            ->numeric('penalty')
            ->allowEmptyString('penalty');

        return $validator;
    }
}
