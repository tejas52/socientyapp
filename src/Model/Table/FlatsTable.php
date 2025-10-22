<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class FlatsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('flats');
        $this->setPrimaryKey('id');

        $this->belongsTo('Wings', [
            'foreignKey' => 'wing_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Members', [
            'foreignKey' => 'member_id',
            'joinType' => 'LEFT',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('flat_no', 'Flat number is required')
            ->notEmptyString('owner_name', 'Owner name is required')
            ->notEmptyString('wing_id', 'Wing is required');

        return $validator;
    }
}
