<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Permission Entity
 *
 * @property int $list_permissions_id
 * @property int $groups_id
 * @property int $value
 *
 * @property \App\Model\Entity\ListPermission $list_permission
 * @property \App\Model\Entity\Group $group
 */
class Permission extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'list_permissions_id' => true,
        'groups_id' => true,
        'value' => true,
        'list_permission' => true,
        'group' => true
    ];
    
}
