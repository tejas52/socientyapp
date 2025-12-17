<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Flat extends Entity
{
    // Fields that can be mass assigned using newEntity() or patchEntity()
    protected array $_accessible = [
        'wing_id' => true,
        'number_id' => true,
        'flat_no' => true, 
        'owner_name' => true,
        'member_id' => true,
        'created' => true,
        'modified' => true,

        // Associations
        'wing' => true,
        'member' => true,
    ];
}
