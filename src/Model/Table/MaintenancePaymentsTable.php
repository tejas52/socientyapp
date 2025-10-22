<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MaintenancePaymentsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('maintenance_payments');
        $this->setPrimaryKey('id');

        $this->belongsTo('MaintenanceCharges');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->numeric('paid_amount')
            ->notEmptyString('paid_amount', 'Paid amount is required')
            ->numeric('penalty_paid')
            ->allowEmptyString('penalty_paid');

        return $validator;
    }
}
