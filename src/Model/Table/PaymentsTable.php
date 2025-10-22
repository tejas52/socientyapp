<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class PaymentsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('payments');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('MaintenanceFees', [
            'className' => 'SocietyMaintenance.MaintenanceFees',
            'foreignKey' => 'fee_id'
        ]);
    }
}
