<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Wings extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
