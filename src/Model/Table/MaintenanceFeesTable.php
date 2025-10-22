<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class MaintenanceFeesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('maintenance_fees');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Flats', [
            'className' => 'SocietyMaintenance.Flats',
            'foreignKey' => 'flat_id'
        ]);
        // $this->hasMany('Payments', [
        //     'className' => 'SocietyMaintenance.Payments',
        //     'foreignKey' => 'fee_id'
        // ]);
    }
}
