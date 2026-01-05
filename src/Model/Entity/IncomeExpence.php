<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class MaintenanceCharge extends Entity
{
    // Allow mass assignment for these fields
    protected array $_accessible = [
        'transaction_date' => true,
        'transaction_type' => true,
        'transaction_mode' => true,
        'flat_id' => true,
        'description'=>true,
        'debit_amount'=>true,
        'credit_amount' => true
    ];
}
