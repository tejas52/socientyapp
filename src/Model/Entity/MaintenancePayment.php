<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class MaintenancePayment extends Entity
{
    // Allow mass assignment for these fields
    protected array $_accessible = [
        'maintenance_charge_id' => true,
        'paid_amount' => true,
        'penalty_paid' => true,
        'payment_date' => true,
        'payment_mode' => true,
        'reference_no' => true,
        'remarks' => true,
        'created' => true,
        'modified' => true,
        'maintenance_charge' => true,
    ];
}
