<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class Answer extends Entity
{
    // Make all fields mass assignable except for primary key field "user_id".
    protected $_accessible = [
        '*' => true,
        'id_querry' => false
    ];


    

}