<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class SocietiesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('societies');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Wings', [
            'className' => 'Wings',
            'foreignKey' => 'society_id'
        ]);
        $this->hasMany('Members', [
            'className' => 'SocietyMaintenance.Members',
            'foreignKey' => 'society_id'
        ]);
    }
}
