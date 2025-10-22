<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class WingsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('wings');
        $this->setPrimaryKey('id');
        $this->setDisplayField('name');

        $this->belongsTo('Societies', [
            'foreignKey' => 'society_id',
            'joinType' => 'INNER',
        ]);

        $this->hasMany('Flats', [
            'foreignKey' => 'wing_id',
            'dependent' => true,
        ]);
    }
}
