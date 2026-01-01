<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class IncomeExpenceTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('income_expence');
        $this->setPrimaryKey('id');

       
        $this->belongsTo('Flats');
        
    }

    // public function validationDefault(Validator $validator): Validator
    // {
    //     $validator
    //         ->numeric('amount')
    //         ->notEmptyString('amount', 'Amount is required')
    //         ->numeric('penalty')
    //         ->allowEmptyString('penalty');

    //     return $validator;
    // }
}
