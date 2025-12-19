<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class MaintenanceCharge extends Entity
{
    // Allow mass assignment for these fields
    protected array $_accessible = [
        'paid_date' => true,
        'society_id' => true,
        'wing_id' => true,
        'flat_id' => true,
        'month_number' => true,
        'year' => true,
        'amount' => true,
        'penalty' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'society' => true,
        'wing' => true,
        'flat' => true,
        'maintenance_payments' => true,
    ];
}
